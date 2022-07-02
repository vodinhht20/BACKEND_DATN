<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Network;
use Illuminate\Http\Request;

class CheckinController extends Controller
{
    public function index() {
        $branch=Branch::all();
        $count_branch=count($branch);
        $wifi=Network::paginate(10); 
        $current_ip = request()->ip();
        return view('admin.checkin.view',compact('branch' , 'wifi','current_ip','count_branch'));
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
    public function addlocation(Request $request ){
     
        $location= new Branch;
        $location->name=$request->location_name;
        $location->code_branch=$request->code_branch;
        $location->address=$request->address;
        $location->hotline=$request->hotline;
        $location->longtitude=$request->longtitude;
        $location->latitude=$request->latitude;
        $location->radius=$request->radius;
        $location->save();
        return back();
    }
}
