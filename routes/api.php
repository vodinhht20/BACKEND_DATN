<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\HomeController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\TimekeepingController;
use App\Http\Controllers\Api\TimesheetController;
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

Route::middleware('jwt.auth')->group(function () {
    //user
    Route::get('users', [UserController::class, 'index']);
    Route::get('banner', [HomeController::class, 'banner']);
    Route::get('profile', [UserController::class, 'profile']);
    Route::post('change-password', [UserController::class, 'changePasssword']);
    Route::post('update-avatar', [UserController::class, 'updateAvatar']);
    Route::post('update-profile', [UserController::class, 'updateProfile']);
    Route::post('kyc', [UserController::class, 'kyc']);
    Route::get('kyc-check', [UserController::class, 'checkDocument']);
    //user

    Route::prefix('checkin')->group(function () {
        Route::post('', [TimekeepingController::class, 'checkIn'])->middleware('checkip');
        Route::get('data-checkin', [TimekeepingController::class, 'getCurrentDataCheckin']);
    });

    Route::prefix('timesheet')->group(function () {
        Route::get('', [TimesheetController::class, 'index']);
    });

    Route::get('spinning-game', function () {
        return response()->json([
            "spin" => 'Áo thun'
    ], 200);
    });
});

Route::post('login-google', [AuthController::class, 'googleLogin']);
