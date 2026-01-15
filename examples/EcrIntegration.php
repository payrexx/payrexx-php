<?php

/**
 * Example: ECR / Terminal Integration
 *
 * @author    Payrexx Development <info@payrexx.com>
 * @copyright Payrexx AG
 */

spl_autoload_register(function($class) {
    $root = dirname(__DIR__);
    $classFile = $root . '/lib/' . str_replace('\\', '/', $class) . '.php';
    if (file_exists($classFile)) {
        require_once $classFile;
    }
});

use Payrexx\Payrexx;
use Payrexx\Models\Request\Ecr;
use Payrexx\PayrexxException;


// Configuration
$instanceName = 'YOUR_INSTANCE_NAME';
$apiSecret    = 'YOUR_API_SECRET';
$terminalSerial = 'YOUR_TERMINAL_SERIAL'; // e.g. "SN12345678"

$payrexx = new Payrexx($instanceName, $apiSecret);

echo "--- Payrexx ECR Integration Test ---\n\n";

try {
    // 1. Pair Terminal
    // This connects the physical terminal to your specific Payrexx instance.
    echo "[1] Pairing Terminal...\n";
    $ecrPair = new Ecr();
    $ecrPair->setPairingCode('123456');
    $ecrPair->setName('Shop Terminal 1');
    $ecrPair->setId($terminalSerial);

    try {
        $pairResponse = $payrexx->pair($ecrPair);
        echo "    Status: " . $pairResponse->getStatus() . "\n";
    } catch (PayrexxException $e) {
        // Ignored here because re-pairing an already paired terminal throws an error
        echo "    Info: " . $e->getMessage() . "\n";
    }
    echo "\n";

    // 2. Get Payment Methods
    // Retrieve available brands (Visa, Mastercard, TWINT, etc.) from the terminal.
    echo "[2] Fetching Payment Methods...\n";
    $ecrMethods = new Ecr();
    $ecrMethods->setId($terminalSerial);

    $methodsResponse = $payrexx->getEcrPaymentMethods($ecrMethods);

    if (is_array($methodsResponse)) {
        foreach ($methodsResponse as $method) {
            echo "    - " . $method->getName() . " (" . $method->getBrand() . ")\n";
        }
    } else {
        // Handle edge case where single object is returned
        echo "    - " . $methodsResponse->getName() . "\n";
    }
    echo "\n";


    // 3. Initiate Payment
    echo "[3] Initiating Payment (15.00 CHF)...\n";
    $ecrPay = new Ecr();
    $ecrPay->setId($terminalSerial);
    $ecrPay->setAmount(1500); // Amount in cents (15.00)
    $ecrPay->setCurrency('CHF');
    $ecrPay->setPurpose('Test Transaction via PHP SDK');

    $payResponse = $payrexx->pay($ecrPay);

    $transactionId = $payResponse->getTransactionId();
    echo "    Payment Initiated!\n";
    echo "    Transaction ID: " . $transactionId . "\n";
    echo "    Status: " . $payResponse->getStatus() . "\n";
    echo "\n";


    if ($transactionId) {
        sleep(1);

        // 4. Get Payment Details (Status Check)
        echo "[4] Checking Payment Status...\n";
        $ecrCheck = new Ecr();
        $ecrCheck->setPaymentId($terminalSerial, $transactionId);

        $checkResponse = $payrexx->getEcrPayment($ecrCheck);
        echo "    Current Status: " . $checkResponse->getStatus() . "\n";
        echo "    UUID: " . $checkResponse->getTransactionUuid() . "\n";
        echo "\n";


        // 5. Cancel Payment or Void
        // --- OPTION A: CANCEL (For waiting/open transactions) ---
        echo "[5] Cancelling the Payment...\n";
        $ecrCancel = new Ecr();
        $ecrCancel->setPaymentId($terminalSerial, $transactionId);

        $cancelResponse = $payrexx->cancelEcrPayment($ecrCancel);
        echo "    Cancel Status: " . $cancelResponse->getStatus() . "\n";
        // --- OPTION B: VOID (For confirmed transactions not yet settled) ---
        /*
        echo "[5b] Voiding the Payment...\n";
        $ecrVoid = new Ecr();
        $ecrVoid->setPaymentId($terminalSerial, $transactionId);

        try {
            $voidResponse = $payrexx->voidEcrPayment($ecrVoid);
            echo "    Void Status: " . $voidResponse->getStatus() . "\n";
        } catch (PayrexxException $e) {
            echo "    Void failed: " . $e->getMessage() . "\n";
        }
        */
        echo "\n";
    }

    // 6. Unpair Terminal
    // Releases the lock so the terminal can be used elsewhere.
    echo "[6] Unpairing Terminal...\n";
    $ecrUnpair = new Ecr();
    $ecrUnpair->setId($terminalSerial);

    $unpairResponse = $payrexx->unpair($ecrUnpair);
    echo "    Status: " . $unpairResponse->getStatus() . "\n";
    echo "    Terminal un-paired successfully.\n";

} catch (PayrexxException $e) {
    echo "\n!!! ERROR !!!\n";
    echo "Message: " . $e->getMessage() . "\n";
}