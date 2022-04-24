<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "categories";
    protected $fillable = [
        'name',
        'slug',
        'image',
        'status',
        'parent_id'
    ];

    public function parent_cate()
    {
        return $this->belongsTo('App\Models\Category', 'parent_id', 'id');
    }

    public function children_cate()
    {
        return $this->hasMany('App\Models\Category', 'parent_id', 'id');
    }

    public function products()
    {
       return $this->hasMany('App\Models\Product', 'category_id', 'id');
    }
}
