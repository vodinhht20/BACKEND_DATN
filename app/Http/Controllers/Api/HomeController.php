<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\BannerRepository;
use App\Repositories\EmployeeRepository;
use App\Repositories\TimekeepRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct(
        private BannerRepository $bannerRepo,
        private TimekeepRepository $timekeepRepo,
        private EmployeeRepository $employeeRepo
    )
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

    public function notableNews(Request $request)
    {
        $employee= Auth::user();
        $rankDiligence = $this->timekeepRepo->rankDiligenceByEmployee($employee);
        $memberOnboard = $this->employeeRepo->getMemberOnboard($employee);
        return response()->json([
            'data' => [
                "rank_diligence" => $rankDiligence,
                "member_onboard" => $memberOnboard
            ]
        ]);
    }

    public function birthDay(Request $request)
    {
        $employee= Auth::user();
        $employees = $this->employeeRepo->getHappyBirthDay($employee);
        return response()->json([
            'data' => $employees
        ]);
    }
}
