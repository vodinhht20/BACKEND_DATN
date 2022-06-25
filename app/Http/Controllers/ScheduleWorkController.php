<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;
use App\Models\Position;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Repositories\WorkScheduleRepository;
use App\Repositories\WorkShiftRepository;
use Carbon\Carbon;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;

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
        $take = 2;

        $options = [
            'with' => ['workShift', 'employee', 'department', 'position'],
        ];
        $companyData = $this->workScheduleRepo->paginate([...$options, "subject_type" => config('work_schedule.subject_type.company')], $take, 'company_page');
        $companyData->setPageName('company_page');
        $departmentData = $this->workScheduleRepo->paginate([...$options, "subject_type" => config('work_schedule.subject_type.department')], $take, 'department_page');
        $departmentData->setPageName('department_page');
        $positionData = $this->workScheduleRepo->paginate([...$options, "subject_type" => config('work_schedule.subject_type.position')], $take, 'position_page');
        $positionData->setPageName('position_page');
        $employeeData = $this->workScheduleRepo->paginate([...$options, "subject_type" => config('work_schedule.subject_type.employee')], $take, 'employee_page');
        $employeeData->setPageName('employee_page');
        $workSchedules = [
           'companyData' => $companyData,
           'departmentData' => $departmentData,
           'positionData' => $positionData,
           'employeeData' => $employeeData,
        ];
        $positions = Position::all();
        $departments = Department::all();
        $employees = Employee::all();
        return view('admin.schedule.calendar', compact('workSchedules', 'positions', 'departments', 'employees'));
    }

    public function ajaxAddWorkShift(Request $request)
    {
        $departmentType = config('work_schedule.subject_type.department');
        $positionType = config('work_schedule.subject_type.position');
        $employeeType = config('work_schedule.subject_type.employee');

        $validator = Validator::make($request->all(), [
            'work_shift_name' => 'required|max:255',
            'work_shifts' => 'required|array|min:1',
            'days' => 'required|array|min:1',
            'interval_day' => 'required|array|min:2',
            'subject_type' => [
                function ($attribute, $value, $fail) use ($request, $departmentType, $positionType, $employeeType) {
                    if ($value == $departmentType) {
                        if (!$request->department_id) {
                            return $fail('Phòng ban không được để trống !');
                        }
                    } else if ($value == $positionType) {
                        if (!$request->position_id) {
                            return $fail('Vị trí không được để trống !');
                        }
                    } else if ($value == $employeeType) {
                        if (!$request->employee_id) {
                            return $fail('Nhân viên không được để trống !');
                        }
                    }
                },
            ],
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
            DB::beginTransaction();
            $intervalDay = $request->interval_day;
            $workScheduleOptions = [
                'name' => $request->work_shift_name,
                'days' => $request->days,
                'allow_from' => $intervalDay[0],
                'allow_to' => $intervalDay[1],
            ];

            if ($request->subject_type == $departmentType) {
                $workScheduleOptions['department_id'] = $request->department_id;
                $workScheduleOptions['subject_type'] = $departmentType;
            } else if ($request->subject_type == $positionType) {
                $workScheduleOptions['position_id'] = $request->position_id;
                $workScheduleOptions['subject_type'] = $positionType;
            } else if ($request->subject_type == $employeeType) {
                $workScheduleOptions['employee_id'] = $request->employee_id;
                $workScheduleOptions['subject_type'] = $employeeType;
            }

            $workSchedule = $this->workScheduleRepo->customizeCreate($workScheduleOptions);
            $workShiftOptions = [
                'work_schedule_id' => $workSchedule->id,
                'work_shifts' => $request->work_shifts,
            ];
            $this->workShiftRepo->createMultiple($workShiftOptions);
            DB::commit();
            return response()->json([
                'message' => "Thêm ca làm thành công !"
            ], 200);
        } catch (\Exception $e) {
            $message = '[' . date('Y-m-d H:i:s') . '] Error message \'' . $e->getMessage() . '\'' . ' in ' . $e->getFile() . ' line ' . $e->getLine();
            \Log::error($message);
            DB::rollBack();
            return response()->json([
                'error_code' => 'exception_error',
                'message' => $validator->messages()->first()
            ], 442);
        }
    }
}
