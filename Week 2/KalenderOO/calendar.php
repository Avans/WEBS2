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

$calendar = new \Calendar\HTMLCalendar(["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"]);
for ($i = 1; $i <= 12; $i++) {
    $monthTime = mktime(0,0,1, $i, 1, date("Y"));

    $month = new \Calendar\Month(date("t", $monthTime), date("D", $monthTime));
    $calendar->renderMonth(date("F Y", $monthTime), $month);
}

?>
</html>
