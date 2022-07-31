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

    public function getStatusStr()
    {
        $status = $this->status;
        if ($status == config('request.status.processing') || $status == config('request.status.leader_accepted')) {
            return "Chờ xử lý";
        } else if ($status == config('request.status.accepted')) {
            return "Đơn đã được phê duyệt";
        } else if ($status == config('request.status.unapproved')) {
            return "Đơn bị từ chối";
        }
        return  "N/A";
    }

    public function renderClassNameByStatus()
    {
        $status = $this->status;
        if ($status == config('request.status.accepted')) {
            return "text-success";
        } else if ($status == config('request.status.unapproved')) {
            return "text-danger";
        }
        return  "text-primary";
    }
}
