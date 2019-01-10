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

    /**
     * @param $nr_of_days_in_month
     * @param $weeklength
     * @param int $offset_at_start
     * @return float|int
     */
    public function calculateNumberOfDateEntriesToRender($widthRenderedCalendarInDays)
    {
        return $widthRenderedCalendarInDays * round(($this->calculateOffsetAtStart($widthRenderedCalendarInDays) + $this->nr_of_days_in_month) / $widthRenderedCalendarInDays);
    }

    public function calculateOffsetAtStart($widthRenderedCalendarInDays)
    {
        return $this->first_weekday_of_month % $widthRenderedCalendarInDays;
    }

    public function endOfMonth($day_count)
    {
        return $day_count > $this->nr_of_days_in_month;
    }
}