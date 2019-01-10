<?php


namespace Calendar;


class Month
{
    private $nr_of_days_in_month;
    private $first_weekday_of_month;

    public function __construct($nr_of_days_in_month, $first_weekday_of_month)
    {
        $this->nr_of_days_in_month = $nr_of_days_in_month;
        $this->first_weekday_of_month = $first_weekday_of_month;
    }

    public function calculateNumberOfWeeks($days)
    {
        return round(($this->calculateOffsetAtStart($days) + $this->nr_of_days_in_month) / count($days));
    }

    public function calculateOffsetAtStart($days)
    {
        return array_search($this->first_weekday_of_month, $days);
    }

    public function endOfMonth($day_count)
    {
        return $day_count > $this->nr_of_days_in_month;
    }
}