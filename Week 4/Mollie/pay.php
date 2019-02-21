<?php
require __DIR__ . DIRECTORY_SEPARATOR . 'vendor/autoload.php';
require __DIR__ . DIRECTORY_SEPARATOR . 'BaseURL.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    print BaseURL::generateFromServerGlobal();
    ?><form method="post"><input type="submit" value="Betalen!" /></form>
    <?php
    exit;
}

// For this to work: create a php file (apikey.php) which returns the API key as string
$apikey = require __DIR__ . DIRECTORY_SEPARATOR . 'apikey.php';

$mollie = new \Mollie\Api\MollieApiClient();
$mollie->setApiKey($apikey);

$payment = $mollie->payments->create([
    "amount" => [
        "currency" => "EUR",
        "value" => "10.00"
    ],
    "description" => "My first API payment",
    "redirectUrl" => BaseURL::generateFromServerGlobal() . "/paid.php",
    "webhookUrl"  => "http://example.org/webhook.php", // should be a endpoint reachable by Mollie: https://github.com/mollie/mollie-api-php#payment-webhook
]);

// store payment id
file_put_contents(__DIR__ . DIRECTORY_SEPARATOR . 'payment', $payment->id);
header("Location: " . $payment->getCheckoutUrl(), true, 303);