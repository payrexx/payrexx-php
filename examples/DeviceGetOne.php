<?php

/**
 * Example for Get Device
 *
 * @author    Payrexx Development <info@payrexx.com>
 * @copyright Payrexx AG
 * @since     v1.8.12
 */

use Payrexx\Models\Request\Device;
use Payrexx\Payrexx;
use Payrexx\PayrexxException;

spl_autoload_register(function ($class) {
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
// if you think someone got your secret, just regenerate it in the payrexx administration
$secret = 'YOUR_SECRET';

try {
    $payrexx = new Payrexx($instanceName, $secret);
} catch (PayrexxException $e) {
    print $e->getMessage();
    exit();
}

$device = new Device();

$device->setId('DEVICE_ID');
$device->setDeviceUrl('YOUR_WEBSHOP_URL');
try {
    $response = $payrexx->getOne($device);
    var_dump($response);
} catch (PayrexxException $e) {
    print $e->getMessage();
}
