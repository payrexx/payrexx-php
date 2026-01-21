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
use Payrexx\Models\Request\EcrPairing;
use Payrexx\Models\Request\EcrPayment;
use Payrexx\PayrexxException;


// Configuration
$instanceName = 'YOUR_INSTANCE_NAME';
$apiSecret    = 'YOUR_API_SECRET';
$terminalSerial = 'YOUR_TERMINAL_SERIAL'; // e.g. "SN12345678"

$payrexx = new Payrexx($instanceName, $apiSecret);

try {
    // 1. Pair Terminal
    // This connects the physical terminal to your specific Payrexx instance.
    echo "[1] Pairing Terminal...\n";
    $ecrPair = new EcrPairing();
    $ecrPair->setPairingCode('PAIRING_CODE_FROM_TERMINAL');
    $ecrPair->setCashierName('CASHIER_NAME');
    $ecrPair->setSerialNumber($terminalSerial);
    echo "    Terminal Serial: " . $terminalSerial . "\n";

    try {
        $pairResponse = $payrexx->pair($ecrPair);

        echo "    Status: " . $pairResponse->getStatus() . "\n";
        echo "    Cashier: " . $pairResponse->getCashierName() . "\n";

        $config = $pairResponse->getConfiguration();
        if ($config) {
            echo "    Configuration:\n";
            echo "      - Currency: " . ($config['currency'] ?? 'N/A') . "\n";
            echo "      - Language: " . ($config['language'] ?? 'N/A') . "\n";
            echo "      - POS Name: " . ($config['pointOfSaleName'] ?? 'N/A') . "\n";
            echo "      - Timezone: " . ($config['timezone'] ?? 'N/A') . "\n";
            echo "      - Has Tipping: " . ($config['hasTipping'] ?? 'N/A') . "\n";
        }
    } catch (PayrexxException $e) {
        echo "    Info: " . $e->getMessage() . "\n";
    }
    echo "\n";

    // 2. Get Payment Methods
    echo "[2] Fetching Payment Methods...\n";
    $ecrMethods = new EcrPairing();
    $ecrMethods->setSerialNumber($terminalSerial);

    $methodsResponse = $payrexx->getEcrPaymentMethods($ecrMethods);
    $methods = $methodsResponse->getData();
    if (!empty($methods)) {
        echo "<pre>";
        var_dump($methods);
        echo "</pre>\n";
    } else {
        echo "    No methods found.\n";
    }
    echo "\n";


    // 3. Initiate Payment
    echo "[3] Initiating Payment (15.00 CHF)...\n";

    // Constructor enforces: Serial, Amount (in cents), Currency
    $ecrPay = new EcrPayment($terminalSerial, 1500, 'CHF');
    $ecrPay->setPurpose('Test Transaction via PHP SDK');
    $ecrPay->setTipAmount(100);
    $ecrPay->setPaymentMethod('TWINT');

    // Optional: Add Line Items (Required for NAKA terminals)
    $ecrPay->addShopItem('Test Item A', 1500, '2');

    $payResponse = $payrexx->payment($ecrPay);

    $paymentId = $payResponse->getPaymentId();

    echo "    Payment Initiated!\n";
    echo "    Transaction ID: " . $paymentId . "\n";
    echo "    Status: " . $payResponse->getStatus() . "\n";
    echo "    Slip: \n";
    var_dump($payResponse->getSlip());
    echo "\n";


    if ($paymentId) {
        // Wait a moment for the transaction to be registered on the terminal
        sleep(1);

        // 4. Get Payment Details (Status Check)
        echo "[4] Checking Payment Status...\n";
        $ecrCheck = new EcrPayment($terminalSerial);
        // We set the Payment ID to target the specific transaction
        $ecrCheck->setPaymentId($paymentId);

        $checkResponse = $payrexx->getEcrPayment($ecrCheck);

        echo "    Current Status: " . $checkResponse->getStatus() . "\n";
        echo "    Slip: \n";
        var_dump($checkResponse->getSlip());
        echo "\n";


        // 5. Cancel Payment
        // Use this to cancel a transaction that is still "Waiting"
        echo "[5] Cancelling the Payment...\n";
        $ecrCancel = new EcrPayment($terminalSerial);
        $ecrCancel->setPaymentId($paymentId);

        try {
            $cancelResponse = $payrexx->cancelEcrPayment($ecrCancel);
            echo "    Cancel Status: " . $cancelResponse->getStatus() . "\n";
            echo "    Slip: \n";
            var_dump($cancelResponse->getSlip());
        } catch (PayrexxException $e) {
            echo "    Cancel Failed: " . $e->getMessage() . "\n";
        }
        echo "\n";


        // 5b. Void Payment (Commented out)
        // Use this to refund/void a confirmed transaction
        /*
        echo "[5b] Voiding the Payment...\n";
        $ecrVoid = new EcrPayment($terminalSerial);
        $ecrVoid->setPaymentId($transactionId);

        try {
            $voidResponse = $payrexx->voidEcrPayment($ecrVoid);
            echo "    Void Status: " . $voidResponse->getStatus() . "\n";
        } catch (PayrexxException $e) {
            echo "    Void failed: " . $e->getMessage() . "\n";
        }
        echo "\n";
        */
    }

    // 6. Unpair Terminal
    // Releases the lock so the terminal can be used elsewhere.
    echo "[6] Unpairing Terminal...\n";
    $ecrUnpair = new EcrPairing();
    $ecrUnpair->setSerialNumber($terminalSerial);

    $unpairResponse = $payrexx->unpair($ecrUnpair);
    echo "    Status: " . $unpairResponse->getStatus() . "\n";
    echo "    Terminal un-paired successfully.\n";

} catch (PayrexxException $e) {
    echo "\n!!! ERROR !!!\n";
    echo "Message: " . $e->getMessage() . "\n";
}