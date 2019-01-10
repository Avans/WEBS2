<?php

namespace Calendar;

require __DIR__ . DIRECTORY_SEPARATOR . 'Month.php';

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

        $month = new Month($this->nr_of_days_in_month, $this->current_day_of_month, $this->current_day_of_week);
        $viewCalendar->renderDates($month);

        $viewCalendar->renderCalendarEnd();
    }
}