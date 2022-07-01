<?php
namespace App\Repositories;

use App\Models\Employee;
use App\Models\Timekeep;
use App\Models\TimekeepDetail;
use App\Repositories\BaseRepository;
use App\Service\TimekeepService;
use App\Service\TimesheetService;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;

class TimekeepRepository extends BaseRepository
{
    public function getModel()
    {
        return \App\Models\Timekeep::class;
    }

    public function checkin(array $options): TimekeepDetail
    {
        $timekeep = $this->getTimekeepByDate($options['date'], $options['employee_id']);
        if (!$timekeep) {
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
        return [
            'type' => $type,
            'checkin' => $checkin ? $checkin->format('H:i') : null,
            'checkout' => $checkout ? $checkout->format('H:i') : null,
            'working_time' => $workingTime,
            'date' => $date
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
        $employee = Employee::with('branch')->find($employeeId);
        $branch = $employee->branch;
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

        if (isset($options['date_to'])) {
            $query->where("date", "<=", $options['date_to']);
        }

        if (isset($options['employee_id'])) {
            $query->where("id", $options['employee_id']);
        }

        if (isset($options['employee_ids'])) {
            $query->whereIn("id", $options['employee_ids']);
        }

        if (isset($options['keywords'])) {
            $query->whereHas("employee", function ($q) use ($options) {
                $q->where('fullname', 'like', "%" . $options['keywords'] . "%");
            });
        }

        if (isset($options['position_ids']) && count($options['position_ids']) > 0) {
            $query->whereHas("employee", function ($employeeQuery) use ($options) {
                $employeeQuery->whereHas("position", function ($positionsQuery) use ($options) {
                    $positionsQuery->whereIn("id", $options['position_ids']);
                });
            });
        }

        return $query;
    }

    public function timesheetFormats($timekeeps): array
    {
        $timesheetFormats = [];
        $timesheetService = app(TimesheetService::class);
        foreach ($timekeeps as $timekeep) {
            $checkin = $timekeep->timekeepdetail->first();
            $checkout = $timekeep->timekeepdetail->last();
            $worktimeHours = 0;
            if ($checkin) {

                $checkinCarbon = Carbon::parse($checkin->checkin_at);
                $checkoutCarbon = Carbon::parse($checkout->checkin_at);

                $checkinFormat = $checkinCarbon->format('H:i');
                $checkoutFormat = $checkoutCarbon->format('H:i');

                $checkoutFormat = $checkoutFormat == $checkinFormat ? null : $checkoutFormat;
                $worktimeHours = $timesheetService->getDifferentHours($checkinCarbon,$checkoutCarbon);
            }

            $formatDate = Carbon::createFromFormat("Y-m-d", $timekeep->date)->format('d-m');
            $timesheetFormats[$timekeep->employee_id]["timesheet"][$formatDate] = [
                'id' => $timekeep->id,
                'checkin' => $checkinFormat ?? null,
                'checkout' => $checkoutFormat ?? null,
                'minute_late' => $timekeep->minute_late,
                'minute_early' => $timekeep->minute_early,
                'worktime' => $timekeep->worktime
            ];

            $timesheetFormats[$timekeep->employee_id]["employee"] = $timekeep->employee;

            // Tính tổng ngày công thực thế
            if (isset($timesheetFormats[$timekeep->employee_id]["sum_reality_worktime"])) {
                if ($timekeep->type == config('timekeep.type.checkin')) {
                    $timesheetFormats[$timekeep->employee_id]["sum_reality_worktime"] += $timekeep->worktime;
                }
            } else {
                $timesheetFormats[$timekeep->employee_id]["sum_reality_worktime"] = 0;
            }

            // Tính tổng ngày công nghỉ phép
            if (isset($timesheetFormats[$timekeep->employee_id]["sum_leave_worktime"])) {
                if ($timekeep->type == config('timekeep.type.leave')) {
                    $timesheetFormats[$timekeep->employee_id]["sum_leave_worktime"] += $timekeep->worktime;
                }
            } else {
                $timesheetFormats[$timekeep->employee_id]["sum_leave_worktime"] = 0;
            }

            // Tính tổng ngày công nghỉ lễ
            if (isset($timesheetFormats[$timekeep->employee_id]["sum_holiday_worktime"])) {
                if ($timekeep->type == config('timekeep.type.holiday')) {
                    $timesheetFormats[$timekeep->employee_id]["sum_holiday_worktime"] += $timekeep->worktime;
                }
            } else {
                $timesheetFormats[$timekeep->employee_id]["sum_holiday_worktime"] = 0;
            }

            // Tính tổng ngày công không lương
            if (isset($timesheetFormats[$timekeep->employee_id]["sum_no_salary_worktime"])) {
                if ($timekeep->type == config('timekeep.type.no_salary')) {
                    $timesheetFormats[$timekeep->employee_id]["sum_no_salary_worktime"] += $timekeep->worktime;
                }
            } else {
                $timesheetFormats[$timekeep->employee_id]["sum_no_salary_worktime"] = 0;
            }

            // Tổng số giờ OT
            if (isset($timesheetFormats[$timekeep->employee_id]["sum_overtime_hour_worktime"])) {
                $timesheetFormats[$timekeep->employee_id]["sum_overtime_hour_worktime"] += $timekeep->overtime_hour;
            } else {
                $timesheetFormats[$timekeep->employee_id]["sum_overtime_hour_worktime"] = 0;
            }

            // Tổng số giờ làm việc
            if (isset($timesheetFormats[$timekeep->employee_id]["sum_worktime_hour"])) {
                $timesheetFormats[$timekeep->employee_id]["sum_worktime_hour"] += $worktimeHours;
            } else {
                $timesheetFormats[$timekeep->employee_id]["sum_worktime_hour"] = 0;
            }

            // Tổng số phút đi muộn
            if (isset($timesheetFormats[$timekeep->employee_id]["sum_minute_late_worktime"])) {
                $timesheetFormats[$timekeep->employee_id]["sum_minute_late_worktime"] += $timekeep->minute_late;
            } else {
                $timesheetFormats[$timekeep->employee_id]["sum_minute_late_worktime"] = 0;
            }

            // Tổng số phút về sớm
            if (isset($timesheetFormats[$timekeep->employee_id]["sum_minute_early_worktime"])) {
                $timesheetFormats[$timekeep->employee_id]["sum_minute_early_worktime"] += $timekeep->minute_early;
            } else {
                $timesheetFormats[$timekeep->employee_id]["sum_minute_early_worktime"] = 0;
            }

            // Tổng công hiện tại
            if (isset($timesheetFormats[$timekeep->employee_id]["sum_current_worktime"])) {
                $timesheetFormats[$timekeep->employee_id]["sum_current_worktime"] += $timekeep->worktime;
            } else {
                $timesheetFormats[$timekeep->employee_id]["sum_current_worktime"] = 0;
            }
        }

        return $timesheetFormats;
    }
}
