<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConfixCompany extends Model
{
    use HasFactory;
    protected $table = 'companies';
    protected $fillable = [
        'name_company',
        'hotline',
        'email',
        'tax_code',
        'desc',
        'website',
        'fanpage',
        'head_quater',
    ];
}
