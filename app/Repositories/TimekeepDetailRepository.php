<?php
namespace App\Repositories;

use App\Repositories\BaseRepository;

class TimekeepDetailRepository extends BaseRepository
{
    public function getModel()
    {
        return \App\Models\TimekeepDetail::class;
    }

    public function timekeepInDay($timekeepId)
    {
        $query = $this->model
            ->selectRaw("timekeep_id, min(checkin_at) as first_time, IF(max(id) = min(id), null, max(checkin_at)) as last_time")
            ->where('timekeep_id', $timekeepId)
            ->groupBy('timekeep_id')
            ->first();
        return $query;
    }
}
