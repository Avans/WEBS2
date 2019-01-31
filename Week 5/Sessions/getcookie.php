<?php
$kleur = $_COOKIE['kleur'];
$naam = $_COOKIE['naam'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Cookie test</title>
</head>
<body>
<b>Cookies zijn uitgelezen</b>
de kleur is: <?php echo $kleur;?><br>
de naam is: <?php echo $naam;?><br>
</body>
</html>