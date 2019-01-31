<?php
if (filter_has_var(INPUT_GET, 'message') === false) {
    exit('Please supply a message to encrypt: ?message=...');
}
$key = require __DIR__ . DIRECTORY_SEPARATOR . 'key.php';
$b64cipher = base64_encode(\Defuse\Crypto\Crypto::encrypt($_GET['message'], $key));
echo $b64cipher . '<br>';
?><a href="decrypt.php?ciphertext=<?=htmlentities($b64cipher);?>">Decrypt!</a>