<?php

namespace Calendar;

require __DIR__ . DIRECTORY_SEPARATOR . 'Month.php';


class Calendar
{
    private $date;
    private $days;
    private $calenderEntryWeekdayClasses;
    private $widthRenderedCalendarInDays;

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

    public function renderMonth()
    {

        echo "<table class='calendar'>";
        $this->renderMonthName($this->month);
        $this->renderWeekDays();
        $this->renderDates($this->month);
        echo "</table>";
        $this->month = $this->month->next();
    }

    private function renderMonthName(Month $month)
    {
        echo("<tr><td colspan='" . $this->widthRenderedCalendarInDays . "' id='calendar_month'>" . $month->formatLabel() . "</td></tr>");
    }

    private function renderWeekDays()
    {
        $this->renderRowStart();

        foreach ($this->days as $day) {
            echo("<th>");
            echo($day);
            echo("</th>");
        }

        $this->renderRowEnd();
    }

    private function renderRowStart()
    {
        echo("<tr>");
    }

    private function renderRowEnd()
    {
        echo("</tr>");
    }

    private function renderDates(Month $month)
    {
        $this->renderRowStart();

        for ($count = 0; $count < $month->calculateOffsetAtStart($this->days); $count++) {
            $this->renderEmptyDay();
        }

        $day_count = 1;
        while ($count < ($this->widthRenderedCalendarInDays * $month->calculateNumberOfWeeks($this->days))) {
            if ($month->beyondEndOfMonth($day_count)) {
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
        $this->renderRowEnd();
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