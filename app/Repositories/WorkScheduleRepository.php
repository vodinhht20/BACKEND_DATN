<?php
namespace App\Repositories;

use App\Models\WorkSchedule;
use App\Repositories\BaseRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class WorkScheduleRepository extends BaseRepository
{

    public function getModel()
    {
        return WorkSchedule::class;
    }

    /**
     *
     * @param array $options
     * @return void
     */
    public function customizeCreate(array $options): void
    {
        if (isset($options['employee_ids']) && count($options['employee_ids']) > 0) {
            foreach ($options['employee_ids'] as $employeeId) {
                unset($options['employee_ids']);
                $this->create([...$options, 'employee_id' => $employeeId]);
            }
        } else {
            $this->create($options);
        }
    }

    public function query($options = [])
    {
        $scheduleWorks = $this->model->query();

        if (isset($options['with']) && count($options['with']) > 0) {
            $scheduleWorks->with($options['with']);
        }

        if (isset($options['subject_type'])) {
            $scheduleWorks->where('subject_type', $options['subject_type']);
        }

        if (isset($options['name'])) {
            $scheduleWorks->where("name", "like", "%" . $options['name'] . "%");
        }

        if (isset($options['shift_name'])) {
            $scheduleWorks->whereHas("workShift", function ($q) use ($options) {
                $q->where("name", "like", "%" . $options['shift_name'] . "%" );
            });
        }

        if (isset($options['allow_from'])) {
            $scheduleWorks->where("allow_from", ">=", $options['allow_from']);
        }

        if (isset($options['allow_to'])) {
            $scheduleWorks->where("allow_to", "<=", $options['allow_to']);
        }

        if (isset($options['allow_from_or_allow_to'])) {
            $scheduleWorks->where("allow_from", ">=", $options['allow_from_or_allow_to'][0]);
            $scheduleWorks->where("allow_to", "<=", $options['allow_from_or_allow_to'][1]);
        }

        if (isset($options['department_id'])) {
            $scheduleWorks->where('department_id', $options['department_id']);
        }

        if (isset($options['position_id'])) {
            $scheduleWorks->where('position_id', $options['position_id']);
        }

        if (isset($options['employee_id'])) {
            $scheduleWorks->where('employee_id', $options['employee_id']);
        }

        if (isset($options['employee_ids'])) {
            $scheduleWorks->whereIn('employee_id', $options['employee_ids']);
        }

        if (isset($options['department_name'])) {
            $scheduleWorks->whereHas("department", function ($q) use ($options) {
                $q->where("name", "like", "%" . $options['department_name'] . "%" );
            });
        }

        if (isset($options['position_name'])) {
            $scheduleWorks->whereHas("position", function ($q) use ($options) {
                $q->where("name", "like", "%" . $options['position_name'] . "%" );
            });
        }

        if (isset($options['employee_name'])) {
            $scheduleWorks->whereHas("employee", function ($q) use ($options) {
                $q->where("fullname", "like", "%" . $options['employee_name'] . "%" );
            });
        }

        if (isset($options['company_interval_day']) && $options['company_interval_day']) {
            $companyIntervalDay = explode(',', $options['company_interval_day']);
            $allowFrom = $companyIntervalDay[0];
            $allowTo = $companyIntervalDay[1];
            $scheduleWorks->where("allow_from", ">=", $allowFrom);
            $scheduleWorks->where("allow_to", "<=", $allowTo);
        }

        if (isset($options['department_interval_day']) && $options['department_interval_day']) {
            $companyIntervalDay = explode(',', $options['department_interval_day']);
            $allowFrom = $companyIntervalDay[0];
            $allowTo = $companyIntervalDay[1];
            $scheduleWorks->where("allow_from", ">=", $allowFrom);
            $scheduleWorks->where("allow_to", "<=", $allowTo);
        }

        if (isset($options['position_interval_day']) && $options['position_interval_day']) {
            $companyIntervalDay = explode(',', $options['position_interval_day']);
            $allowFrom = $companyIntervalDay[0];
            $allowTo = $companyIntervalDay[1];
            $scheduleWorks->where("allow_from", ">=", $allowFrom);
            $scheduleWorks->where("allow_to", "<=", $allowTo);
        }

        if (isset($options['employee_interval_day']) && $options['employee_interval_day']) {
            $companyIntervalDay = explode(',', $options['employee_interval_day']);
            $allowFrom = $companyIntervalDay[0];
            $allowTo = $companyIntervalDay[1];
            $scheduleWorks->where("allow_from", ">=", $allowFrom);
            $scheduleWorks->where("allow_to", "<=", $allowTo);
        }

        $scheduleWorks->orderBy('id', 'desc');
        return $scheduleWorks;
    }

    /**
     *
     * @param array $options
     * @param integer $take
     * @return LengthAwarePaginator
     */
    public function paginate($options, $take = 20, $pageName, $tab): LengthAwarePaginator
    {
        $workSchedules = $this->query($options)->paginate($take, ['*'], $pageName)->withPath("?current_tab=$tab");
        return $workSchedules;
    }
}
