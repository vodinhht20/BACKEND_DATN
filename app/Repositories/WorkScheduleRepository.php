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
     * @return WorkSchedule
     */
    public function customizeCreate(array $options): WorkSchedule
    {
        $scheduleWork = new $this->model;

        if (isset($options['name'])) {
            $scheduleWork->name = $options['name'];
        }

        if (isset($options['days']) && count($options['days']) > 0) {
            $scheduleWork->days = $options['days'];
        }

        if (isset($options['allow_from'])) {
            $scheduleWork->allow_from = $options['allow_from'];
        }

        if (isset($options['allow_to'])) {
            $scheduleWork->allow_to = $options['allow_to'];
        }

        if (isset($options['subject_type'])) {
            $scheduleWork->subject_type = $options['subject_type'];
        }

        if (isset($options['department_id'])) {
            $scheduleWork->department_id = $options['department_id'];
        }

        if (isset($options['position_id'])) {
            $scheduleWork->position_id = $options['position_id'];
        }

        if (isset($options['employee_id'])) {
            $scheduleWork->employee_id = $options['employee_id'];
        }
        $scheduleWork->save();

        return $scheduleWork;
    }

    public function query($options)
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
                $q->where("name", "like", "%" . $options['employee_name'] . "%" );
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
