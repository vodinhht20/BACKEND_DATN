<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\NotifycationRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;

class NotificationController extends Controller
{
    public function __construct(private NotifycationRepository $notifycationRepo)
    {
        //
    }
    public function updateToken(Request $request)
    {
        try {
            $result = Auth::user()->update(['fcm_token'=> $request->token]);
            return response()->json([
                'success' => true,
                'result' => $result,
                'user' => Auth::user()
            ]);
        } catch(\Exception $e){
            report($e);
            return response()->json([
                'success'=>false
            ],500);
        }
    }

    public function notifications()
    {
        try {
            // Lấy ra danh sách thông báo của người đấy
        $notiOptions = [
            "domain" => config('notification.domain.FE'),
            "types" => array(config('notification.type.personal'), config('notification.type.global'))
        ];
        $notificationHeaders = $this->notifycationRepo->getNotifyByEmployee(Auth::user(), $notiOptions)->toArray();
        
            return response()->json([
                'status' => 'success',
                'message' => 'Lấy thông báo thành công',
                'data' => $notificationHeaders,
            ]);
        } catch(\Exception $e){
            return response()->json([
                'status' => 'error',
                'message' => 'Lấy thông báo thất bại',
                ]);
        }
    }

    public function watchedNoti(Request $request){
        try {
            $this->notifycationRepo->update($request->id, ['watched' => 1]);

            return response()->json([
                'status' => 'success',
                'message' => 'Watched success'
            ]);
        } catch(\Exception $e){
            return response()->json([
                'status' => 'error',
                'message' => 'Watched failed',
                'data' => $e
            ]);
        }
    }

    public function watchedNotiAll(Request $request){
        $employee = JWTAuth::toUser($request->access_token);
        $options = [
            'domain' => config('notification.domain.FE'),
            'employee_id' => $employee->id,
            'watched' => 0,
        ];
        try {
            $this->notifycationRepo->handleWatched("viewed_all", $options);

            return response()->json([
                'status' => 'success',
                'message' => 'Watched success'
            ]);
        } catch(\Exception $e){
            return response()->json([
                'status' => 'error',
                'message' => 'Watched failed',
                'data' => $e
            ]);
        }
    }
}
