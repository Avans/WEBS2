<?php

namespace Calendar;

require __DIR__ . DIRECTORY_SEPARATOR . 'Month.php';


class Calendar
{
    private $month;
    private $days;

    public function __construct(\DateTime $date, $days)
    {
        $this->month = new \Calendar\Month($date);
        $this->days = $days;
    }

    public function shiftMonth()
    {
        $this->month = $this->month->next();
    }

    public function renderMonthName()
    {
        return $this->month->formatLabel();
    }

    public function dates() {
        return new Dates($this->month, $this->days);
    }
}