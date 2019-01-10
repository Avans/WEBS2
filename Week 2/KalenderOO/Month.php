<?php


namespace Calendar;


class Month
{
    private $date;

    public function __construct(\DateTime $date)
    {
        $this->date = clone $date;
    }

    public function calculateNumberOfWeeks($days)
    {
        return round(($this->calculateOffsetAtStart($days) + $this->date->format("t")) / count($days));
    }

    public function calculateOffsetAtStart($days)
    {
        return array_search($this->date->format("D"), $days);
    }

    public function beyondEndOfMonth($day_count)
    {
        return $day_count > $this->date->format("t");
    }

    public function formatLabel()
    {
        return $this->date->format("F Y");
    }

    public function next()
    {
        return new self($this->date->add(new \DateInterval('P1M')));
    }
}