<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SingleType extends Model
{
    use HasFactory;
    protected $table = 'single_types';

    public function approvers()
    {
        return $this->hasMany(Approver::class, 'single_type_id', 'id');
    }
}
