<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\DashboardRepository;
use App\Repositories\TimekeepRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct(
        private DashboardRepository $dashboardRepo,
        private TimekeepRepository $timekeepRepo
    ){}

    public function index(Request $request){
        $user = Auth::user();
        $monthYear = $request->input('date', Carbon::now()->format("m/Y"));
        $monthYear = $monthYear ?: Carbon::now()->format("m/Y");

        $firstMonth = Carbon::createFromFormat('m/Y', $monthYear)->startOfMonth()->format('Y-m-d');
        $endMonth = Carbon::createFromFormat('m/Y', $monthYear)->endOfMonth()->format('Y-m-d');
        $options = [
            'date' => [
                'firstMonth' => $firstMonth,
                'endMonth' => $endMonth,
            ]
        ];

        $timesheetFormats = $this->timekeepRepo->dashboardFormats($user->id, $options);
        $sumTime = $this->timekeepRepo->getTimeOTbyEmplyeeId($user->id, $options);

        return response()->json([
            "status" => "success",
            "data" => $timesheetFormats,
            'sumTime' => $sumTime,
            "message" => "Dashboard successfully"
        ]);
    }
}
