<?php
/**
 * Test M-Pesa Integration Locally
 * 
 * Usage: Access this file in browser: http://localhost/openemr/test_mpesa_local.php
 */

$ignoreAuth = true; // Skip login check
require_once('interface/globals.php');
require_once('library/Mpesa.php');

$mpesa = new Mpesa();

echo "<h1>M-Pesa Local Verification</h1>";
echo "<p>Checking configuration and connectivity...</p>";

// 1. Test Authentication
echo "<h3>1. Testing Authentication</h3>";
try {
    if ($mpesa->authenticate()) {
        echo "<div style='color:green; font-weight:bold;'>[PASS] Authentication Successful! Access Token retrieved.</div>";
    } else {
        echo "<div style='color:red; font-weight:bold;'>[FAIL] Authentication Failed.</div>";
        echo "<p>Please check your Consumer Key and Consumer Secret in the database (globals table).</p>";
    }
} catch (Exception $e) {
    echo "<div style='color:red;'>Exception: " . $e->getMessage() . "</div>";
}

// 2. Test STK Push
echo "<h3>2. Testing STK Push</h3>";

if (isset($_GET['phone'])) {
    $phone = $_GET['phone'];
    $amount = 1; // Test amount
    $reference = "TEST-" . time();
    $desc = "Local Verification Test";

    echo "Initiating STK Push to <b>$phone</b> for KES <b>$amount</b>...<br>";
    
    // Check if configuration exists
    $consumerKey = $GLOBALS['mpesa_consumer_key'] ?? 'NOT SET';
    // (Note: library/Mpesa.php reads from DB, not $GLOBALS directly, but good to know)

    $response = $mpesa->stkPush($phone, $amount, $reference, $desc);
    
    echo "<h4>API Response:</h4>";
    echo "<pre style='background:#f4f4f4; padding:10px; border:1px solid #ccc;'>" . print_r($response, true) . "</pre>";
    
    if (isset($response['ResponseCode']) && $response['ResponseCode'] == '0') {
        echo "<div style='color:green; font-weight:bold;'>[PASS] STK Push Initiated Successfully! Check your phone.</div>";
        echo "<p>MerchantRequestID: " . $response['MerchantRequestID'] . "</p>";
        echo "<p>CheckoutRequestID: " . $response['CheckoutRequestID'] . "</p>";
        
        echo "<h4>3. Simulate Callback (Manual)</h4>";
        echo "<p>Since we are on localhost, Safaricom cannot call us back. You can simulate the callback by using Postman to POST the following JSON to <code>http://localhost/openemr/interface/billing/mpesa_callback.php</code>:</p>";
        
        $sampleCallback = [
            "Body" => [
                "stkCallback" => [
                    "MerchantRequestID" => $response['MerchantRequestID'],
                    "CheckoutRequestID" => $response['CheckoutRequestID'],
                    "ResultCode" => 0,
                    "ResultDesc" => "The service request is processed successfully.",
                    "CallbackMetadata" => [
                        "Item" => [
                            ["Name" => "Amount", "Value" => $amount],
                            ["Name" => "MpesaReceiptNumber", "Value" => "ABC1234567"],
                            ["Name" => "TransactionDate", "Value" => date("YmdHis")],
                            ["Name" => "PhoneNumber", "Value" => $phone]
                        ]
                    ]
                ]
            ]
        ];
        
        echo "<textarea rows='15' cols='80'>" . json_encode($sampleCallback, JSON_PRETTY_PRINT) . "</textarea>";
        
    } else {
        echo "<div style='color:red; font-weight:bold;'>[FAIL] STK Push Failed.</div>";
    }

} else {
    echo "<form method='GET'>
    <label>Enter Test Phone Number (format 07...): </label>
    <input type='text' name='phone' placeholder='0712345678' required>
    <input type='submit' value='Test STK Push'>
    </form>";
}
?>
