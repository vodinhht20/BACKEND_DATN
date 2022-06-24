<?php

namespace App\Http\Controllers;

use App\Models\Position;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Repositories\WorkScheduleRepository;
use App\Repositories\WorkShiftRepository;
use Carbon\Carbon;

class ScheduleWorkController extends Controller
{
    public function __construct(
        private WorkScheduleRepository $workScheduleRepo,
        private WorkShiftRepository $workShiftRepo
    )
    {
        //
    }

    public function calendar(Request $request)
    {
        $options = [
            'with' => ['workShift']
        ];
        $workSchedules = $this->workScheduleRepo->query($options)->get();
        $positions = Position::all();
        $departments = Department::all();
        return view('admin.schedule.calendar', compact('workSchedules'));
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

        try {
            $intervalDay = $request->interval_day;
            $workScheduleOptions = [
                'name' => $request->work_shift_name,
                'days' => $request->days,
                'allow_from' => $intervalDay[0],
                'allow_to' => $intervalDay[1],
            ];

            $workSchedule = $this->workScheduleRepo->customizeCreate($workScheduleOptions);
            $workShiftOptions = [
                'work_schedule_id' => $workSchedule->id,
                'work_shifts' => $request->work_shifts,
            ];
            $this->workShiftRepo->createMultiple($workShiftOptions);

            return response()->json([
                'message' => "Thêm ca làm thành công !"
            ], 200);
        } catch (\Exception $e) {
            $message = '[' . date('Y-m-d H:i:s') . '] Error message \'' . $e->getMessage() . '\'' . ' in ' . $e->getFile() . ' line ' . $e->getLine();
            \Log::error($message);
            return response()->json([
                'error_code' => 'exception_error',
                'message' => $validator->messages()->first()
            ], 442);
        }
    }
}
