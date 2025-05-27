<?php

/**
 * Example for Bill create
 *
 * @author    Payrexx Development <info@payrexx.com>
 * @copyright Payrexx AG
 * @since     v2.0.0
 */

use Payrexx\Models\Request\Bill;
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

$bill = new Bill();

$bill->setLanguage('EN');
// currency ISO code
$bill->setCurrency('CHF');
// Due days
$bill->setDueAfterDays(5);
$bill->setRecipient([
    'first_name' => 'Max',
    'last_name' => 'Mustermann',
    'email' => 'max.muster@payrexx.com',
    'country' => 'AT',
]);
$bill->setPositions(
    [
        [
            'title' => 'product1',
            'type' => 'piece', // piece|hour|day|flat
            'number' => 2,
            'price' => 1200, // amount multiplied by 100
            'vat' => 8.1,
            'description' => 'DESCRIPTION',
            'discount' => [
                'type' => 'amount',
                'amount' => 500,
            ],
        ]
    ]
);

// optional
// $bill->setServicePeriod([
//    'from' => '2025-05-02',
//    'to' => '2025-06-02'
// ]);
// $bill->setDiscount([
//    'type' => 'amount', // percent or amount
//    'amount' => 200, // multiplied by 100
// ]);

// $bill->setCashDiscounts([
//    [
//        'days' => 2,
//        'percent' => 3
//    ],
// ]);
// $bill->setShippingCost(200); // multiplied by 100
// $bill->setApplicationFee(300); // multiplied by 100
// $bill->setNote('YOUR_NOTES');
// $bill->setTerms('YOUR_TERMS');
// $bill->setAttachments([
//    [
//        'name' => 'invioce.pdf',
//        'data' => 'data:application/pdf;base64 ....',
//    ],
// ]);
// $bill->setBankInformation([
//    'iban' => '',
//    'name' => '',
//    'address' => '',
// ]);
// $bill->setPayoutDescriptor('YOUR_PAYOUT_DESCRIPTOR');
// $bill->setPsp([13]);
// $bill->setPm(['visa']);
// $bill->setReminders([
//    [
//        'days' => 5,
//        'fee' => 300, // multiplied by 100
//        'friendly' => true,
//        'delay_type' => 'days_after_invoice_date',// days_after_invoice_date | days_before_due_date | days_after_due_date
//    ]
// ]);
// $bill->setReference('YOUR_REFERENCE');
// $bill->setDesign('YOUR_DESIGN_UUID');
// $bill->setSend(false); // Whether to send the invoice.
// $bill->setAdditionalRecipient(
//    [
//        'recipient1@payrexx.com',
//        'recipient2@payrexx.com',
//    ]
// );
// $bill->setComplete(false); // Whether to complete the invoice.

try {
    $response = $payrexx->create($bill);
    var_dump($response);
} catch (PayrexxException $e) {
    print $e->getMessage();
}
