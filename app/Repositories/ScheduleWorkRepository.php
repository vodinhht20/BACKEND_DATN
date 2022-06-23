<?php
namespace App\Repositories;

use App\Repositories\BaseRepository;

class ScheduleWorkRepository extends BaseRepository
{
    //lấy model tương ứng
    public function getModel()
    {
        return \App\Models\ScheduleWork::class;
    }

    public function customizeCreate($options)
    {
        // 'work_shift_name' => $request->input('work_shift_name'),
        //     'work_shifts' => $request->input('work_shifts', []),
        //     'days' => $request->input('days', []),
        //     'interval_day' => $request->input('interval_day', []),

        $scheduleWork = new $this->model;
        if (isset($options['work_shift_name'])) {
            $scheduleWork->name = $options['work_shift_name'];
        }

        if (isset($options['work_shifts']) && count($options['work_shifts']) > 0) {

        }

        if (isset($options['days']) && count($options['days']) > 0) {
            $scheduleWork->days = $options['days'];
        }

        if (isset($option['interval_day'])) {
            // interval_day
            // $scheduleWork
        }


    }
}
