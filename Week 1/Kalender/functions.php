<?php

// *******************************************
// ************** Functions ******************
// *******************************************
function create_header()
{
    create_row_start();

    foreach (dayStrings as $dayName) {
        echo("<th>");
        echo($dayName);
        echo("</th>");
    }

    create_row_end();
}

function create_row_start()
{
    echo("<tr>");
}

function create_row_end()
{
    echo("</tr>");
}

function create_month_title()
{
    echo("<tr><td colspan='7' id='calendar_month'>" . date("F Y") . "</td></tr>");
}

function create_entry($day_number, $day_in_week = 0)
{
    switch ($day_in_week) {
        case 5:
            echo("<td class = 'calendar_entry saturday_entry'>");
            break;

        case 6:
            echo("<td class = 'calendar_entry sunday_entry'>");
            break;

        default:
            echo("<td class = 'calendar_entry'>");
            break;
    }

    if ($day_number > 0) {
        echo("<div class = 'entry_date'>$day_number</div>");
        echo("<div class = 'entry_line'></div>");
        echo("<div class = 'entry_line'></div>");
        echo("<div class = 'entry_line'></div>");
    }
    echo("</td>");
}

function create_calendar_start()
{
    echo "<table class = 'calendar'>";
}

function create_calendar_end()
{
    echo "</table>";
}
