<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Timekeep extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'timekeeps';
    protected $fillable = [
        'employee_id',
        'date'
    ];
    public static function getTimekeep(){
        $records = DB::table('timekeeps')->select('date','id','employee_id','worktime','minute_late','minute_early','overtime_hour')->get()->toArray();
        return $records;
    }
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id', 'id');
    }

    public function timekeepdetail()
    {
        return $this->hasMany(TimekeepDetail::class);
    }
}
