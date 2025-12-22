<?php
/**
 * M-Pesa AJAX Handler for OpenEMR
 *
 * Handles AJAX requests for M-Pesa payment initiation
 */

require_once("../../globals.php");
require_once("$srcdir/acl.inc");
require_once("$srcdir/auth.inc");
require_once("../../library/Mpesa.php");

// Ensure user is logged in
if (!isset($_SESSION['authUser'])) {
    http_response_code(401);
    echo json_encode(array('error' => 'Unauthorized'));
    exit;
}

$action = $_POST['action'] ?? '';

switch ($action) {
    case 'initiate_payment':
        initiateMpesaPayment();
        break;
    default:
        http_response_code(400);
        echo json_encode(array('error' => 'Invalid action'));
        break;
}

function initiateMpesaPayment()
{
    $phone = trim($_POST['phone'] ?? '');
    $amount = trim($_POST['amount'] ?? '');
    $paymentId = trim($_POST['payment_id'] ?? '');

    // Validate input
    if (empty($phone) || empty($amount) || empty($paymentId)) {
        echo json_encode(array('success' => false, 'message' => 'Missing required parameters'));
        return;
    }

    if (!is_numeric($amount) || $amount <= 0) {
        echo json_encode(array('success' => false, 'message' => 'Invalid amount'));
        return;
    }

    try {
        $mpesa = new Mpesa();

        // Use payment ID as account reference
        $accountReference = 'PAY-' . $paymentId;

        $result = $mpesa->stkPush($phone, $amount, $accountReference);

        if (isset($result['ResponseCode']) && $result['ResponseCode'] == '0') {
            // Update payment record with M-Pesa reference
            $merchantRequestId = $result['MerchantRequestID'];
            $checkoutRequestId = $result['CheckoutRequestID'];

            sqlStatement("UPDATE ar_session SET reference = ?, description = CONCAT(description, ' - M-Pesa Pending') WHERE session_id = ?",
                array($merchantRequestId, $paymentId));

            echo json_encode(array(
                'success' => true,
                'message' => 'M-Pesa payment initiated. Please check your phone.',
                'merchant_request_id' => $merchantRequestId,
                'checkout_request_id' => $checkoutRequestId
            ));
        } else {
            $errorMessage = $result['ResponseDescription'] ?? 'Unknown error';
            echo json_encode(array('success' => false, 'message' => 'M-Pesa payment failed: ' . $errorMessage));
        }
    } catch (Exception $e) {
        error_log('M-Pesa AJAX error: ' . $e->getMessage());
        echo json_encode(array('success' => false, 'message' => 'An error occurred while processing the payment'));
    }
}
?>
