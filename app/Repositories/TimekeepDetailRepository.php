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
        $query = $this->model->query();
        $query->selectRaw("timekeep_id, min(id) as checkin, IF(max(id) = min(id),null,max(id)) as checkout")
            ->where('timekeep_id', $timekeepId)
            ->get();
        return 1235;
    }
}
