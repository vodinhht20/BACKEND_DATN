<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RequestApproveHistories extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'request_approve_histories';

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

}
