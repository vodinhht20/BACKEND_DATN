<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\BannerRepository;

class HomeController extends Controller
{
    public function __construct(BannerRepository $bannerRepo)
    {
        $this->bannerRepo = $bannerRepo;
    }

    public function banner(){
        $banner = $this->bannerRepo->getBannerPublic();
        $bannerRes = collect();

        foreach ($banner as $b){
            $bannerRes[] = ([
                'links' => $b->links,
                'images' => $b->getBanner()
            ]);
        }
        
        return response()->json([
            "data" => $bannerRes,
        ]);
    }
}
