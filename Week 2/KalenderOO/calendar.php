<html>
<!-- Author: Jasper van Rosmalen, Rik Meijer -->
<!-- Avans University of Applied Technology -->

<head>
    <title>Kalender Opdracht</title>
    <link rel="stylesheet" type="text/css" href="calendar_style.css">
</head>

<?php

require __DIR__ . DIRECTORY_SEPARATOR;
require __DIR__ . DIRECTORY_SEPARATOR . 'Month.php';

$calendar = new \Calendar\Calendar(["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"]);
$month = new \Calendar\Month(new \DateTime(date("Y-1-1")));
for ($i = 1; $i <= 12; $i++) {
    $calendar->renderMonth($month);
    $month = $month->next();
}

?>
</html>
