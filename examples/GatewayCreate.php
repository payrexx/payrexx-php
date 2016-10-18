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
$instanceName = 'YOUR_INSTANCE_NAME';

// $secret is the payrexx secret for the communication between the applications
// if you think someone got your secret, just regenerate it in the payrexx administration
$secret = 'YOUR_SECRET';

$payrexx = new \Payrexx\Payrexx($instanceName, $secret);

$gateway = new \Payrexx\Models\Request\Gateway();

// amount multiplied by 100
$gateway->setAmount(89.25 * 100);

// currency ISO code
$gateway->setCurrency('CHF');

//success and failed url in case that merchant redirects to payment site instead of using the modal view
$gateway->setSuccessRedirectUrl('https://www.merchant-website.com/success');
$gateway->setFailedRedirectUrl('https://www.merchant-website.com/failed');

// optional: payment service provider(s) to use (see http://developers.payrexx.com/docs/miscellaneous)
// empty array = all available psps
$gateway->setPsp(array());

// optional: reference id of merchant (e. g. order number)
$gateway->setReferenceId(975382);

// optional: add contact information which should be stored along with payment
$gateway->addField($type = 'title', $value = 'mister');
$gateway->addField($type = 'forename', $value = 'Maximilian');
$gateway->addField($type = 'surname', $value = 'Pichler');
$gateway->addField($type = 'company', $value = 'Pichler Solutions');
$gateway->addField($type = 'street', $value = 'Seeweg 123');
$gateway->addField($type = 'postcode', $value = '1234');
$gateway->addField($type = 'place', $value = 'Englach');
$gateway->addField($type = 'country', $value = 'AT');
$gateway->addField($type = 'phone', $value = '+43123456789');
$gateway->addField($type = 'email', $value = 'info@pichler-solutions.com');
$gateway->addField($type = 'date_of_birth', $value = '03.06.1985');
$gateway->addField($type = 'custom_field_1', $value = '123456789', $name = array(
    1 => 'Benutzerdefiniertes Feld (DE)',
    2 => 'Benutzerdefiniertes Feld (EN)',
    3 => 'Benutzerdefiniertes Feld (FR)',
    4 => 'Benutzerdefiniertes Feld (IT)',
));

try {
    $response = $payrexx->create($gateway);
    var_dump($response);
} catch (\Payrexx\PayrexxException $e) {
    print $e->getMessage();
}
