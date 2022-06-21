<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;

    public function Employee()
    {
        return $this->belongsToMany(Employee::class, 'employee_positions', 'position_id', 'employee_id');
    }
}
