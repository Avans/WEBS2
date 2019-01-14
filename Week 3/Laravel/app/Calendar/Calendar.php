<?php

namespace App\Calendar;

class Calendar
{
    private $month;
    private $days;

    public function __construct(\DateTime $date, $days)
    {
        $this->month = new Month($date);
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

    public function getMonthID()
    {
        return $this->month->getID();
    }

    public function dates() {
        return new Dates($this->month, $this->days);
    }
}