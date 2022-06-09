<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BranCompany extends Model
{
    use HasFactory;
    protected $table = 'branches';
    protected $fillable = [
        'name',
        'code_branch',
        'address',
        'hotline',
        'latitude',
        'longtitude',
        'radius'
    ];
}
