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
        return $this->belongsToMany('App\Models\Employee', 'model_has_roles', 'role_id', 'model_id');
    }
}