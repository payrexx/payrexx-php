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

$qrCode = new \Payrexx\Models\Request\QRCode();

// amount multiplied by 100
$qrCode->setAmount(89.25 * 100);

// currency ISO code
$qrCode->setCurrency('CHF');

// purpose
$qrCode->setPurpose('This is a test');

// optional: parse multiple products
//$qrCode->setBasket([
//    [
//        'name' => [
//            1 => 'Dies ist der Produktbeispielname 1 (DE)',
//            2 => 'This is product sample name 1 (EN)',
//            3 => 'Ceci est le nom de l\'échantillon de produit 1 (FR)',
//            4 => 'Questo è il nome del campione del prodotto 1 (IT)'
//        ],
//        'description' => [
//            1 => 'Dies ist die Produktmusterbeschreibung 1 (DE)',
//            2 => 'This is product sample description 1 (EN)',
//            3 => 'Ceci est la description de l\'échantillon de produit 1 (FR)',
//            4 => 'Questa è la descrizione del campione del prodotto 1 (IT)'
//        ],
//        'quantity' => 1,
//        'amount' => 100
//    ],
//    [
//        'name' => [
//            1 => 'Dies ist der Produktbeispielname 2 (DE)',
//            2 => 'This is product sample name 2 (EN)',
//            3 => 'Ceci est le nom de l\'échantillon de produit 2 (FR)',
//            4 => 'Questo è il nome del campione del prodotto 2 (IT)'
//        ],
//        'description' => [
//            1 => 'Dies ist die Produktmusterbeschreibung 2 (DE)',
//            2 => 'This is product sample description 2 (EN)',
//            3 => 'Ceci est la description de l\'échantillon de produit 2 (FR)',
//            4 => 'Questa è la descrizione del campione del prodotto 2 (IT)'
//        ],
//        'quantity' => 2,
//        'amount' => 200
//    ]
//]);
//
// optional: reference id of merchant (e. g. order number)
$qrCode->setReferenceId(975382);

// optional: The url to redirect to after QR scanned
$qrCode->setEndPoint('https://www.merchant-website.com/cart');


try {
    $response = $payrexx->create($qrCode);
    var_dump($response);
} catch (\Payrexx\PayrexxException $e) {
    print $e->getMessage();
}
