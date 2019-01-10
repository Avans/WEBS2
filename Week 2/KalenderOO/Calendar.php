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
        $viewCalendar->renderStart(self::dayStrings, date("F Y"));
        $viewCalendar->renderRowStart();

        $weeklength = count(self::dayStrings);
        $offset_at_start = $this->current_day_of_week - ($this->current_day_of_month % $weeklength);

        // calculate the offset for the first date line
        if ($offset_at_start < 0) {
            $offset_at_start = $weeklength + $offset_at_start;
        } else {
            $offset_at_start = $weeklength - $offset_at_start;
        }

        $viewCalendar->renderDates($this->nr_of_days_in_month, $weeklength, $offset_at_start);

        $viewCalendar->renderCalendarEnd();
    }
}