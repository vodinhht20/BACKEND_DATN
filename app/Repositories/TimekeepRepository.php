<?php
namespace App\Repositories;

use App\Models\Employee;
use App\Models\HolidaySchedule;
use App\Models\Request;
use App\Models\Timekeep;
use App\Models\TimekeepDetail;
use App\Repositories\BaseRepository;
use App\Service\TimekeepService;
use App\Service\TimesheetService;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

class TimekeepRepository extends BaseRepository
{
    public function getModel()
    {
        return \App\Models\Timekeep::class;
    }

    public function checkin(array $options): TimekeepDetail
    {
        $timekeep = $this->getTimekeepByDate($options['date'], $options['employee_id']);
        if ($timekeep) {
            $timekeep->update($options);
        } else {
            $timekeep = $this->create($options);
        }
        $options['timekeep_id'] = $timekeep->id;
        $timesheetDetail = TimekeepDetail::create($options);
        return $timesheetDetail;
    }

    public function getTimekeepByDate(string $date, $employeeId)
    {
        return $this->model
            ->where('date', $date)
            ->where('employee_id', $employeeId)
            ->first();
    }

    /**
     * Hàm lấy ra dữ liệu chấm công
     *
     * @param string $date
     * @param integer $employeeId
     * @return array
     */
    public function dataCheckinByDay(string $date, $employeeId): array
    {
        $type = 0;
        $checkin = null;
        $checkout = null;
        $workingTime = 0.0;
        $timekeep = $this->getTimekeepByDate($date, $employeeId);
        $timekeepDetailRepo = app(TimekeepDetailRepository::class);
        $timesheetService = app(TimesheetService::class);

        if ($timekeep) {
            $timekeepInDay = $timekeepDetailRepo->timekeepInDay($timekeep->id);
            if ($timekeepInDay && $timekeepInDay->first_time) {
                $checkin = Carbon::parse($timekeepInDay->first_time);
            }
            if ($timekeepInDay && $timekeepInDay->last_time) {
                $checkout = Carbon::parse($timekeepInDay->last_time);
            }
            $workingTime = $timesheetService->getDifferentHours($checkin, $checkout);
        }

        if ($checkin && $checkout) {
            $type = config('timekeep.already_checkin');
        }
        $firstMonth = Carbon::now()->startOfMonth()->format('Y-m-d');
        $endMonth = Carbon::now()->endOfMonth()->format('Y-m-d');

        $worktime = $this->model->where('date', '>=', $firstMonth)->where('date', '<=', $endMonth)->where('employee_id', $employeeId)->sum('worktime');
        $holiday = HolidaySchedule::where('date_from', '>=', $firstMonth)
            ->where('date_to', '<=', $endMonth)
            ->selectRaw('DATEDIFF(date_to, date_from) + 1 AS days')
            ->get()->sum('days');
        $totalDayMonth = (int)Carbon::now()->daysInMonth - (int)$holiday;
        return [
            'type' => $type,
            'checkin' => $checkin ? $checkin->format('H:i') : null,
            'checkout' => $checkout ? $checkout->format('H:i') : null,
            'working_time' => $workingTime,
            'date' => $date,
            'totalDayMonth' => $totalDayMonth,
            'worktime' => $worktime,


        ];
    }

    /**
     * Hàm kiểm tra xem vị trí có nằm chi nhánh không
     *
     * @param integer $longitude
     * @param integer $latitude
     * @param integer $employeeId
     * @return boolean
     */
    public function isLocaionInBranch($longitude, $latitude, $employeeId): bool
    {
        $timekeepService = new TimekeepService();
        $employee = Employee::find($employeeId);
        $branch = $employee['branch'] ?? null;
        if ($branch) {
            $rootLongitude = (float)$branch->longtitude;
            $rootLatitude = (float)$branch->latitude;
            $radius = (float)$branch->radius;
            return $timekeepService->isLocationInRadius($rootLongitude, $rootLatitude, $longitude, $latitude, $radius);
        }
        return false;
    }

