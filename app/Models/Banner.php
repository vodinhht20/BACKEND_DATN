<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;
    protected $table = 'banners';
    protected $fillable = [
        'name',
        'image',
        'links',
        'from_at',
        'to_at',
        'type',
        'admin_id',
    ];

    public function getBanner()
    {
        if ($this->type == 1) {
            return asset('storage/' . $this->image);
        }
        return $this->image;
    }

    // public function Employee()
    // {
    //     return $this->belongsTo(Employee::class, 'admin_id', 'id');
    // }
}
