<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function updateToken(Request $request){
        try{
            $result = Auth::user()->update(['fcm_token'=> $request->token]);
            return response()->json([
                'success' => true,
                'result' => $result,
                'user' => Auth::user()
            ]);
        }catch(\Exception $e){
            report($e);
            return response()->json([
                'success'=>false
            ],500);
        }
    }
}
