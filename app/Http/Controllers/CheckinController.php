<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Network;
use Illuminate\Http\Request;

class CheckinController extends Controller
{
    public function index(Request $request) {
        $searchValue = $request->search_value;
        $searchValue2 = $request->search_value_2;
        $searchValue3 = $request->search_value_3;
        $branchs = Branch::where('name', 'like', "%$searchValue3%")->paginate(3);
        $wifi = Network::where('name', 'like', "%$searchValue%")->where('status', 'like', "%$searchValue2%")->paginate(10);
        $wifi->appends($request->except('_token'));
        $branchs->appends($request->except('_token'));
        $branch = Branch::all();
        $count_branch = count($branch);
        $current_ip = request()->ip();
        return view('admin.checkin.view',compact('branch' , 'wifi','current_ip','count_branch','branchs'));
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
