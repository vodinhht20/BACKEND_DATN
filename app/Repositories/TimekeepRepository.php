<?php
namespace App\Repositories;

use App\Models\Employee;
use App\Models\Timekeep;
use App\Models\TimekeepDetail;
use App\Repositories\BaseRepository;

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

    public function dataCheckinByDay(string $date, $employeeId)
    {
        $timekeep = $this->getTimekeepByDate($date, $employeeId);
        $timekeepDetailRepo = app(TimekeepDetailRepository::class);
        if ($timekeep) {
            $timekeepInDay = $timekeepDetailRepo->timekeepInDay($timekeep->id);
            dd($timekeepInDay);
            return $timekeepInDay;
        }
        return [];
    }
}
