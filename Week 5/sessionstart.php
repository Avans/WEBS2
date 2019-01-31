<?php
session_start();
?><!DOCTYPE html>
<html>
<head>
    <title>Session test</title>
</head>
<body>
<?php
$_SESSION['kleur'] = "rood";
$_SESSION['naam'] = "Piet Piraat";
echo "<b>Session ingesteld</b>";
?>
</body>
</html>