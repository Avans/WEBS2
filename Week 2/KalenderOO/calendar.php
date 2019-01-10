<html>
<!-- Author: Jasper van Rosmalen, Rik Meijer -->
<!-- Avans University of Applied Technology -->

<head>
    <title>Kalender Opdracht</title>
    <link rel="stylesheet" type="text/css" href="calendar_style.css">
</head>

<?php

require "HTMLCalendar.php";
require "Calendar.php";

$calendar = new \Calendar\Calendar(date("t"), date("j"), date("w"));
$calendar->render(new \Calendar\HTMLCalendar(array("Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun")));

?>
</html>
