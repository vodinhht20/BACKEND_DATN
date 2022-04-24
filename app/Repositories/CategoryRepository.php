<?php
namespace App\Repositories;

use App\Repositories\BaseRepository;
use \App\Models\Product;

class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return \App\Models\Category::class;
    }
    
    public function getAllCategoryPaginate($maxCol = 10)
    {
        return $this->model->with('parent_cate')->withCount('products')->orderBy('updated_at', 'desc')->paginate($maxCol);
    }

    public function getAllActive()
    {
        return $this->model->where('status', 1)->get();
    }

    public function getCategorytParent($id = null)
    {
        $category = $this->model->where('parent_id', 0);
        if ($id) {
            $category = $category->whereNotIn('id', [$id]);
        }
        return $category->get();
    }

    public function getChildren($idParent)
    {
        return $this->model->where('parent_id', $idParent)->get();
    }

    public function removeCategory($id)
    {
        $this->model->where('parent_id', $id)->update(['parent_id' => 0]);
        Product::where('category_id', $id)->update(['category_id' => 0, 'status' => 0]);
        
        return $this->model->find($id)->delete();
    }
}
