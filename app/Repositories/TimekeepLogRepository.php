<?php
namespace App\Repositories;

use App\Repositories\BaseRepository;

class TimekeepLogRepository extends BaseRepository
{
    public function getModel()
    {
        return \App\Models\TimekeepLog::class;
    }
}
