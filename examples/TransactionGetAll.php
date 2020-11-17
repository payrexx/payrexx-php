<?php

spl_autoload_register(function($class) {
    $root = dirname(__DIR__);
    $classFile = $root . '/lib/' . str_replace('\\', '/', $class) . '.php';
    if (file_exists($classFile)) {
        require_once $classFile;
    }
});

// $instanceName is a part of the url where you access your payrexx installation.
// https://{$instanceName}.payrexx.com
$instanceName = 'demo';

// $secret is the payrexx secret for the communication between the applications
// if you think someone got your secret, just regenerate it in the payrexx administration
$secret = 'ejJwJhT4WcBrpBQcaqHJhn0OQkKxK3';

$payrexx = new \Payrexx\Payrexx($instanceName, $secret, null, 'payrexx.com.loc');

$transaction = new \Payrexx\Models\Request\Transaction();
$transaction->setFilterDatetimeUtcGreaterThan(new \DateTime('2019-12-01 00:00:00'));
$transaction->setFilterDatetimeUtcLessThan(new \DateTime('2020-10-01 00:00:00'));
$transaction->setOffset(40);
$transaction->setLimit(20);

try {
    $response = $payrexx->getAll($transaction);
    var_dump($response);
} catch (\Payrexx\PayrexxException $e) {
    print $e->getMessage();
}
