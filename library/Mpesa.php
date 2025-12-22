<?php
/**
 * M-Pesa Daraja API Integration Class for OpenEMR
 *
 * This class handles M-Pesa payment processing including:
 * - Authentication (access token generation)
 * - STK Push (Lipa na M-Pesa Online)
 * - Callback processing
 *
 * @package OpenEMR
 * @subpackage Billing
 */

class Mpesa
{
    private $consumerKey;
    private $consumerSecret;
    private $passkey;
    private $shortcode;
    private $environment;
    private $accessToken;
    private $baseUrl;

    /**
     * Constructor - Initialize M-Pesa configuration
     */
    public function __construct()
    {
        global $sqlconf;

        // Load configuration from globals table
        $this->consumerKey = $this->getGlobalValue('mpesa_consumer_key');
        $this->consumerSecret = $this->getGlobalValue('mpesa_consumer_secret');
        $this->passkey = $this->getGlobalValue('mpesa_passkey');
        $this->shortcode = $this->getGlobalValue('mpesa_shortcode');
        $this->environment = $this->getGlobalValue('mpesa_environment') ?: 'sandbox';

        // Set base URL based on environment
        $this->baseUrl = ($this->environment === 'production')
            ? 'https://api.safaricom.co.ke'
            : 'https://sandbox.safaricom.co.ke';

        $this->accessToken = null;
    }

    /**
     * Get global configuration value from database
     */
    private function getGlobalValue($key)
    {
        $result = sqlQuery("SELECT gl_value FROM globals WHERE gl_name = ?", array($key));
        return $result ? $result['gl_value'] : '';
    }

    /**
     * Authenticate and get access token from M-Pesa API
     */
    public function authenticate()
    {
        $url = $this->baseUrl . '/oauth/v1/generate?grant_type=client_credentials';

        $credentials = base64_encode($this->consumerKey . ':' . $this->consumerSecret);

        $headers = array(
            'Authorization: Basic ' . $credentials,
            'Content-Type: application/json'
        );

        $response = $this->makeCurlRequest($url, 'GET', $headers);

        if ($response && isset($response['access_token'])) {
            $this->accessToken = $response['access_token'];
            return true;
        }

        return false;
    }

    /**
     * Initiate STK Push for Lipa na M-Pesa Online
     */
    public function stkPush($phoneNumber, $amount, $accountReference, $transactionDesc = 'OpenEMR Payment')
    {
        if (!$this->accessToken && !$this->authenticate()) {
            return array('error' => 'Authentication failed');
        }

        $url = $this->baseUrl . '/mpesa/stkpush/v1/processrequest';

        $timestamp = date('YmdHis');
        $password = base64_encode($this->shortcode . $this->passkey . $timestamp);

        // Format phone number (remove leading + and ensure it starts with 254)
        $phoneNumber = $this->formatPhoneNumber($phoneNumber);

        $payload = array(
            'BusinessShortCode' => $this->shortcode,
            'Password' => $password,
            'Timestamp' => $timestamp,
            'TransactionType' => 'CustomerPayBillOnline',
            'Amount' => (int)$amount,
            'PartyA' => $phoneNumber,
            'PartyB' => $this->shortcode,
            'PhoneNumber' => $phoneNumber,
            'CallBackURL' => $this->getCallbackUrl(),
            'AccountReference' => $accountReference,
            'TransactionDesc' => $transactionDesc
        );

        $headers = array(
            'Authorization: Bearer ' . $this->accessToken,
            'Content-Type: application/json'
        );

        $response = $this->makeCurlRequest($url, 'POST', $headers, json_encode($payload));

        return $response;
    }

