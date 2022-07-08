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
        $banner = $this->bannerRepo->getBannerPublic();
        $bannerRes = collect();

        foreach ($banner as $b){
            $bannerRes[] = ([
                'links' => $b->links,
                'image' => $b->getBanner()
            ]);
        }

        return response()->json([
            "data" => $bannerRes,
        ]);
    }

    public function ranking(Request $request)
    {
        \Illuminate\Support\Facades\Log::info('------------  BAT DAU -------------');
        \Illuminate\Support\Facades\Event::listen('Illuminate\Database\Events\QueryExecuted', function ($query) {
            $sql = $query->sql;
            \Illuminate\Support\Facades\Log::debug('query : ' . $sql);
            \Illuminate\Support\Facades\Log::info('-------------------------');
            \Illuminate\Support\Facades\Log::info('');
        });
        $employeeId = Auth::user()->id;
        $day = date('Y-m-d');
        $data = $this->timekeepRepo->TimekeepRankingByEmployeeId($employeeId, $day);

        return response()->json([
            'data' => $data
        ]);
    }
}
