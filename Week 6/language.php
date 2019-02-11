<?php

$negotiatedLanguage = Locale::acceptFromHttp($_SERVER['HTTP_ACCEPT_LANGUAGE']);

$translations = [
    0 => 'en',
    'nl' => 'Hallo!',
    'en' => 'Hello!',
    'de' => 'Guten Tag!',
    'fr' => 'Bonjour!'
];
if (array_key_exists($negotiatedLanguage, $translations) === false) {
    echo $translations[$translations[0]];
} else {
    echo $translations[$negotiatedLanguage];
}