    /**
     *
     * @param array $options
     * @return Builder
     */
    public function query(array $options): Builder
    {
        $query = $this->model->query();

        if (isset($options['with'])) {
            $query->with($options['with']);
        }

        if (isset($options['date_from'])) {
            $query->where("date", ">=", $options['date_from']);
        }

        if (isset($options['date'])) {
            $query->where("date", $options['date']);
        }

        if (isset($options['date_to'])) {
            $query->where("date", "<=", $options['date_to']);
        }

        if (isset($options['employee_id'])) {
            $query->where("employee_id", $options['employee_id']);
        }

        if (isset($options['employee_ids'])) {
            $query->whereIn("employee_id", $options['employee_ids']);
        }

        if (isset($options['keywords'])) {
            $query->whereHas("employee", function ($q) use ($options) {
                $q->where('fullname', 'like', "%" . $options['keywords'] . "%");
            });
        }

        if (isset($options['position_ids']) && count($options['position_ids']) > 0) {
            $query->whereHas("employee", function ($employeeQuery) use ($options) {
                $employeeQuery->whereIn('position_id', $options['position_ids']);
            });
        }

        return $query;
    }

    public function timesheetFormats($timekeeps, $format = "d-m"): array
    {
        $timesheetFormats = [];
        $timesheetService = app(TimesheetService::class);
        foreach ($timekeeps as $timekeep) {
            $checkin = $timekeep->timekeepDetail->first();
            $checkout = $timekeep->timekeepDetail->last();
            $worktimeHours = 0;
            if ($checkin) {

                $checkinCarbon = Carbon::parse($checkin->checkin_at);
                $checkoutCarbon = Carbon::parse($checkout->checkin_at);

                $checkinFormat = $checkinCarbon->format('H:i');
                $checkoutFormat = $checkoutCarbon->format('H:i');

                $checkoutFormat = $checkoutFormat == $checkinFormat ? null : $checkoutFormat;
                $worktimeHours = $timesheetService->getDifferentHours($checkinCarbon,$checkoutCarbon);
            }

            $formatDate = Carbon::createFromFormat("Y-m-d", $timekeep->date)->format($format);
            $timesheetFormats[$timekeep->employee_id]["timesheet"][$formatDate] = [
                'id' => $timekeep->id,
                'checkin' => $checkinFormat ?? null,
                'checkout' => $checkoutFormat ?? null,
                'type' => $timekeep->type,
                'minute_late' => $timekeep->minute_late,
                'minute_early' => $timekeep->minute_early,
                'worktime' => $timekeep->worktime
            ];

            $timesheetFormats[$timekeep->employee_id]["employee"] = $timekeep->employee;

            // Tính tổng ngày công thực thế
            if ($timekeep->type == config('timekeep.type.checkin')) {
                if (isset($timesheetFormats[$timekeep->employee_id]["sum_reality_worktime"])) {
                    $timesheetFormats[$timekeep->employee_id]["sum_reality_worktime"] += $timekeep->worktime;
                } else {
                    $timesheetFormats[$timekeep->employee_id]["sum_reality_worktime"] = $timekeep->worktime;
                }
            }

            // Tính tổng ngày công nghỉ phép
            if ($timekeep->type == config('timekeep.type.leave')) {
                if (isset($timesheetFormats[$timekeep->employee_id]["sum_leave_worktime"])) {
                    $timesheetFormats[$timekeep->employee_id]["sum_leave_worktime"] += $timekeep->worktime;
                } else {
                    $timesheetFormats[$timekeep->employee_id]["sum_leave_worktime"] = $timekeep->worktime;
                }
            }

            // Tính tổng ngày công nghỉ lễ
            if ($timekeep->type == config('timekeep.type.holiday')) {
                if (isset($timesheetFormats[$timekeep->employee_id]["sum_holiday_worktime"])) {
                    $timesheetFormats[$timekeep->employee_id]["sum_holiday_worktime"] += $timekeep->worktime;
                } else {
                    $timesheetFormats[$timekeep->employee_id]["sum_holiday_worktime"] = $timekeep->worktime;
                }
            }

            // Tính tổng ngày công không lương
            if ($timekeep->type == config('timekeep.type.no_salary')) {
                if (isset($timesheetFormats[$timekeep->employee_id]["sum_no_salary_worktime"])) {
                    $timesheetFormats[$timekeep->employee_id]["sum_no_salary_worktime"] += $timekeep->worktime;
                } else {
                    $timesheetFormats[$timekeep->employee_id]["sum_no_salary_worktime"] = $timekeep->worktime;
                }
            }

            // Tổng số giờ OT
            if (isset($timesheetFormats[$timekeep->employee_id]["sum_overtime_hour_worktime"])) {
                $timesheetFormats[$timekeep->employee_id]["sum_overtime_hour_worktime"] += $timekeep->overtime_hour;
            } else {
                $timesheetFormats[$timekeep->employee_id]["sum_overtime_hour_worktime"] = $timekeep->overtime_hour;
            }

            // Tổng số giờ làm việc
            if (isset($timesheetFormats[$timekeep->employee_id]["sum_worktime_hour"])) {
                $timesheetFormats[$timekeep->employee_id]["sum_worktime_hour"] += $worktimeHours;
            } else {
                $timesheetFormats[$timekeep->employee_id]["sum_worktime_hour"] = $worktimeHours;
            }

            // Tổng số phút đi muộn
            if (isset($timesheetFormats[$timekeep->employee_id]["sum_minute_late_worktime"])) {
                $timesheetFormats[$timekeep->employee_id]["sum_minute_late_worktime"] += $timekeep->minute_late;
            } else {
                $timesheetFormats[$timekeep->employee_id]["sum_minute_late_worktime"] = $timekeep->minute_late;
            }

            // Tổng số phút về sớm
            if (isset($timesheetFormats[$timekeep->employee_id]["sum_minute_early_worktime"])) {
                $timesheetFormats[$timekeep->employee_id]["sum_minute_early_worktime"] += $timekeep->minute_early;
            } else {
                $timesheetFormats[$timekeep->employee_id]["sum_minute_early_worktime"] = $timekeep->minute_early;
            }

            // Tổng công hiện tại
            if (isset($timesheetFormats[$timekeep->employee_id]["sum_current_worktime"])) {
                $timesheetFormats[$timekeep->employee_id]["sum_current_worktime"] += $timekeep->worktime;
            } else {
                $timesheetFormats[$timekeep->employee_id]["sum_current_worktime"] = $timekeep->worktime;
            }
        }

        return $timesheetFormats;
    }

