<?php

namespace Calendar;


class HTMLCalendar
{
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

    public function renderStart($days, $monthTitle)
    {
        echo "<table class='calendar'>";
        $this->renderMonthName(count($days), $monthTitle);
        $this->renderDays($days);
    }

    private function renderMonthName($weeklength, $monthTitle)
    {
        echo("<tr><td colspan='" . $weeklength . "' id='calendar_month'>" . $monthTitle . "</td></tr>");
    }

    private function renderDays($days)
    {
        $this->renderRowStart();

        foreach ($days as $dayName) {
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

    public function renderDates($nr_of_days_in_month, $offset_at_start, $weeklength)
    {
        $totalDateEntryCount = $this->calculateNumberOfDateEntriesToRender($nr_of_days_in_month, $weeklength, $offset_at_start);

        $count = 0;
        $day_count = 1;
        while ($count < $totalDateEntryCount) {
            if ($offset_at_start > 0) {
                $this->renderDay(0, 0);
                $offset_at_start--;
            } elseif ($day_count > $nr_of_days_in_month) {
                $this->renderDay(0, 0);
            } else {
                $this->renderDay($day_count, $count % $weeklength);
                $day_count++;
            }

            $count++;

            if ($count % $weeklength === 0) {
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
    private function calculateNumberOfDateEntriesToRender($nr_of_days_in_month, $weeklength, $offset_at_start)
    {
        return $weeklength * round(($offset_at_start + $nr_of_days_in_month) / $weeklength);
    }


}