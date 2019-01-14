<?php

namespace Calendar;

require __DIR__ . DIRECTORY_SEPARATOR . 'Month.php';


class Calendar
{
    private $date;
    private $days;
    private $calenderEntryWeekdayClasses;
    public $widthRenderedCalendarInDays;

    public function __construct(\DateTime $date, $days)
    {
        $this->month = new \Calendar\Month($date);

        $this->days = $days;
        $this->widthRenderedCalendarInDays = count($days);
        $this->calenderEntryWeekdayClasses = array_map(function($dayName){
            switch ($dayName) {
                case "Sat":
                    return "saturday_entry";
                case "Sun":
                    return "sunday_entry";
                default:
                    return "";
            }
        }, $days);
    }

    public function shiftMonth()
    {
        $this->month = $this->month->next();
    }

    public function renderMonthName()
    {
        return $this->month->formatLabel();
    }

    private function renderRowStart()
    {
        echo("<tr>");
    }

    private function renderRowEnd()
    {
        echo("</tr>");
    }

    public function calculateOffsetAtStart() {
        return $this->month->calculateOffsetAtStart($this->days);
    }

    public function renderDates()
    {
        $day_count = 1;
        for ($count = $this->calculateOffsetAtStart(); $count < ($this->widthRenderedCalendarInDays * $this->month->calculateNumberOfWeeks($this->days));) {
            if ($this->month->beyondEndOfMonth($day_count)) {
                $this->renderEmptyDay();
            } else {
                $this->renderDay($day_count, $count % $this->widthRenderedCalendarInDays);
                $day_count++;
            }

            $count++;

            if ($count % $this->widthRenderedCalendarInDays === 0) {
                $this->renderRowEnd();
                $this->renderRowStart();
            }
        }
    }

    private function renderEmptyDay()
    {
        echo "<td class='calendar_entry'></td>";
    }

    private function renderDay($monthDay, $weekDay)
    {
        echo("<td class='calendar_entry " . $this->calenderEntryWeekdayClasses[$weekDay] . "'>");
        echo("<div class='entry_date'>$monthDay</div>");
        echo("<div class='entry_line'></div>");
        echo("<div class='entry_line'></div>");
        echo("<div class='entry_line'></div>");
        echo("</td>");
    }
}