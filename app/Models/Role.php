<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $table = 'roles';

    public function getUser()
    {
        return $this->belongsToMany('App\Models\User', 'model_has_roles', 'role_id', 'model_id');
    }
}

// public function products() {
//     return $this->belongsToMany(
//         Product::class,
//         'category_product', // bang trung gian
//         'category_id', // khoa ngoai tuong ung voi model hien tai
//         'product_id', // khoa ngoai cua bang con lai
//     );
// }