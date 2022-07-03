<?php

namespace App\Http\Controllers;

use App\Libs\Slack;
use App\Models\Department;
use App\Models\Employee;
use App\Models\Position;
use App\Repositories\HolidayScheduleRepository;
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
        private WorkShiftRepository $workShiftRepo,
        private HolidayScheduleRepository $holidayScheduleRepo
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

        // filter and paginate company page
        $companyData = $this->workScheduleRepo->paginate(
            [
                ...$options,
                "subject_type" => config('work_schedule.subject_type.company'),
                "name" => $request->input("company_name", null),
                "shift_name" => $request->input("company_shift_name", null),
                "company_interval_day" => $request->input("company_interval_day", null),
            ], $take, 'company_page', 'company_tab');
        $companyData->setPageName('company_page');

        // filter and paginate department page
        $departmentData = $this->workScheduleRepo->paginate(
            [
                ...$options,
                "subject_type" => config('work_schedule.subject_type.department'),
                "name" => $request->input("department_calender_name", null),
                "department_name" => $request->input("department_name", null),
                "shift_name" => $request->input("department_shift_name", null),
                "department_interval_day" => $request->input("department_interval_day", null),
            ], $take, 'department_page', 'department_tab');
        $departmentData->setPageName('department_page');

        // filter and paginate position page
        $positionData = $this->workScheduleRepo->paginate(
            [
                ...$options,
                "subject_type" => config('work_schedule.subject_type.position'),
                "name" => $request->input("position_calender_name", null),
                "position_name" => $request->input("position_name", null),
                "shift_name" => $request->input("position_shift_name", null),
                "position_interval_day" => $request->input("position_interval_day", null),
            ], $take, 'position_page', 'position_tab');
        $positionData->setPageName('position_page');

        // filter and paginate employee page
        $employeeData = $this->workScheduleRepo->paginate(
            [
                ...$options,
                "subject_type" => config('work_schedule.subject_type.employee'),
                "name" => $request->input("employee_calender_name", null),
                "employee_name" => $request->input("employee_name", null),
                "shift_name" => $request->input("employee_shift_name", null),
                "employee_interval_day" => $request->input("employee_interval_day", null),
            ], $take, 'employee_page', 'employee_tab');
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
                'allow_from' => Carbon::createFromFormat("Y-m", $intervalDay[0])->startOfMonth()->format("Y-m-d"),
                'allow_to' => Carbon::createFromFormat("Y-m", $intervalDay[1])->endOfMonth()->format("Y-m-d"),
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
            Slack::error($message);
            return response()->json([
                'error_code' => 'exception_error',
                'message' => $validator->messages()->first()
            ], 442);
        }
    }

    public function calendarHoliday(Request $request)
    {
        $options = [
            "name" => $request->input("name", null)
        ];
        $year = $request->input("date", null);
        if ($year) {
            try {
                $date = Carbon::createFromFormat("Y", $year);
                $options['date_from'] = $date->copy()->startOfYear()->format('Y-m-d');
                $options['date_to'] = $date->copy()->endOfYear()->format('Y-m-d');
            } catch (\Exception $ex) {
                return redirect()->route('schedule-calendar-holiday')->with('message.error', 'Định dạng năm không hợp lệ');
            }
        }

        $holidaySchedules = $this->holidayScheduleRepo->paginate($options);
        return view('admin.schedule.calendar_holiday', compact('holidaySchedules'));
    }

    public function showFormCreateHoliday(Request $request)
    {
        return view('admin.schedule.calendar_holiday_create');
    }

    public function insertHoliday(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'interval_day' => 'required',
        ], [
            'name.required' => 'Tên ngày nghỉ lễ không được để trống',
            'name.max' => 'Tên ngày nghỉ lễ không được quá 255 ký tự',
            'interval_day.required' => 'Ngày nghỉ không được để trống',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('message.error', $validator->messages()->first())->withInput();
        }

        if ($request->input('interval_day') == ",") {
            return redirect()->back()->with('message.error', "Ngày nghỉ không được để trống")->withInput();
        }
        $intervalDays = explode(",", $request->input('interval_day'));
        $options = [
            "name" => $request->input("name"),
            "date_from" => $intervalDays[0],
            "date_to" => $intervalDays[1],
        ];

        $result = $this->holidayScheduleRepo->create($options);
        if ($result) {
            return redirect()->route('schedule-calendar-holiday')->with('message.success', 'Thêm loại sản phẩm thành công')->with('id_new', $result->id);
        }
        return redirect()->back()->with('message.error', 'Không thể tạo mới')->withInput();
    }
}
