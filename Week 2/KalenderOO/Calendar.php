<?php

namespace Calendar;

require __DIR__ . DIRECTORY_SEPARATOR . 'Month.php';

class Calendar
{
    private $monthName;
    private $month;

    public function __construct($monthName, Month $month)
    {
        $this->monthName = $monthName;
        $this->month = $month;
    }

    public function render(HTMLCalendar $viewCalendar)
    {
        $viewCalendar->render($this->monthName, $this->month);
    }
}