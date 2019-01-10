<?php

namespace Calendar;


class HTMLCalendar
{
    private $days;
    private $widthRenderedCalendarInDays;

    public function __construct($days)
    {
        $this->days = $days;
        $this->widthRenderedCalendarInDays = count($this->days);
    }


    public function renderRowStart()
    {
        echo("<tr>");
    }

    public function renderRowEnd()
    {
        echo("</tr>");
    }


    public function renderDay($monthDay, $weekDay)
    {
        switch ($weekDay) {
            case 5:
                echo("<td class='calendar_entry saturday_entry'>");
                break;

            case 6:
                echo("<td class='calendar_entry sunday_entry'>");
                break;

            default:
                echo("<td class='calendar_entry'>");
                break;
        }

        if ($monthDay > 0) {
            echo("<div class='entry_date'>$monthDay</div>");
            echo("<div class='entry_line'></div>");
            echo("<div class='entry_line'></div>");
            echo("<div class='entry_line'></div>");
        }
        echo("</td>");
    }

    public function renderStart($monthTitle)
    {
        echo "<table class='calendar'>";
        $this->renderMonthName($monthTitle);
        $this->renderDays();
    }

    private function renderMonthName($monthTitle)
    {
        echo("<tr><td colspan='" . $this->widthRenderedCalendarInDays . "' id='calendar_month'>" . $monthTitle . "</td></tr>");
    }

    private function renderDays()
    {
        $this->renderRowStart();

        foreach ($this->days as $dayName) {
            echo("<th>");
            echo($dayName);
            echo("</th>");
        }

        $this->renderRowEnd();
    }

    public function renderCalendarEnd()
    {
        echo "</table>";
    }

    public function renderDates(Month $month)
    {
        $offset_at_start = $month->calculateOffsetAtStart($this->widthRenderedCalendarInDays);
        $count = 0;
        $day_count = 1;
        while ($count < $month->calculateNumberOfDateEntriesToRender($this->widthRenderedCalendarInDays)) {
            if ($offset_at_start > 0) {
                $this->renderDay(0, 0);
                $offset_at_start--;
            } elseif ($month->endOfMonth($day_count)) {
                $this->renderDay(0, 0);
            } else {
                $this->renderDay($day_count, $count % $this->widthRenderedCalendarInDays);
                $day_count++;
            }

            $count++;

            if ($count % $this->widthRenderedCalendarInDays === 0) {
                $this->renderRowStart();
                $this->renderRowEnd();
            }
        }
    }


}