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

    public function render(HTMLCalendar $viewCalendar)
    {
        $weeklength = count(self::dayStrings);
        $offset_at_start = $this->current_day_of_week - ($this->current_day_of_month % 7);

        // calculate the offset for the first date line
        if ($offset_at_start < 0) {
            $offset_at_start = $weeklength + $offset_at_start;
        } else {
            $offset_at_start = $weeklength - $offset_at_start;
        }

        $nr_of_entries = $weeklength * round(($offset_at_start + $this->nr_of_days_in_month) / $weeklength);

        $viewCalendar->renderStart(self::dayStrings, date("F Y"));
        $viewCalendar->renderRowStart();
        $count = 0;
        $day_count = 1;
        while ($count < $nr_of_entries) {
            if ($offset_at_start > 0) {
                $viewCalendar->renderDay(0);
                $offset_at_start--;
            } elseif ($day_count <= $this->nr_of_days_in_month) {
                $viewCalendar->renderDay($day_count, $count % $weeklength);
                $day_count++;
            } else {
                $viewCalendar->renderDay(0);
            }

            $count++;

            if ($count % $weeklength === 0) {
                $viewCalendar->renderRowStart();
                $viewCalendar->renderRowEnd();
            }
        }
        $viewCalendar->renderCalendarEnd();
    }
}