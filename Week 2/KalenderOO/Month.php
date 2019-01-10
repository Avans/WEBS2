<?php


namespace Calendar;


class Month
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

    public function calculateOffsetAtStart($widthRenderedCalendarInDays)
    {
        $offset_at_start = $this->current_day_of_month - ($this->current_day_of_week % $widthRenderedCalendarInDays);

        if ($offset_at_start < 0) {
            $offset_at_start = $widthRenderedCalendarInDays + $offset_at_start;
        } else {
            $offset_at_start = $widthRenderedCalendarInDays - $offset_at_start;
        }
        return $offset_at_start;
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
}