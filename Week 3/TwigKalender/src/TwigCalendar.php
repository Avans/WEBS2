<?php


namespace Calendar;

/**
 * Class TwigCalendar, used as an abstraction layer between Twig-template and calendar objects
 * @package Calendar
 */
class TwigCalendar
{

    private $calendar;
    private $month;

    public function __construct(\Calendar\Calendar $calendar, \Calendar\Month $month)
    {
        $this->calendar = $calendar;
        $this->month = $month;
    }

    public function render() {
        for ($month_count = 1; $month_count <= 12; $month_count++) {
            $this->calendar->renderMonth($this->month);
            $this->month = $this->month->next();
        }
    }
}