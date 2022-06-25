<?php
namespace App\Repositories;

use App\Repositories\BaseRepository;

use function PHPUnit\Framework\throwException;

class WorkShiftRepository extends BaseRepository
{
    //lấy model tương ứng
    public function getModel()
    {
        return \App\Models\WorkShift::class;
    }

    public function customizeCreate($options)
    {
        $scheduleWork = new $this->model;
        if (isset($options['work_schedule_id'])) {
            $scheduleWork->work_schedule_id = $options['work_schedule_id'];
        }

        if (isset($options['name'])) {
            $scheduleWork->name = $options['name'];
        }

        if (isset($options['work_from'])) {
            $scheduleWork->work_from = $options['work_from'];
        }

        if (isset($options['work_to'])) {
            $scheduleWork->work_to = $options['work_to'];
        }
    }

    public function createMultiple($options): void
    {
        foreach($options['work_shifts'] as $work_shift) {
            $scheduleWork = new $this->model;
            $scheduleWork->work_schedule_id = $options['work_schedule_id'];
            $scheduleWork->name = $work_shift['shiftName'];
            $scheduleWork->work_from = $work_shift['shiftTime'][0];
            $scheduleWork->work_to = $work_shift['shiftTime'][1];
            $scheduleWork->save();
        }
    }
}
