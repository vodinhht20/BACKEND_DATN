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
                                   

        return view('admin.company.worker',compact('carbon'));
    }
}
?>
