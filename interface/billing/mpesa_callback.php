<?php
/**
 * M-Pesa Callback Handler for OpenEMR
 *
 * Receives and processes callback notifications from Safaricom M-Pesa API
 * Updates payment records based on transaction status
 */

require_once("../../globals.php");
require_once("$srcdir/acl.inc");
require_once("$srcdir/auth.inc");
require_once("../../library/Mpesa.php");

// Get the raw POST data
$rawData = file_get_contents('php://input');
$callbackData = json_decode($rawData, true);

// Log the callback for debugging
error_log('M-Pesa Callback Received: ' . $rawData);

// Validate callback data
if (!$callbackData) {
    http_response_code(400);
    echo json_encode(array('error' => 'Invalid JSON data'));
    exit;
}

try {
    $mpesa = new Mpesa();
    $result = $mpesa->processCallback($callbackData);

    if ($result['success']) {
        http_response_code(200);
        echo json_encode(array('ResultCode' => 0, 'ResultDesc' => 'Callback processed successfully'));
    } else {
        http_response_code(200); // Always return 200 to M-Pesa, even on errors
        echo json_encode(array('ResultCode' => 1, 'ResultDesc' => $result['message']));
    }
} catch (Exception $e) {
    error_log('M-Pesa callback processing error: ' . $e->getMessage());
    http_response_code(500);
    echo json_encode(array('ResultCode' => 1, 'ResultDesc' => 'Internal server error'));
}
?>
