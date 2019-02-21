<?php
const PAYMENT_FILE = __DIR__ . DIRECTORY_SEPARATOR . 'payment';

if (is_file(PAYMENT_FILE) === false) {
    exit('Please pay first');
}

require __DIR__ . DIRECTORY_SEPARATOR . 'vendor/autoload.php';

// For this to work: create a php file (apikey.php) which returns the API key as string
$apikey = require __DIR__ . DIRECTORY_SEPARATOR . 'apikey.php';

$mollie = new \Mollie\Api\MollieApiClient();
$mollie->setApiKey($apikey);

$payment_id = file_get_contents(PAYMENT_FILE);
unlink(PAYMENT_FILE);

$payment = $mollie->payments->get($payment_id);

if ($payment->isPaid())
{
    exit("Payment received.");
}
exit("Something went wrong, please try again.");