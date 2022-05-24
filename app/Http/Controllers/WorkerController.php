<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use DateTimeZone;

class WorkerController extends Controller
{
    public function worker(Request $request)
    {
        
        $carbon= Carbon::now();
        $carbon= Carbon::now(new DateTimeZone('Asia/Ho_Chi_Minh'));
        $carbon = Carbon::now()->daysInMonth;
        return view('admin.worker.info',compact('carbon'));
    }
}
