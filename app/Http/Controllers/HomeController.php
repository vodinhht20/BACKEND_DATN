<?php

namespace App\Http\Controllers;

use App\Repositories\CategoryRepositoryInterface;
use App\Repositories\ProductRepositoryInterface;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct(ProductRepositoryInterface $productRepo, CategoryRepositoryInterface $categoryRepo) {

        $this->productRepo = $productRepo;
        $this->categoryRepo = $categoryRepo;
    }
    
    public function index() {
        $phoneId = config('category.list.phone');
        $laptopId = config('category.list.laptop');
        $smartWatchId = config('category.list.smart_watch');

        $products = [];
        $products['sales'] = $this->productRepo->getSaleWeekProducts();
        $products['phones'] = $this->productRepo->getProductByCateId($phoneId);
        $products['laptops'] = $this->productRepo->getProductByCateId($laptopId);
        $products['smart_watchs'] = $this->productRepo->getProductByCateId($smartWatchId);

        $categories = [];
        $categories['all'] = $this->categoryRepo->getAllActive();
        $categories['phones'] = $this->categoryRepo->getChildren($phoneId);
        $categories['laptops'] = $this->categoryRepo->getChildren($laptopId);
        $categories['smart_watchs'] = $this->categoryRepo->getChildren($smartWatchId);
        
        return view("client.home", compact('products', 'categories'));
    }
    public function v2Index() {
        return view("index");
    }
}
