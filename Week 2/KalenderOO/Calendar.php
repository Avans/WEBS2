<?php

namespace Calendar;

class Calendar
{
    const dayStrings = array("Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun");

    private $nr_of_days_in_month;
    private $current_day_of_month;
    private $current_day_of_week;

    public function __construct($nr_of_days_in_month, $current_day_of_month, $current_day_of_week)
    {
        $this->nr_of_days_in_month = $nr_of_days_in_month;
        $this->current_day_of_month = $current_day_of_month;
        $this->current_day_of_week = $current_day_of_week;
    }

    public function render()
    {
        $offset_at_start = $this->current_day_of_week - ($this->current_day_of_month % 7);

        // calculate the offset for the first date line
        if ($offset_at_start < 0) {
            $offset_at_start = 7 + $offset_at_start;
        } else {
            $offset_at_start = 7 - $offset_at_start;
        }

        // calculate the number of calendar entries needed for this month
        // including the empty ones needed before and after the actual days
        $nr_of_entries = 7 * round(($offset_at_start + $this->nr_of_days_in_month) / 7);

        // Create the calendar
        $this->create_calendar_start();
        // Start with month indication
        $this->create_month_title();
        // Start filling the table with a header
        $this->create_header();
        // Now do the days, both empty and with date
        $this->create_row_start();
        $count = 0;
        $day_count = 1;
        while ($count < $nr_of_entries) {
            if ($offset_at_start > 0) {
                $this->create_entry(0);
                $offset_at_start--;
            } else {
                if ($day_count <= $this->nr_of_days_in_month) {
                    $this->create_entry($day_count, $count % 7);
                    $day_count++;
                } else {
                    $this->create_entry(0);
                }
            }

            $count++;

            if ($count % 7 === 0) {
                $this->create_row_start();
                $this->create_row_end();
            }
        }

        $this->create_calendar_end();
    }

    private function create_header()
    {
        $this->create_row_start();

        foreach (self::dayStrings as $dayName) {
            echo("<th>");
            echo($dayName);
            echo("</th>");
        }

        $this->create_row_end();
    }

    private function create_row_start()
    {
        echo("<tr>");
    }

    private function create_row_end()
    {
        echo("</tr>");
    }

    private function create_month_title()
    {
        echo("<tr><td colspan='7' id='calendar_month'>" . date("F Y") . "</td></tr>");
    }

    private function create_entry($day_number, $day_in_week = 0)
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

    private function create_calendar_start()
    {
        echo "<table class = 'calendar'>";
    }

    private function create_calendar_end()
    {
        echo "</table>";
    }
}