<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\TimekeepingController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/', function () {
    return response()->json([
        'messages' => 'Hello API'
    ]);
});

Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout']);
Route::post('auth', [AuthController::class, 'isValidToken']);
Route::get('mac', function () {
    // return substr(exec('getmac'), - 0, 17);
    ob_start();
    system('getmac');
    $Content = ob_get_contents();
    ob_clean();
    return substr($Content, strpos($Content,'\\')-20, 17);
});

Route::middleware('jwt.auth')->group(function () {
    Route::get('users', [UserController::class, 'index']);
    Route::post('checkin', [TimekeepingController::class, 'checkIn']);
});

Route::get('login-google', [AuthController::class, 'googleLogin']);
