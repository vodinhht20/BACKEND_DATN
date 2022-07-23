<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribuite_Employee extends Model
{
    use HasFactory;
    protected $table = 'attribute_employees';
    protected $fillable = [
        'employee_id',
        'attribute_id',
        'data',
        'raw_data'
    ];

    public function attribute()
    {
        return $this->belongsTo(Attribute::class);
    }
}
