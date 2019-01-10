<?php


namespace Calendar;


class HTMLCalendar
{


    public function create_row_start()
    {
        echo("<tr>");
    }

    public function create_row_end()
    {
        echo("</tr>");
    }


    public function create_entry($day_number, $day_in_week = 0)
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

    public function create_calendar_start($days)
    {
        echo "<table class = 'calendar'>";
        $this->create_month_title(count($days));
        $this->create_header($days);
    }

    private function create_month_title($weeklength)
    {
        echo("<tr><td colspan='" . $weeklength . "' id='calendar_month'>" . date("F Y") . "</td></tr>");
    }

    private function create_header($days)
    {
        $this->create_row_start();

        foreach ($days as $dayName) {
            echo("<th>");
            echo($dayName);
            echo("</th>");
        }

        $this->create_row_end();
    }

    public function create_calendar_end()
    {
        echo "</table>";
    }

}