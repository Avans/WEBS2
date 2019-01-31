<?php
session_start();
?><!DOCTYPE html>
<html>
<head>
    <title>Session test</title>
</head>
<body>
<?php
$kleur = $_SESSION['kleur'];
$mijnNaam = $_SESSION['naam'];
echo "<b>kleur = $kleur </b><br>";
echo "<b>mijnNaam = $mijnNaam </b><br>";
?>
</body>
</html>