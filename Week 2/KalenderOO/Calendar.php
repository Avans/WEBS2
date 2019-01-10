<?php

namespace Calendar;

class Calendar
{
    private $nr_of_days_in_month;
    private $current_day_of_month;
    private $current_day_of_week;

    public function __construct($nr_of_days_in_month, $current_day_of_month, $current_day_of_week)
    {
        $this->nr_of_days_in_month = $nr_of_days_in_month;
        $this->current_day_of_month = $current_day_of_month;
        $this->current_day_of_week = $current_day_of_week;
    }

    public function render(HTMLCalendar $viewCalendar, $dayStrings)
    {
        $viewCalendar->renderStart(date("F Y"));
        $viewCalendar->renderRowStart();

        $offset_at_start = $this->calculateOffsetAtStart($this->current_day_of_month, $this->current_day_of_week, count($dayStrings));
        $viewCalendar->renderDates($this->nr_of_days_in_month, $offset_at_start);

        $viewCalendar->renderCalendarEnd();
    }

    /**
     * @param $current_day_of_month
     * @param $current_day_of_week
     * @param $weeklength
     * @return int
     */
    private function calculateOffsetAtStart($current_day_of_month, $current_day_of_week, $weeklength)
    {
        if ($current_day_of_month < ($current_day_of_week % $weeklength)) {
            $offset_at_start = $weeklength + ($current_day_of_month - ($current_day_of_week % $weeklength));
        } else {
            $offset_at_start = $weeklength - ($current_day_of_month - ($current_day_of_week % $weeklength));
        }
        return $offset_at_start;
    }
}