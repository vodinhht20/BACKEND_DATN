<?php

namespace App\Http\Controllers\Api;

use App\Events\HandleCheckIn;
use App\Http\Controllers\Controller;
use App\Repositories\TimekeepRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class TimekeepingController extends Controller
{
    public function __construct(private TimekeepRepository $timekeepRepo)
    {
    }

    public function checkIn(Request $request){
        $validator = Validator::make($request->all(), [
            'latitude' => 'required',
            'longitude' => 'required',
        ], [
            'latitude.required' => 'Vĩ độ không được để trống',
            'longitude.required' => 'Kinh độ không được để trống',
        ]);

        if ($validator->fails()) {
            return response()->json([
                "messages" => $validator->messages()->first(),
                'error_code' => 'field_required'
            ], 404);
        }

        $currentDate = Carbon::now();
        $currentAdminId = Auth::user()->id;
        $options = [
            'ip' => $request->ip(),
            'latitude' => $request->input('latitude', null),
            'longitude' => $request->input('longitude', null),
            'type' => config('timekeep.type.checkin'),
            'date' => $currentDate->format('Y-m-d'),
            'employee_id' => $currentAdminId,
            'checkin_at' => $currentDate,
            'source' => $request->header('User-Agent')
        ];
        DB::beginTransaction();
        try {
            $result = $this->timekeepRepo->checkin($options);
            DB::commit();
        } catch (\Exception $ex) {
            \Log::error($ex->getMessage());
            DB::rollBack();
        }
        $options['status'] = $result ? config('timekeep.status.success') : config('timekeep.status.failed');
        event(new HandleCheckIn($options));
        if ($result) {
            return response()->json([
                'message' => 'checkin thành công',
                'ip' => $request->ip(),
                'error_code' => 80
            ]);
        }
        return response()->json([
            'message' => 'Checkin thất bại vui lòng kết nối Wifi công ty để điểm danh',
            'ip' => $request->ip(),
            'error_code' => 'checkin_access_denied'
        ]);
    }
}
