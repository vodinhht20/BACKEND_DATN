<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Timekeep extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'timekeeps';
    protected $fillable = [
        'employee_id',
        'date'
    ];
}
