<?php
require __DIR__ . DIRECTORY_SEPARATOR . 'vendor/autoload.php';
$keyFile = __DIR__  . DIRECTORY_SEPARATOR . 'key';
if (file_exists($keyFile)) {
    return \Defuse\Crypto\Key::loadFromAsciiSafeString(file_get_contents($keyFile));
}
$key = \Defuse\Crypto\Key::createNewRandomKey();
file_put_contents($keyFile, $key->saveToAsciiSafeString());
return $key;
