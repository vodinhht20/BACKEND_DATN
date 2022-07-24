<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RequestDetail extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'request_detail';

    protected $casts = [
        'quit_work_from_at' => 'datetime:H:i d-m-Y',
        'quit_work_to_at' => 'datetime:H:i d-m-Y',
    ];

    protected $fillable = [
        'content',
        'quit_work_from_at',
        'quit_work_to_at',
        'request_id'
    ];
}
