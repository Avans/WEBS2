<html>
<!-- Author: Jasper van Rosmalen, Rik Meijer -->
<!-- Avans University of Applied Technology -->

<head>
    <title>Kalender Opdracht</title>
    <link rel="stylesheet" type="text/css" href="calendar_style.css">
</head>

<?php

require __DIR__ . DIRECTORY_SEPARATOR . "HTMLCalendar.php";
require __DIR__ . DIRECTORY_SEPARATOR . 'Month.php';

$calendar = new \Calendar\HTMLCalendar(array("Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"));
$month = new \Calendar\Month(date("t"), date("j"), date("w"));
$calendar->renderMonth(date("F Y"), $month);

?>
</html>
