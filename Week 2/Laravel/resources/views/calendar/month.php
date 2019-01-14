<!DOCTYPE html>
<html lang="en">
<!-- Author: Jasper van Rosmalen, Rik Meijer -->
<!-- Avans University of Applied Technology -->

<head>
    <title>Kalender Opdracht</title>
    <link rel="stylesheet" type="text/css" href="/css/calendar_style.css">
</head>
<body>
<a href="/calendar/year">Jaaroverzicht</a>
<?php
$calendar->renderMonth($month);
?>
</body>
</html>
