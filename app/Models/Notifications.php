<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notifications extends Model
{
    use HasFactory;

    public function getLink()
    {
        // if ($this->link && trim($this->link) != '') {
        //     if ($this->domain == config('notification.domain.BE')) {
        //         return env('DOMAIN_BACKEND') . "/admin/$this->link";
        //     } else if ($this->domain == config('notification.domain.FE')) {
        //         return env('DOMAIN_FRONTEND') . $this->link;
        //     }
        // }
        // return null;
        return $this->link;
    }
}
