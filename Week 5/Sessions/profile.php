<?php
session_start();

function renderError(string $field, array $errors) {
    if (array_key_exists($field, $errors)) {
        ?><span class="error"><?=htmlentities($errors[$field]); ?></span><?php
    }
}

function renderInput($name, $type, $placeholder) {
    ?><input type="<?=htmlentities($type);?>" placeholder="<?=htmlentities($placeholder);?>" name="<?=htmlentities($name);?>"<?=filter_has_var(INPUT_POST, $name)?' value="' . htmlentities($_POST[$name]) . '"':'';?>><?php
}

function renderForm(array $errors) {
?>
<form action="profile.php" method="POST" enctype="multipart/form-data">
    <label for="email">E-mailadres<?php renderError("email", $errors); ?></label><?php renderInput('email', 'email', 'user@host.tld'); ?><br>
    <label for="password">Wachtwoord<?php renderError("password", $errors); ?></label><?php renderInput('password', 'password', ''); ?><br>
    <input type="submit" name="verzenden" value="Login">
</form>
<?php
}

function restoreValues(string $email) {

    $dataFilename = sys_get_temp_dir() . DIRECTORY_SEPARATOR . str_replace([DIRECTORY_SEPARATOR, '/'], '_', $email) . '.json';
    if (file_exists($dataFilename)) {
        return json_decode(file_get_contents($dataFilename), true);
    } else {
        return null;
    }
}

function renderProfile(array $storedValues) {
$key = require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'Encryption' . DIRECTORY_SEPARATOR . 'key.php';

?><h1>Hello</h1><p>
    <img src="../files/<?=htmlentities(rawurlencode(basename($storedValues['avatar'])));?>" width="150" /><br>
    Naam: <a href="<?=htmlentities($storedValues['url']);?>"><?=htmlentities(\Defuse\Crypto\Crypto::decrypt($storedValues['naam'], $key));?></a><br>
    Adres: <?=htmlentities($storedValues['adres']);?><br>
    Postcode: <?=htmlentities($storedValues['postcode']);?><br>
    Woonplaats: <?=htmlentities($storedValues['woonplaats']);?><br>
    <a href="logout.php">Afmelden</a>
</p>
<?php
}

?><!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style type="text/css">
        body {width: 100%}
        form{width: 400px;margin: auto;}
        label {display:block;}
        input {margin-bottom: 1.5em;width:100%;}
        span.error {color: #b91d19; font-size: 80%; float: right;}
    </style>
</head>
<body>
<?php
if (strcasecmp($_SERVER['REQUEST_METHOD'], 'get') === 0) {
    if (array_key_exists('email', $_SESSION)) {
        $storedValues = restoreValues($_SESSION['email']);
        renderProfile($storedValues);
    } else {
        renderForm([]);
    }
} elseif (strcasecmp($_SERVER['REQUEST_METHOD'], 'post') === 0) {
    $errors = [];
    $values = $_POST;

    if (filter_has_var(INPUT_POST, 'email') === false) {
        $errors["email"] = "E-mail is verplicht!";
    } elseif (filter_input(INPUT_POST, 'email', FILTER_DEFAULT) === "") {
        $errors["email"] = "E-mail is verplicht!";
    } elseif (filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL) === false) {
        $errors["email"] = "E-mail is onjuist!";
    }

    $storedValues = restoreValues($_POST['email']);
    if (is_null($storedValues)) {
        $errors["email"] = "Onbekende gebruiker"; // This is actually an unsafe practice. Why??
    }

    if (filter_has_var(INPUT_POST, 'password') === false) {
        $errors["password"] = "Wachtwoord onjuist";
    } elseif (filter_input(INPUT_POST, 'password', FILTER_DEFAULT) === "") {
        $errors["password"] = "Wachtwoord onjuist";
    } elseif (is_null($storedValues)) {
        // unknown user
    } elseif (password_verify($_POST['password'], $storedValues['password']) === false) {
        $errors["password"] = "Wachtwoord onjuist";
    }

    if (count($errors) > 0) {
        renderForm($errors);
    } else {
        $_SESSION['email'] = $storedValues['email'];
        renderProfile($storedValues);
    }
} else {
    ?>Onbekende actie<?php
}
?>
</body>
</html>