    /**
     * Hàm xếp hạng chấm công các nhân viên trong chi nhánh
     * @param string|int $employeeId
     * @param date $day ("Y-m-d")
     * @return array
     */
    public function TimekeepRankingByEmployeeId($employeeId, $day, $take = 5): array
    {
        $branchId = Employee::find($employeeId)->branch_id;
        $employeeIds = Employee::where('branch_id', $branchId)->pluck('id')->toArray();

        // Xếp hạng đi sớm
        $timekeepEarly = $this->model->whereIn('employee_id', $employeeIds)
            ->selectRaw('timekeeps.id, timekeeps.employee_id, timekeeps.minute_late, min(timekeep_details.checkin_at) as checkin_at, ROW_NUMBER() OVER(ORDER BY min(timekeep_details.checkin_at) asc) as `rank`')
            ->join('timekeep_details', 'timekeep_details.timekeep_id', '=', 'timekeeps.id')
            ->with([
                'employee' => function ($query) {
                    $query->select('id', 'avatar', 'fullname', 'position_id', 'type_avatar');
                },
                'employee.position' => function ($query) {
                    $query->select('id', 'name');
                }
            ])
            ->groupBy('timekeep_details.timekeep_id')
            ->where('date', $day)
            ->orderBy('rank', 'asc')
            ->where('minute_late', 0)
            ->get();

        $timekeepEarly = $timekeepEarly->map(function ($timekeep) {
            $timekeep->checkin_at = Carbon::parse($timekeep->checkin_at)->format('H:i');
            if ($timekeep->employee) {
                $timekeep->employee->avatar = $timekeep->employee->getAvatar();
            }
            return $timekeep;
        });

        // Xếp hạng đi muộn
        $timekeepLate = $this->model->whereIn('employee_id', $employeeIds)
            ->selectRaw('timekeeps.id, timekeeps.employee_id, timekeeps.minute_late, min(timekeep_details.checkin_at) as checkin_at, ROW_NUMBER() OVER (ORDER BY timekeeps.minute_late DESC) as `rank`')
            ->join('timekeep_details', 'timekeep_details.timekeep_id', '=', 'timekeeps.id')
            ->with([
                'employee' => function ($query) {
                    $query->select('id', 'avatar', 'fullname', 'position_id', 'type_avatar');
                },
                'employee.position' => function ($query) {
                    $query->select('id', 'name');
                }
            ])
            ->groupBy('timekeep_details.timekeep_id')
            ->where('date', $day)
            ->where('minute_late', '>', 0)
            ->orderBy('rank', 'asc')
            ->get();

        $rankTimekeepEarlyMax = $timekeepEarly->max('rank');
        $timekeepLate = $timekeepLate->map(function ($timekeep) use ($rankTimekeepEarlyMax) {
            $timekeep->checkin_at = Carbon::parse($timekeep->checkin_at)->format('H:i');
            $timekeep->rank += $rankTimekeepEarlyMax;
            if ($timekeep->employee) {
                $timekeep->employee->avatar = $timekeep->employee->getAvatar();
            }
            return $timekeep;
        });

        return [
            'timekeep_late' => $timekeepLate,
            'timekeep_early' => $timekeepEarly
        ];
    }

