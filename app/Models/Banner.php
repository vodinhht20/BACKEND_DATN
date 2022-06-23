<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    public function getBanner()
    {
        if ($this->type == 1) {
            return asset('storage/' . $this->image);
        }
        return $this->image;
    }
}
