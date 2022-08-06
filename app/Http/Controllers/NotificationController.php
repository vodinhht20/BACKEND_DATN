<?php

namespace App\Http\Controllers;

use App\Models\Noti;
use App\Repositories\NotifycationRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class NotificationController extends Controller
{
    public function __construct(private NotifycationRepository $notifycationRepo)
    {
        //
    }
    public function updateToken(Request $request){
        try{
            $result = $request->user()->update(['fcm_token'=> $request->token]);
            return response()->json([
                'success' => true,
                'result' => $result,
                'user' => $request->user()
            ]);
        }catch(\Exception $e){
            report($e);
            return response()->json([
                'success'=>false
            ],500);
        }
    }

    public function handleWatched(Request $request)
    {
        $currentAdmin= Auth::user();
        if ($request->id) {
            $options = [
                'employee_id' => $currentAdmin->id,
                'domain' => config('notification.domain.BE'),
                'watched' => 0
            ];
            $result = $this->notifycationRepo->handleWatched($request->id, $options);
            if ($result || $result == 0) {
                return response()->json([
                    'status' => 'success'
                ]);
            }
        }
        $message = "Không thể cập nhật trạng thái cho notify của nhân viên: Employee ID [$currentAdmin->id] - Notify [$request->id]" ;
        Log::error($message);
        Noti::telegramLog('Update Watched Noti', $message);
        return response()->json([
            'status' => 'failed'
        ], 442);
    }
}
