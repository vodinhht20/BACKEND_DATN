<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;
    protected $table = 'banners';
    protected $fillable = [
        'name',
        'image',
        'links',
        'from_at',
        'to_at',
        'type',
        'admin_id',
    ];

    public function getBanner()
    {
        if ($this->type == 0) {
            return asset('storage/' . $this->image);
        }
        return $this->image;
    }

    public function status()
    {
        if ($this->from_at > date('Y-m-d')) {
            return '<label class="label label-inverse">Chưa khởi chạy</label>';
        }else if ($this->to_at < date('Y-m-d')) {
            return '<label class="label label-default">Đã kết thúc</label>';
        }else{
            return '<label class="label label-success">Đang chạy</label>';
        }
    }

    public function author()
    {
        return $this->belongsTo(Employee::class, 'admin_id');
    }
}
