<?php
namespace App\Repositories;

use App\Repositories\RepositoryInterface;

interface ProductRepositoryInterface extends RepositoryInterface
{
    //ví dụ: lấy 5 sản phầm đầu tiên
    public function getAllProductPaginate($maxCol);
    public function restore($id);
    public function restoreAll();
    public function deleteAll();
    public function getProductByCateId($id);
    public function getSaleWeekProducts();
}
