<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Branch extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];
    protected $table = 'branches';

    public function network()
    {
        return $this->hasMany(Network::class);
    }

    public function employee()
    {
        return $this->hasMany(Employee::class, 'branch_id', 'id');
    }
}
