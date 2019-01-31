<?php
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
<form action="register-passwd.php" method="POST">
    <label for="naam">* Naam<?php renderError("naam", $errors); ?></label><?php renderInput('naam', 'text', ''); ?><br>
    <label for="email">* E-mailadres<?php renderError("email", $errors); ?></label><?php renderInput('email', 'email', 'user@host.tld'); ?><br>
    <label for="password">* Wachtwoord<?php renderError("password", $errors); ?></label><?php renderInput('password', 'password', ''); ?><br>
    <label for="adres">Adres<?php renderError("adres", $errors); ?></label><?php renderInput('adres', 'text', ''); ?><br>
    <label for="postcode">Postcode<?php renderError("postcode", $errors); ?></label><?php renderInput('postcode', 'text', ''); ?><br>
    <label for="woonplaats">Woonplaats<?php renderError("woonplaats", $errors); ?></label><?php renderInput('woonplaats', 'text', ''); ?><br>
    <label for="url">* Online Profile<?php renderError("url", $errors); ?></label><?php renderInput('url', 'url', 'https://example.com'); ?><br>
    <p>Velden met een * zijn verplicht.</p>
    <input type="submit" name="verzenden" value="Registreer">
</form>
<?php
}
?><!DOCTYPE html>
<head>
    <title>Registreer account</title>
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
    renderForm([]);
} elseif (strcasecmp($_SERVER['REQUEST_METHOD'], 'post') === 0) {
    $errors = [];

    if (filter_has_var(INPUT_POST, 'naam') === false) {
        $errors["naam"] = "Naam is verplicht!";
    } elseif (filter_input(INPUT_POST, 'naam', FILTER_DEFAULT) === "") {
        $errors["naam"] = "Naam is verplicht!";
    }

    if (filter_has_var(INPUT_POST, 'email') === false) {
        $errors["email"] = "E-mail is verplicht!";
    } elseif (filter_input(INPUT_POST, 'email', FILTER_DEFAULT) === "") {
        $errors["email"] = "E-mail is verplicht!";
    } elseif (filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL) === false) {
        $errors["email"] = "E-mail is onjuist!";
    }

    if (filter_has_var(INPUT_POST, 'password') === false) {
        $errors["password"] = "Wachtwoord is verplicht!";
    } elseif (filter_input(INPUT_POST, 'password', FILTER_DEFAULT) === "") {
        $errors["password"] = "Wachtwoord is verplicht!";
    }

    if (filter_has_var(INPUT_POST, 'url') === false) {
        $errors["url"] = "Online profiel is verplicht!";
    } elseif (filter_input(INPUT_POST, 'url', FILTER_DEFAULT) === "") {
        $errors["url"] = "Online profiel is verplicht!";
    } elseif (filter_input(INPUT_POST, 'url', FILTER_VALIDATE_URL) === false) {
        $errors["url"] = "Online profiel is onjuist!";
    }

    if (count($errors) > 0) {
        renderForm($errors);
    } else {
        $values = $_POST;
        $values['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
        file_put_contents(sys_get_temp_dir() . DIRECTORY_SEPARATOR . str_replace([DIRECTORY_SEPARATOR, '/'], '_', $_POST['email']) . '.json', json_encode($values));
        ?>Dankjewel, <?=htmlentities($_POST['naam']);?> voor jouw registratie!<?php
    }
} else {
    ?>Onbekende actie<?php
}
?>
</body>
</html>