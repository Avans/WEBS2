<?php

$negotiatedLanguage = Locale::acceptFromHttp($_SERVER['HTTP_ACCEPT_LANGUAGE']);

$translations = [
    0 => 'en',
    'nl' => 'Hallo!',
    'en' => 'Hello!',
    'de' => 'Guten Tag!',
    'fr' => 'Bonjour!'
];
if ($negotiatedLanguage === null) {
    $negotiatedLanguage = $translations[0];
} elseif (array_key_exists($negotiatedLanguage, $translations) === false) {
    $negotiatedLanguage = $translations[0];
}
echo $translations[$negotiatedLanguage];