<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\BannerRepository;
use App\Repositories\TimekeepRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct(private BannerRepository $bannerRepo, private TimekeepRepository $timekeepRepo)
    {
        //
    }

    public function banner(){
        $banners = $this->bannerRepo->getBannerPublic();
        $bannerRes = collect();

        foreach ($banners as $banner){
            $bannerRes[] = ([
                'links' => $banner->links,
                'image' => $banner->getBanner()
            ]);
        }

        return response()->json([
            "data" => $bannerRes,
        ]);
    }

    public function ranking(Request $request)
    {
        $employeeId = Auth::user()->id;
        $day = date('Y-m-d');
        $data = $this->timekeepRepo->TimekeepRankingByEmployeeId($employeeId, $day);
        return response()->json([
            'data' => $data
        ]);
    }
}
