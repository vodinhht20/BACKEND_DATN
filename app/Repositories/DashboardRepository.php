<?php

namespace App\Repositories;

use App\Repositories\BaseRepository;

class DashboardRepository extends BaseRepository
{
    public function getModel()
    {
        return \App\Models\Banner::class;
    }
}
