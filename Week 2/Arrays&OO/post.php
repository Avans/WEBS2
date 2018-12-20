<html>
<head>
    <title>Hello world!</title>
</head>
<body>
    <form method="post">Naam:<input name="naam" /><input type="submit" /></form>
    <?php
    if (array_key_exists("naam", $_POST)) {
        echo "Hello " . $_POST["naam"] . "!!";
    }
    ?>
</body>
</html>