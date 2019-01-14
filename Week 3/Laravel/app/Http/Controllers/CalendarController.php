<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalendarController extends Controller
{
    public function showYear($yearIndex = "Y")
    {
        return view('calendar.year', [
            "days" => ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"],
            "calendar" => new \App\Calendar\Calendar(new \DateTime(date("$yearIndex-1-1")), ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"])
        ]);
    }

    public function showMonth($monthIndex)
    {
        return view('calendar.month', [
            "days" => ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"],
            "calendar" => new \App\Calendar\Calendar(new \DateTime(date($monthIndex."-1")), ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"])
        ]);
    }
}
