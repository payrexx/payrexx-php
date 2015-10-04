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
$secret = '36eq0G2PGcHxIxBlSMtDHFDn0vkyIA';

$payrexx = new \Payrexx\Payrexx($instanceName, $secret);

// init empty request object
$invoice = new \Payrexx\Models\Request\Invoice();

// info for payment page (title, description)
$invoice->addTitle('Online shop payment');
$invoice->addDescription('Thanks for using Payrexx to pay your order');

// administrative information, which provider to use (psp)
// psp #0 = Default psp, see http://developers.payrexx.com/en/REST-API/Miscellaneous
$invoice->setPsp(0);

// payment information
$invoice->addPurpose('Shop Order #001');
$invoice->setAmount(5.90);
// ISO code of currency, list of alternatives can be found here
// http://developers.payrexx.com/en/REST-API/Miscellaneous
$invoice->setCurrency('CHF');

// subscription information if you want the customer to authorize a recurring payment
$invoice->setUseSubscription(true);
$invoice->setSubscriptionInterval('P1M');
$invoice->setSubscriptionPeriod('P1Y');
$invoice->setSubscriptionCancellationInterval('P3M');

$invoice->setDisplayTerms(true);

// add contact information fields which should be filled by customer
// it would be great to provide at least an email address field
$formElement = new \Payrexx\Models\Request\FormElement();
$formElement->setType(\Payrexx\Models\Request\FormElement::TYPE_HEADLINE);
$formElement->addLabel('Contact details');
$invoice->addFormElement($formElement);

$formElement = new \Payrexx\Models\Request\FormElement();
$formElement->setType(\Payrexx\Models\Request\FormElement::TYPE_EMAIL);
$formElement->setMandatory(true);
$invoice->addFormElement($formElement);

// fire request with created and filled link request-object.
try {
    $response = $payrexx->create($invoice);
    var_dump($response);
} catch (\Payrexx\PayrexxException $e) {
    print $e->getMessage();
}
