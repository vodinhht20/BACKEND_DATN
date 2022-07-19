<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    use HasFactory;
    protected $table = 'requests';
    protected $fillable = [
        'employee_id',
        'request_detail_id',
        'status',
        'single_type_id'
    ];
}
