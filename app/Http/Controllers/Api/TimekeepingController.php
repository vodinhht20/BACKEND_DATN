<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TimekeepingController extends Controller
{
    public function checkIn(Request $request){
        $ipCompany = '14.232.245.144';
        if ($request->ip() == $ipCompany) {
            return response()->json([
                'message' => 'checkin thành công',
                'ip' => $request->ip(),
                'error_code' => 80
            ]);
        }

        return response()->json([
            'message' => 'checkin thất bại vui lòng kết nối Wifi công ty để điểm danh',
            'ip' => $request->ip(),
            'error_code' => 73
        ]);
    }
}
