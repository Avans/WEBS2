<?php

namespace Calendar;


class HTMLCalendar
{
    private $days;
    private $weekLength;

    public function __construct($days)
    {
        $this->days = $days;
        $this->weekLength = count($this->days);
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
        echo("<tr><td colspan='" . $this->weekLength . "' id='calendar_month'>" . $monthTitle . "</td></tr>");
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

    public function renderDates($nr_of_days_in_month, $offset_at_start)
    {
        $totalDateEntryCount = $this->calculateNumberOfDateEntriesToRender($nr_of_days_in_month, $offset_at_start);

        $count = 0;
        $day_count = 1;
        while ($count < $totalDateEntryCount) {
            if ($offset_at_start > 0) {
                $this->renderDay(0, 0);
                $offset_at_start--;
            } elseif ($day_count > $nr_of_days_in_month) {
                $this->renderDay(0, 0);
            } else {
                $this->renderDay($day_count, $count % $this->weekLength);
                $day_count++;
            }

            $count++;

            if ($count % $this->weekLength === 0) {
                $this->renderRowStart();
                $this->renderRowEnd();
            }
        }
    }


    /**
     * @param $nr_of_days_in_month
     * @param $weeklength
     * @param int $offset_at_start
     * @return float|int
     */
    private function calculateNumberOfDateEntriesToRender($nr_of_days_in_month, $offset_at_start)
    {
        return $this->weekLength * round(($offset_at_start + $nr_of_days_in_month) / $this->weekLength);
    }


}