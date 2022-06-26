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
        $banner = $this->model->OrderBy('id', 'desc')
        ->where('from_at', '<=', date('Y-m-d'))
        ->where('to_at', '>=', date('Y-m-d'))
        ->select('image', 'links', 'type')
        ->get();
        return $banner;
    }

    public function getBannerPaginate()
    {
        $banner = $this->model->OrderBy('id', 'desc')->paginate(5);
        return $banner;
    }
}
