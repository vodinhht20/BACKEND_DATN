<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\BannerRepository;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct(BannerRepository $bannerRepo)
    {
        $this->bannerRepo = $bannerRepo;
    }

    public function banner(){
        return response()->json([
            "data" => $this->bannerRepo->getBannerPublic(),
        ]);
    }
}
