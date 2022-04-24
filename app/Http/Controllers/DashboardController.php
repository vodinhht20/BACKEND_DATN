<?php

namespace App\Http\Controllers;

use App\Repositories\ProductRepositoryInterface;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct(ProductRepositoryInterface $productRepo, UserRepositoryInterface $userRepo)
    {
        $this->productRepo = $productRepo;
        $this->userRepo = $userRepo;
    }

    public function index() {
        $countProduct = $this->productRepo->getAll()->count();
        $countProductActive = $this->productRepo->getProductActive()->count();
        $countProductTrash = $this->productRepo->getTrash()->count();
        $countUser = $this->userRepo->getAll()->count();

        // dd($countProduct);   
        return view('admin.dashboard', compact('countProduct', 'countProductActive', 'countProductActive', 'countProductTrash', 'countUser'));
    }
}
