<?php
namespace App\Repositories;

use App\Repositories\RepositoryInterface;

interface CategoryRepositoryInterface extends RepositoryInterface
{
    public function getAllCategoryPaginate($maxCol);
    public function getAllActive();
    public function getCategorytParent();
    public function removeCategory($id);
}
