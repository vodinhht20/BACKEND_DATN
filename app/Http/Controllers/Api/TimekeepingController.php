<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TimekeepingController extends Controller
{
    public function checkIn(Request $request){
        $ipAddress = $request->ip();
        return response()->json([
            'message' => 'checkin thành công',
            'ip' => $ipAddress
        ]);
    }
}
