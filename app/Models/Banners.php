<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banners extends Model
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
}
