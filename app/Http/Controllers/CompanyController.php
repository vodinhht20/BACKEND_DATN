<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use DateTimeZone;
class CompanyController extends Controller
{
    public function info(Request $request)
    {
        return view('admin.company.info');
    }
    public function worker(Request $request)
    {
        
        $carbon= Carbon::now();
        $carbon= Carbon::now(new DateTimeZone('Asia/Ho_Chi_Minh'));
        $carbon = Carbon::now()->daysInMonth;
        $month = Carbon::now()->monthName;
        $month = Carbon::now()->format('n ');
        $date = Carbon::now($month)->format('n');                                           
        $day = Carbon::now($date)->dayName;
        $day = Carbon::now($date)->format('n'); ;
        $date = Carbon::now($month)->format('d / m'); 
        $bef_month = Carbon::now()->startOfMonth()->subMonth($month);

        return view('admin.company.worker',compact('month','bef_month','day','date'));
        
                                    

    }
}
?>
