<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TimekeepingController extends Controller
{
    public function checkIn(Request $request){

        $ipAndMac = ['ip' => '14.232.245.144', 'mac' => '00-FF-A1-90-36-28'];

        ob_start();
        system('getmac');
        $Content = ob_get_contents();
        ob_clean();
        $mac = substr($Content, strpos($Content,'\\')-20, 17);

        if ($request->ip() == $ipAndMac['ip'] && $ipAndMac['mac'] == $mac) {
            return response()->json([
                'message' => 'checkin thành công',
                'ip' => $request->ip(),
                'error_code' => 80,
                'mac' => $mac,
            ]);
        }

        return response()->json([
            'message' => 'checkin thất bại vui lòng kết nối Wifi công ty để điểm danh',
            'ip' => $request->ip(),
            'error_code' => 73,
            'mac' => $mac,
        ]);
        
    }
}
