<?php

namespace App\Repositories;

use App\Repositories\BaseRepository;

class BannerRepository extends BaseRepository
{
    public function getModel()
    {
        return \App\Models\Banner::class;
    }

    public function getBannerPublic()
    {
        $banner = $this->model->where('from_at', '<=', date('Y-m-d'))
        ->where('to_at', '>=', date('Y-m-d'))
        ->select('image', 'links')
        ->get();
        return $banner;
    }
}
