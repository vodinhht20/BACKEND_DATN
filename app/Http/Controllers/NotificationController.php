<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
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
}
