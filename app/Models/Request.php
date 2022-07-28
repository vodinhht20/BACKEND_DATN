<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Request extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'requests';
    protected $fillable = [
        'employee_id',
        'request_detail_id',
        'status',
        'single_type_id'
    ];

    protected $casts = [
        'created_at' => 'datetime:H:i d-m-Y',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id', 'id');
    }

    public function requestDetail()
    {
        return $this->belongsTo(RequestDetail::class);
    }

    public function singleType()
    {
        return $this->belongsTo(SingleType::class);
    }

    public function requestApproveHistories()
    {
        return $this->hasMany(RequestApproveHistories::class, 'request_id', 'id');
    }
}
