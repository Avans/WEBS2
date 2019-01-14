<!DOCTYPE html>
<html lang="en">
<!-- Author: Jasper van Rosmalen, Rik Meijer -->
<!-- Avans University of Applied Technology -->

<head>
    <title>Kalender Opdracht</title>
    <link rel="stylesheet" type="text/css" href="/css/calendar_style.css">
</head>
<body>
<?php
for ($month_count = 1; $month_count <= 12; $month_count++) {
    $calendar->renderMonth($month);
    $month = $month->next();
}
?>
</body>
</html>
