<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkSchedule extends Model
{
    use HasFactory;

    protected $casts = [
        'days' => 'array',
    ];

    public function workShift()
    {
        return $this->hasMany(WorkShift::class, 'work_schedule_id', 'id');
    }
}
