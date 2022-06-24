<?php
namespace App\Repositories;

use App\Models\WorkSchedule;
use App\Repositories\BaseRepository;

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

        return $scheduleWorks;
    }

    // public function dataFormat($options)
    // {

    // }
}
