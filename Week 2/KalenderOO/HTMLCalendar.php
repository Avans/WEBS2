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


    public function renderDay($day_number, $day_in_week = 0)
    {
        switch ($day_in_week) {
            case 5:
                echo("<td class = 'calendar_entry saturday_entry'>");
                break;

            case 6:
                echo("<td class = 'calendar_entry sunday_entry'>");
                break;

            default:
                echo("<td class = 'calendar_entry'>");
                break;
        }

        if ($day_number > 0) {
            echo("<div class = 'entry_date'>$day_number</div>");
            echo("<div class = 'entry_line'></div>");
            echo("<div class = 'entry_line'></div>");
            echo("<div class = 'entry_line'></div>");
        }
        echo("</td>");
    }

    public function renderStart($days, $monthTitle)
    {
        echo "<table class = 'calendar'>";
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

}