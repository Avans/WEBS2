<?php
if (filter_has_var(INPUT_GET, 'ciphertext') === false) {
    exit('Please supply a ciphertext to decrypt: ?ciphertext=...');
}
$key = require __DIR__ . DIRECTORY_SEPARATOR . 'key.php';
echo \Defuse\Crypto\Crypto::decrypt(base64_decode($_GET['ciphertext']), $key);