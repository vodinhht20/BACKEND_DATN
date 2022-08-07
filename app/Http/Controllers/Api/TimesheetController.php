<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\HolidaySchedule;
use App\Repositories\TimekeepRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TimesheetController extends Controller
{
    public function __construct(
        private TimekeepRepository $timekeepRepo
    ) {
        //
    }

    public function index(Request $request)
    {
        $user = Auth::user();
        $monthYear = $request->input('month', Carbon::now()->format("m/Y"));
        $monthYear = $monthYear ?: Carbon::now()->format("m/Y");
        $firstMonth = Carbon::createFromFormat('m/Y', $monthYear)->startOfMonth()->format('Y-m-d');
        $endMonth = Carbon::createFromFormat('m/Y', $monthYear)->endOfMonth()->format('Y-m-d');
        $holiday = HolidaySchedule::where('date_from', '>=', $firstMonth)
            ->where('date_to', '<=', $endMonth)
            ->selectRaw('DATEDIFF(date_to, date_from) + 1 AS days')
            ->get()->sum('days');
        $totalDayMonth = (int)Carbon::createFromFormat('m/Y', $monthYear)->daysInMonth - (int)$holiday;
        
        $options = [
            'with' => ['timekeepDetail' => function ($q) {
                    $q->select('timekeep_id', 'checkin_at');
                },
                'employee'],
            'date_from' => Carbon::createFromFormat("m/Y", $monthYear)->startOfMonth(),
            'date_to' => Carbon::createFromFormat("m/Y", $monthYear)->endOfMonth(),
            'employee_id' => $user->id
        ];
        $timekeeps = $this->timekeepRepo->query($options)->get();
        $timesheetFormats = $this->timekeepRepo->timesheetFormats($timekeeps);
        return response()->json([
            "data" => array_values($timesheetFormats)[0] ?? [],
            "month" => $monthYear,
            "totalDayMonth" => $totalDayMonth
        ]);
    }
}
