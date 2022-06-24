<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Network;
use Illuminate\Http\Request;

class CheckinController extends Controller
{
    public function index() {
        $branch=Branch::all();
        $wifi=Network::all();
        return view('admin.checkin.view',compact('branch' , 'wifi'));
    }
    public function addwifi(Request $request ){
     
        $wifi= new Network;
        $wifi->name=$request->name;
        $wifi->wifi_ip=$request->ip;
        $wifi->branch_id=$request->branch;
        $wifi->status=$request->status;
        $wifi->save();
        return back();
    }
}
