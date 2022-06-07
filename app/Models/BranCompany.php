<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BranCompany extends Model
{
    use HasFactory;
    protected $table = 'bran_company';
    protected $fillable = [
        'name_bran',
        'code_bran',
        'address',
        'hotline'
    ];
}
