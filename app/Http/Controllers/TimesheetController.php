<?php

namespace App\Http\Controllers;

use App\Service\TimesheetService;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TimesheetController extends Controller
{
    public function __construct(TimesheetService $timesheetService)
    {
        $this->timesheetService = $timesheetService;
    }
    public function timesheet(Request $request)
    {
        $inpMonth = $request->input('month', Carbon::now()->format("Y-m"));
        $monthYear = Carbon::createFromFormat("Y-m", $inpMonth);
        $formatDates = $this->timesheetService->getDayByMonth($monthYear);
        $currentMonth = Carbon::now()->format('Y-m');
        return view('admin.timesheet.index',compact('currentMonth', "formatDates", "inpMonth"));
    }
}
