<?php

/** Example: ECR Pairing request */

spl_autoload_register(function($class) {
    $root = dirname(__DIR__);
    $classFile = $root . '/lib/' . str_replace('\\', '/', $class) . '.php';
    if (file_exists($classFile)) {
        require_once $classFile;
    }
});

// $instanceName is a part of the url where you access your payrexx installation.
// https://{$instanceName}.payrexx.com
$instanceName = 'YOUR_INSTANCE_NAME';

// $secret is the payrexx secret for the communication between the applications
$secret = 'YOUR_SECRET';

$payrexx = new \Payrexx\Payrexx($instanceName, $secret);

// Initialize the ECR Request Model
// Note: You will need to ensure \Payrexx\Models\Request\Ecr exists in your SDK
$ecr = new \Payrexx\Models\Request\Ecr();

// --------------------------------------------------------------------------
// MANDATORY FIELDS
// --------------------------------------------------------------------------

// The Serial Number of the terminal (Required by server: $this->data['serialNumber'])
$ecr->setSerialNumber('N500W4T5897');

// The Pairing Code / OTP (Required for NAKA solution provider)
$ecr->setPairingCode('123456');

// --------------------------------------------------------------------------
// OPTIONAL FIELDS
// --------------------------------------------------------------------------

// Name of the cashier performing the pairing
$ecr->setCashierName('Max Mustermann');

// --------------------------------------------------------------------------
// EXECUTION
// --------------------------------------------------------------------------

try {
    // Depending on your SDK implementation, you might use generic create()
    // or a specific method like pair() if you implemented one.
    // Assuming the standard 'create' maps to the POST endpoint:
    $response = $payrexx->create($ecr);

    // If you have extended the main Payrexx class with a specific 'pair' method
    // to handle the specific URL structure (/ecr/{id}/pair):
    // $response = $payrexx->pair($ecr);

    var_dump($response);
} catch (\Payrexx\PayrexxException $e) {
    print $e->getMessage();
}