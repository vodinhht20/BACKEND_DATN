<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Network extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];
    protected $table = 'networks';

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }
}
