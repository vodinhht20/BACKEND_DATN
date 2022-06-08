<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TimekeepLog extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'timekeep_logs';
    protected $fillable = [
        'latitude',
        'longitude',
        'status',
        'ip',
        'checkin_at',
        'timekeep_id',
        'source'
    ];
}