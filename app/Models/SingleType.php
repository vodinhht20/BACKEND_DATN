<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SingleType extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'single_types';

    protected $fillable = [
        'name',
        'description',
        'regulation',
        'required_leader',
        'type',
        'status',
    ];

    public function approvers()
    {
        return $this->hasMany(Approver::class, 'single_type_id', 'id');
    }
}
