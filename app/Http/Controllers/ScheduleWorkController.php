<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ScheduleWorkController extends Controller
{
    public function calendar(Request $request)
    {
        return view('admin.schedule.calendar');
    }
}
