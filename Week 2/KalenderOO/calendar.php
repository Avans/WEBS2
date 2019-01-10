<!DOCTYPE html>
<html lang="en">
<!-- Author: Jasper van Rosmalen, Rik Meijer -->
<!-- Avans University of Applied Technology -->

<head>
    <title>Kalender Opdracht</title>
    <link rel="stylesheet" type="text/css" href="calendar_style.css">
</head>

<?php

require __DIR__ . DIRECTORY_SEPARATOR . "Calendar.php";
require __DIR__ . DIRECTORY_SEPARATOR . 'Month.php';

$calendar = new \Calendar\Calendar(["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"]);
try {
    $month = new \Calendar\Month(new \DateTime(date("Y-1-1")));
} catch (\Exception $exception) {
    print $exception->getTraceAsString();
    exit;
}
for ($month_count = 1; $month_count <= 12; $month_count++) {
    $calendar->renderMonth($month);
    $month = $month->next();
}
?>
</html>
