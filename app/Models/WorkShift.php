<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkShift extends Model
{
    use HasFactory;
    protected $fillable = [
        'work_schedule_id',
        'name',
        'work_from',
        'work_to',
    ];
}
