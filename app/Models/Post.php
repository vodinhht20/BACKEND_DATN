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
        'category_id',
        'branch_id',
        'employee_id',
    ];

    public function postCategory(){
        return $this->belongsTo(PostCategory::class, 'category_id', 'id');
    }
}