    /**
     * Hàm xếp hạng danh sách chuyên cần trong tháng
     *
     * @param Employee $employee
     * @return array
     */
    public function rankDiligenceByEmployee(Employee $employee, $take = 10): array
    {
        $startOfMonth = Carbon::now()->startOfMonth()->format('Y-m-d');
        $employeeIds = Employee::where('branch_id', $employee->branch_id)->pluck('id')->toArray();
        $timekeepRank = $this->model
            ->selectRaw('employee_id, SUM( worktime ) as "sum_worktime", SUM(minute_late + minute_early) as "sum_minute", ROW_NUMBER() OVER(ORDER BY SUM( worktime ) desc, SUM(minute_late + minute_early) asc) as "rank"')
            ->with([
                'employee' => function ($query) {
                    $query->select('id', 'avatar', 'fullname', 'position_id', 'type_avatar');
                },
                'employee.position' => function ($query) {
                    $query->select('id', 'name');
                }
            ])
            ->whereIn('employee_id', $employeeIds)
            ->where("date", ">=", $startOfMonth)
            ->take($take)
            ->groupBy('employee_id')
            ->get();

            $employees = $timekeepRank->map(function ($timekeep, $index) {
            if ($timekeep->employee) {
                $timekeep->employee->rank = $index + 1;
                $timekeep->employee->avatar = $timekeep->employee->getAvatar();
            }
            return $timekeep->employee;
        });
        return $employees->toArray();
    }

    /**
     * Hàm kiểm tra xem ngày hôm đấy đã checkin hay Chưa
     *
     * @param string $date ('Y-m-d')
     * @param string|int $employeeId
     * @return boolean
     */

    public function isFirstCheckin($date, $employeeId): bool
    {
        $timekeep = $this->getFirstCheckin($date, $employeeId);
        if ($timekeep) {
            return false;
        }
        return true;
    }

    public function getFirstCheckin($date, $employeeId) {
        $timekeepDetailRepo = app(TimekeepDetailRepository::class);
        $timekeep = $this->model->where('date', $date)
            ->where('employee_id', $employeeId)
            ->first();
        if ($timekeep) {
            return $timekeepDetailRepo->model->where('timekeep_id', $timekeep->id)
                ->orderBy('checkin_at', 'asc')
                ->first();
        }
        return null;
    }

    public function getByEmployeeCode(array $employeeCode, array $options): Collection
    {
        $employees = $this->query($options)->with(["employee" => function($query) {
                $query->select("id", "employee_code", "status");
            }])
            ->whereHas("employee", function ($query) use ($employeeCode) {
                $query->whereIn("employee_code", $employeeCode);
            });
        return $employees->get();
    }

    public function getTimeOTbyEmplyeeId($id, $options = []) {
        $query = $this->model->query();
        if (isset($options['date'])) {
            $query->where('date', '>=', $options['date']['firstMonth'])
            ->where('date', '<=', $options['date']['endMonth']);
        };

        $employeeOT = $query->where('employee_id', $id)->get()->sum('overtime_hour');
        $employeeMinuteLate = $query->where('employee_id', $id)->get()->sum('minute_late');
        $employeeMinuteEarly = $query->where('employee_id', $id)->get()->sum('minute_early');

        return collect([
            'ot' => $employeeOT * 60,
            'minute_late' => $employeeMinuteLate,
            'minute_early' => $employeeMinuteEarly
        ]);
    }

