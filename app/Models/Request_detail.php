<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request_detail extends Model
{
    use HasFactory;
    protected $table = 'request_detail';
    protected $fillable = [
        'content',
        'quit_work_from_at',
        'quit_work_to_at',
        'request_id'
    ];
}
