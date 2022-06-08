<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TimekeepDetail extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'timekeep_details';
    protected $fillable = [
        'latitude',
        'longitude',
        'type',
        'ip',
        'checkin_at',
        'timekeep_id',
        'source'
    ];
}
