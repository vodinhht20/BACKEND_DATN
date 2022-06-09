<?php
namespace App\Repositories;

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
        $timekeep = $this->getTimekeepByDate($options['date']);
        if (!$timekeep) {
            $timekeep = $this->create($options);
        }
        $options['timekeep_id'] = $timekeep->id;
        $timesheetDetail = TimekeepDetail::create($options);
        return $timesheetDetail;
    }

    public function getTimekeepByDate(string $date)
    {
        return $this->model->where('date', $date)->first();
    }
}
