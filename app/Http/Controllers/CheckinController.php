<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Network;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Validator;

class CheckinController extends Controller
{
    public function index(Request $request) {
        $searchValue = $request->search_value;
        $searchValue2 = $request->search_value_2;
        $searchValue3 = $request->search_value_3;
        $wifi = Network::query();
        if ($searchValue) {
            $wifi = $wifi->where('name', 'like',"%$searchValue%");
        }

        if ($searchValue2 == -1 || $searchValue2 == 1) {
            if ($searchValue2 == -1) {
                $wifi = $wifi->where('status', 0);
            } else {
                $wifi = $wifi->where('status', $searchValue2);
            }
        }
        $wifi = $wifi->paginate(10)->appends($request->all());
        $branch = Branch::all();
        $count_branch = count($branch);
        $current_ip = request()->ip();
        $attendanceSetting = Redis::get('attendance_setting') ?: '[]';
        return view('admin.checkin.view', compact('branch', 'wifi', 'current_ip', 'count_branch', 'attendanceSetting'));
    }

    public function UpdateAttendanceSetting(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'data' => 'required|array|min:1',
        ], [
            'data.required' => 'Vui lòng lựa chọn hình thức chấm công',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error_code' => 'validate_failed',
                'messages' => array($validator->messages()->first())
            ], 442);
        }
        Redis::set('attendance_setting', json_encode($request->data));
        return response()->json([
            'message' => "Đã cập nhật hình thức chấm công !"
        ], 200);
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
