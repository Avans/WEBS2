<?php
require __DIR__ . DIRECTORY_SEPARATOR . 'vendor/autoload.php';

use Aura\Accept\AcceptFactory;

$accept_factory = new AcceptFactory($_SERVER);
$accept = $accept_factory->newInstance();

$translations = [
    0 => 'en',
    'nl' => 'Hallo!',
    'en' => 'Hello!',
    'de' => 'Guten Tag!',
    'fr' => 'Bonjour!'
];
$negotiatedLanguage = $accept->negotiateLanguage(array_keys($translations));
if ($negotiatedLanguage === false) {
    echo $translations[$translations[0]];
} else {
    echo $translations[$negotiatedLanguage->getValue()];
}