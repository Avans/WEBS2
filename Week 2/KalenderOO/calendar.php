<html>
<!-- Author: Jasper van Rosmalen, Rik Meijer -->
<!-- Avans University of Applied Technology -->

<head>
    <title>Kalender Opdracht</title>
    <link rel="stylesheet" type="text/css" href="calendar_style.css">
</head>

<?php

require "Calendar.php";


$nr_of_days_in_month = date("t");
$current_day_of_month = date("j");
$current_day_of_week = date("w"); // 0 = Sunday, 6 = Saturday

$offset_at_start = $current_day_of_week - ($current_day_of_month % 7);
$nr_of_entries = 0;

// calculate the offset for the first date line
if ($offset_at_start < 0) {
    $offset_at_start = 7 + $offset_at_start;
} else {
    $offset_at_start = 7 - $offset_at_start;
}

// calculate the number of calendar entries needed for this month
// including the empty ones needed before and after the actual days
$nr_of_entries = 7 * round(($offset_at_start + $nr_of_days_in_month) / 7);

// Create the calendar
Calendar\create_calendar_start();
// Start with month indication
Calendar\create_month_title();
// Start filling the table with a header
Calendar\create_header();
// Now do the days, both empty and with date
Calendar\create_row_start();
$count = 0;
$day_count = 1;
while ($count < $nr_of_entries) {
    if ($offset_at_start > 0) {
        Calendar\create_entry(0);
        $offset_at_start--;
    } else {
        if ($day_count <= $nr_of_days_in_month) {
            Calendar\create_entry($day_count, $count % 7);
            $day_count++;
        } else {
            Calendar\create_entry(0);
        }
    }

    $count++;

    if ($count % 7 === 0) {
        Calendar\create_row_start();
        Calendar\create_row_end();
    }
}

Calendar\create_calendar_end();
// And we're done.

?>
</html>
