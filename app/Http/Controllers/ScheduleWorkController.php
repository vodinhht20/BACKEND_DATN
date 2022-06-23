<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Repositories\ScheduleWorkRepository;
class ScheduleWorkController extends Controller
{
    public function __construct(private ScheduleWorkRepository $scheduleWorkRepo)
    {
        //
    }

    public function calendar(Request $request)
    {
        return view('admin.schedule.calendar');
    }

    public function ajaxAddWorkShift(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'work_shift_name' => 'required|max:255',
            'work_shifts' => 'required|array|min:1',
            'days' => 'required|array|min:1',
            'interval_day' => 'required|array|min:2',
        ], [
            'work_shift_name.required' => 'tên lịch làm không được để trống',
            'work_shifts.required' => 'ca làm không được để trống',
            'days.required' => 'ngày trong tuần không được để trống',
            'interval_day.required' => 'thời gian hiệu lực không được để trống',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error_code' => 'validate_failed',
                'message' => $validator->messages()->first()
            ], 442);
        }

        $options = [
            'work_shift_name' => $request->input('work_shift_name'),
            'work_shifts' => $request->input('work_shifts', []),
            'days' => $request->input('days', []),
            'interval_day' => $request->input('interval_day', []),
        ];

        $scheduleWorks = $this->scheduleWorkRepo->customizeCreate($options);
        dd($scheduleWorks);
    }
}