    /**
     * Process callback from M-Pesa
     */
    public function processCallback($callbackData)
    {
        // Log the callback for debugging
        error_log('M-Pesa Callback: ' . json_encode($callbackData));

        if (!isset($callbackData['Body']['stkCallback'])) {
            return array('error' => 'Invalid callback data');
        }

        $callback = $callbackData['Body']['stkCallback'];
        $resultCode = $callback['ResultCode'];
        $resultDesc = $callback['ResultDesc'];
        $merchantRequestId = $callback['MerchantRequestID'];
        $checkoutRequestId = $callback['CheckoutRequestID'];

        // Find the payment session by MerchantRequestID or CheckoutRequestID
        $paymentId = $this->findPaymentByReference($merchantRequestId, $checkoutRequestId);

        if (!$paymentId) {
            return array('error' => 'Payment session not found');
        }

        if ($resultCode == 0) {
            // Successful transaction
            $callbackMetadata = $callback['CallbackMetadata']['Item'];

            $transactionData = array();
            foreach ($callbackMetadata as $item) {
                $transactionData[$item['Name']] = $item['Value'];
            }

            // Update payment record with transaction details
            $this->updatePaymentRecord($paymentId, $transactionData, 'completed');

            return array(
                'success' => true,
                'message' => 'Payment completed successfully',
                'transaction_id' => $transactionData['MpesaReceiptNumber']
            );
        } else {
            // Failed transaction
            $this->updatePaymentRecord($paymentId, array(), 'failed', $resultDesc);

            return array(
                'success' => false,
                'message' => $resultDesc
            );
        }
    }

    /**
     * Format phone number for M-Pesa API
     */
    private function formatPhoneNumber($phoneNumber)
    {
        // Remove any non-numeric characters
        $phoneNumber = preg_replace('/\D/', '', $phoneNumber);

        // Remove leading + if present
        if (substr($phoneNumber, 0, 1) === '+') {
            $phoneNumber = substr($phoneNumber, 1);
        }

        // If starts with 0, replace with 254
        if (substr($phoneNumber, 0, 1) === '0') {
            $phoneNumber = '254' . substr($phoneNumber, 1);
        }

        // If doesn't start with 254, add it
        if (substr($phoneNumber, 0, 3) !== '254') {
            $phoneNumber = '254' . $phoneNumber;
        }

        return $phoneNumber;
    }

    /**
     * Get callback URL for M-Pesa
     */
    private function getCallbackUrl()
    {
        $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
        $host = $_SERVER['HTTP_HOST'];
        return $protocol . '://' . $host . '/interface/billing/mpesa_callback.php';
    }

    /**
     * Find payment session by reference IDs
     */
    private function findPaymentByReference($merchantRequestId, $checkoutRequestId)
    {
        // Try to find by MerchantRequestID first, then CheckoutRequestID
        $result = sqlQuery("SELECT session_id FROM ar_session WHERE reference = ? OR description LIKE ?",
            array($merchantRequestId, '%' . $checkoutRequestId . '%'));

        return $result ? $result['session_id'] : null;
    }

    /**
     * Update payment record with transaction details
     */
    private function updatePaymentRecord($paymentId, $transactionData, $status, $errorMessage = '')
    {
        $updateData = array(
            'modified_time' => date('Y-m-d H:i:s')
        );

        if ($status === 'completed' && isset($transactionData['MpesaReceiptNumber'])) {
            $updateData['reference'] = $transactionData['MpesaReceiptNumber'];
            $updateData['description'] = 'M-Pesa Payment - ' . $transactionData['MpesaReceiptNumber'];
        } elseif ($status === 'failed') {
            $updateData['description'] = 'M-Pesa Payment Failed: ' . $errorMessage;
        }

        sqlStatement("UPDATE ar_session SET " . $this->buildUpdateString($updateData) . " WHERE session_id = ?",
            array_merge(array_values($updateData), array($paymentId)));
    }

    /**
     * Build UPDATE SQL string from array
     */
    private function buildUpdateString($data)
    {
        $parts = array();
        foreach ($data as $key => $value) {
            $parts[] = $key . ' = ?';
        }
        return implode(', ', $parts);
    }

    /**
     * Make cURL request to M-Pesa API
     */
    private function makeCurlRequest($url, $method = 'GET', $headers = array(), $data = null)
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // For development only

        if ($method === 'POST') {
            curl_setopt($ch, CURLOPT_POST, true);
            if ($data) {
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            }
        }

        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($httpCode >= 200 && $httpCode < 300) {
            return json_decode($response, true);
        }

        error_log('M-Pesa API Error: ' . $response);
        return false;
    }
}
?>
