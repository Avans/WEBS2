<?php

$negotiatedLanguage = Locale::acceptFromHttp($_SERVER['HTTP_ACCEPT_LANGUAGE']);

$translations = [
    'nl' => 'Hallo!',
    'en' => 'Hello!',
    'de' => 'Guten Tag!',
    'fr' => 'Bonjour!'
];
$negotiatedLanguage = Locale::lookup (array_keys($translations), $negotiatedLanguage, true,'en');
echo $translations[$negotiatedLanguage];