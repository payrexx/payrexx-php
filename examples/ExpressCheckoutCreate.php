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

$expressCheckout = new \Payrexx\Models\Request\ExpressCheckout();

// amount multiplied by 100
$expressCheckout->setAmount(89.25 * 100);

// currency ISO code
$expressCheckout->setCurrency('CHF');

//success and failed url in case that merchant redirects to payment site instead of using the modal view
$expressCheckout->setSuccessRedirectUrl('https://www.merchant-website.com/success');
$expressCheckout->setFailedRedirectUrl('https://www.merchant-website.com/failed');

// optional: payment service provider(s) to use (see http://developers.payrexx.com/docs/miscellaneous)
// empty array = all available psps
$expressCheckout->setPsp(array());

// optional: reference id of merchant (e. g. order number)
$expressCheckout->setReferenceId(975382);

// optional: add contact information which should be stored along with payment (information will not be shown to customer)
$expressCheckout->addField($type = 'title', $value = 'mister');
$expressCheckout->addField($type = 'forename', $value = 'Maximilian');
$expressCheckout->addField($type = 'surname', $value = 'Pichler');
$expressCheckout->addField($type = 'company', $value = 'Pichler Solutions');
$expressCheckout->addField($type = 'street', $value = 'Seeweg 123');
$expressCheckout->addField($type = 'postcode', $value = '1234');
$expressCheckout->addField($type = 'place', $value = 'Englach');
$expressCheckout->addField($type = 'country', $value = 'AT');
$expressCheckout->addField($type = 'phone', $value = '+43123456789');
$expressCheckout->addField($type = 'email', $value = 'info@pichler-solutions.com');
$expressCheckout->addField($type = 'date_of_birth', $value = '03.06.1985');
$expressCheckout->addField($type = 'custom_field_1', $value = '123456789', $name = array(
    1 => 'Benutzerdefiniertes Feld (DE)',
    2 => 'Benutzerdefiniertes Feld (EN)',
    3 => 'Benutzerdefiniertes Feld (FR)',
    4 => 'Benutzerdefiniertes Feld (IT)',
));

try {
    $response = $payrexx->create($expressCheckout);
    var_dump($response);
} catch (\Payrexx\PayrexxException $e) {
    print $e->getMessage();
}
