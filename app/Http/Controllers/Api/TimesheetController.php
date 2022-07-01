<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
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

    public function index()
    {
        $user = Auth::user();
        $options = [
            'with' => ['timekeepdetail' => function ($q) {
                    $q->select('timekeep_id', 'checkin_at');
                },
                'employee'],
            'date_from' => Carbon::now()->startOfMonth(),
            'date_to' => Carbon::now()->endOfMonth()
        ];
        $timekeeps = $this->timekeepRepo->query($options)->get();
        $timesheetFormats = $this->timekeepRepo->timesheetFormats($timekeeps);
        return response()->json([
            "data" => $timesheetFormats
        ]);
    }
}