    public function dashboardFormats($id, $options = [])
    {
        $timekeeps = Timekeep::where('employee_id', $id)
        ->where('date', '>=', $options['date']['firstMonth'])
        ->where('date', '<=', $options['date']['endMonth'])
        ->selectRaw('minute_late AS m , date as day, "Đi muộn" as "name"')->get()->toArray();

        $timekeep2 = Timekeep::where('employee_id', $id)
        ->where('date', '>=', $options['date']['firstMonth'])
        ->where('date', '<=', $options['date']['endMonth'])
        ->selectRaw('minute_early AS m , date as day, "Về sớm" as "name"')->get()->toArray();

        $timekeep3 = Timekeep::where('employee_id', $id)
        ->where('date', '>=', $options['date']['firstMonth'])
        ->where('date', '<=', $options['date']['endMonth'])
        ->selectRaw('(overtime_hour * 60) AS m , date as day, "OT" as "name"')->get()->toArray();
        return array_merge($timekeeps, $timekeep2, $timekeep3);
    }

    /**
     * Hàm tính số công của nhân viên
     *
     * @param Employee $employee
     * @param Carbon $checkin
     * @param Carbon $checkout
     * @return array
     */
    public function getWorkTime(Employee $employee, Carbon $checkin, Carbon $checkout): array
    {
        $date = $checkin->format('Y-m-d');
        $employeeId = $employee->id;
        $data = [
            "worktime" => 0,
            "minute_early" => 0,
            "minute_late" => 0
        ];
        $workScheduleRepo = app(workScheduleRepository::class);
        $timesheetService = app(TimesheetService::class);
        // Tính số công làm việc
        $workScheduleForTheDay = $workScheduleRepo->workScheduleForTheDay($date, $employeeId);
        if ($workScheduleForTheDay && in_array($checkin->isoFormat("d"), $workScheduleForTheDay->days)) {

            // Thời điểm checkin hợp lệ
            $maxCheckin = Carbon::parse("$date " . $workScheduleForTheDay->work_from_at)
                ->addMinutes($workScheduleForTheDay->checkin_late);

            // Thời điểm checkout hợp lệ
            $minCheckout = Carbon::parse("$date " . $workScheduleForTheDay->work_to_at)
                ->subMinutes($workScheduleForTheDay->checkin_late);


            // Tính thời gian về sớm
            $earlyMinute = $minCheckout->diffInMinutes($checkout);
            if ($checkout < $minCheckout) {
                $data['minute_early'] = $earlyMinute;
            }

            // Tính thời gian đi muộn
            $lateMinute = $checkin->diffInMinutes($maxCheckin);
            if ($maxCheckin < $checkin) {
                $data['minute_late'] = $lateMinute;
            }

            $checkinInWork = $checkin->format('H:i:s');
            $checkoutInWork = $checkout->format('H:i:s');
            if ($checkinInWork < $workScheduleForTheDay->work_from_at) {
                $checkinInWork = $workScheduleForTheDay->work_from_at;
            }

            if ($checkoutInWork > $workScheduleForTheDay->work_to_at) {
                $checkoutInWork = $workScheduleForTheDay->work_to_at;
            }

            // Thời gian làm việc thực tế
            $checkinInWork = Carbon::createFromFormat("H:i:s", $checkinInWork);
            $checkoutInWork = Carbon::createFromFormat("H:i:s", $checkoutInWork);
            $workTime = $timesheetService->getDifferentHours($checkinInWork, $checkoutInWork);
            // Xảy ra 3 trường hợp khi chấm công: 1. Chấm công đúng giờ, 2. Chấm công thiếu giờ có công, 3. Chấm công thiếu giò không công
            if ($maxCheckin >= $checkin && $minCheckout <= $checkout->format('Y-m-d H:i:s')) {
                $data['worktime'] = $workScheduleForTheDay->actual_workday;
            } else if ($workTime >= $workScheduleForTheDay->late_hour) {
                $data['worktime'] = $workScheduleForTheDay->virtual_workday;
            }
        }

        return $data;
    }
}
