<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RootController extends Controller
{
    public function show()
    {
        return view('welcome', ["text" => "Hello World!!"]);
    }
}
