<?php
namespace App\Repositories;

use App\Repositories\BaseRepository;
use Carbon\Carbon;

class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return \App\Models\Product::class;
    }

    public function getAllProductPaginate($maxCol = 15, $options = [])
    {
        $query =  $this->model;
        if (count($options) > 0) {
            if (isset($options['keywords']) && $options['keywords'] != '') {
                $query = $query->where(function ($q) use($options){
                   return $q->where('name', 'like', '%' . $options['keywords'] . '%')
                            ->orWhere('id', 'like', '%' . $options['keywords'] . '%')
                            ->orWhere('slug', 'like', '%' . $options['keywords'] . '%')
                            ->orWhere('description', 'like', '%' . $options['keywords'] . '%');
                });
            }
            if (isset($options['cate']) && $options['cate'] != '') {
                $query = $query->where('category_id', $options['cate']);
            }
            if (isset($options['status']) && $options['status'] != '') {
                $query = $query->where('status', $options['status']);
            }
        }
        return $query->orderBy('created_at', 'desc')->paginate($maxCol);
    }

    public function getAllTrash($take = 15)
    {
        return $this->model->onlyTrashed()->paginate($take);
    }

    public function restore($id)
    {
        $result = $this->model->withTrashed()->find($id);
        if ($result) {
            $result->restore();
            return true;
        }
        return false;
    }

    public function restoreAll()
    {
        return $this->model->onlyTrashed()->restore();
    }

    public function deleteAll()
    {
        return $this->model->onlyTrashed()->forceDelete();
    }

    public function deleteTrash($id)
    {
        return $this->model->withTrashed()->where('id', $id)->forceDelete();
    }

    public function getProductByCateId($id)
    {
        return $this->model->where('category_id', $id)->get();
    }

    public function getSaleWeekProducts()
    {
        $startWeek = Carbon::now()->startOfWeek();  // ngày bắt đầu của tuần này
        $endWeek = Carbon::now()->endOfWeek(); // ngày kết thúc của tuần này
        $products = $this->model->inRandomOrder()->where([['discount', '>', 0], ['start_discount', '<=' , now()], ['end_discount', '>=' , now()]]); // lấy ra các sản phẩm đủ điều kiện giảm giá
        $products = $products->where([['start_discount', '>=', $startWeek], ['start_discount', '<=', $endWeek]])->get();  // lấy ra các sản phẩm mới nhất trong tuần này
        return $products;
    }

    public function getProductBySlug($slug)
    {
        return $this->model->where('slug', $slug)->first();
    }

    public function getProductActive()
    {
        return $this->model->where('status', 1)->get();
    }

    public function getTrash()
    {
        return $this->model->onlyTrashed()->get();
    }
}
