<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table = 'posts';
    protected $fillable = [
        'title',
        'content',
        'images',
        'category_id',
        'branch_id',
        'employee_id',
        'slug'
    ];

    public function postCategory(){
        return $this->belongsTo(PostCategory::class, 'category_id', 'id');
    }

    public function getPost()
    {
        if ($this->images != '') {
            return asset('/storage/' . $this->images);
        }
        return $this->images;
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function category()
    {
        return $this->belongsTo(PostCategory::class, 'category_id', 'id');
    }
}
