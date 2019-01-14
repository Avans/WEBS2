<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalendarController extends Controller
{
    public function showYear($yearIndex = "Y")
    {
        return view('calendar.year', [
            "calendar" => new \App\Calendar\Calendar(["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"]),
            "month" => new \App\Calendar\Month(new \DateTime(date("$yearIndex-1-1")))
        ]);
    }

    public function showMonth($monthIndex)
    {
        return view('calendar.month', [
            "calendar" => new \App\Calendar\Calendar(["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"]),
            "month" => new \App\Calendar\Month(new \DateTime(date($monthIndex."-1")))
        ]);
    }
}
