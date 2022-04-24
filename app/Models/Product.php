<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "products";
    protected $with = ['category'];
    protected $fillable = [
        'name',
        'slug',
        'image',
        'price',
        'discount',
        'status',
        'category_id',
        'description',
        'start_discount',
        'end_discount'
    ];

    public function category() {
        return $this->belongsTo('App\Models\Category', 'category_id', 'id');
    }

    public function formatDate()
    {
        return Carbon::parse($this->deleted_at)->isoFormat('DD/MM/YYYY');
    }

    public function priceMinusDiscount()
    {
        if ($this->checkDiscount()) {
            return $this->price - (($this->price * $this->discount) / 100);
        }
        return $this->price;
    }

    public function checkDiscount() {
        $result = Product::where('id', $this->id)
                            ->where('start_discount', '<=', now())
                            ->where('end_discount' , '>=', now())
                            ->where('discount', '>', 0)
                            ->first();
        if ($result) {
            return true;
        }
        return false;
    }

    public function getDayDiscount()
    {
        $now = Carbon::now();
        if ($this->checkDiscount()) {
            return 'còn '. $now->copy()->diffInDays($this->end_discount) . ' ngày khuyến mãi';
        }
        $product = Product::where('id', $this->id)
            ->where('start_discount', '>', now())
            ->where('end_discount' , '>', now())
            ->where('discount', '>', 0)
            ->first();
        if ($product) {
            $diffInDays = $now->copy()->diffInDays($this->start_discount);
            if ($diffInDays == 0) {
                $diffInHours = $now->copy()->diffInHours($this->start_discount);
                return 'sắp diễn ra (sau ' . $diffInHours . ' giờ nữa)';
            }
            return 'sắp diễn ra (sau ' . $diffInDays . ' ngày nữa)';
        }
        return false;
        
    }
}
