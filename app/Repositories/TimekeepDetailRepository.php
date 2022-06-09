<?php
namespace App\Repositories;

use App\Repositories\BaseRepository;

class TimekeepDetailRepository extends BaseRepository
{
    public function getModel()
    {
        return \App\Models\TimekeepDetail::class;
    }
}
