<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\DashboardController;
use App\Http\Controllers\Api\HomeController;
use App\Http\Controllers\Api\NotificationController;
use App\Http\Controllers\Api\SingleWordController;
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
    //employees
    Route::get('users', [UserController::class, 'index']);
    Route::get('profile', [UserController::class, 'profile']);
    Route::post('change-password', [UserController::class, 'changePasssword']);
    Route::post('update-avatar', [UserController::class, 'updateAvatar']);
    Route::post('update-profile', [UserController::class, 'updateProfile']);
    Route::post('kyc', [UserController::class, 'kyc']);
    Route::get('kyc-check', [UserController::class, 'checkDocument']);
    //employees

    //singleType
    Route::get('list-single-type', [SingleWordController::class, 'getListSingleType']);
    Route::get('list-single-type/{id}', [SingleWordController::class, 'getListSingleTypeId']);
    Route::get('list-approver/{id}', [SingleWordController::class, 'GetApprover']);

    Route::post('requests', [SingleWordController::class, 'requestsAdd']);
    Route::post('requests-image', [SingleWordController::class, 'requestsAddImage']);
    Route::post('get-time-keep', [SingleWordController::class, 'getTimekeep']);

    Route::get('count-of-orders-per-month', [SingleWordController::class, 'countOrdersPerMonth']);

    Route::post('single-word-personal-list', [SingleWordController::class, 'singleWordPesonalList']);
    //singleType

    //setting
    Route::get('banner', [HomeController::class, 'banner']);
    Route::get('timekeep-ranking', [HomeController::class, 'ranking']);
    //setting

    Route::prefix('checkin')->group(function () {
        Route::post('', [TimekeepingController::class, 'checkIn']);
        Route::get('data-checkin', [TimekeepingController::class, 'getCurrentDataCheckin']);
    });

    Route::prefix('timesheet')->group(function () {
        Route::get('', [TimesheetController::class, 'index']);
    });

    Route::patch('update-fcm-token', [NotificationController::class, 'updateToken']);

    Route::get('spinning-game', function () {
        return response()->json([
            "spin" => 'Áo thun'
        ], 200);
    });

    //Notification FE
    Route::get('notification', [NotificationController::class, 'notifications']);
    Route::post('notification-watch', [NotificationController::class, 'watchedNoti']);
    Route::post('notification-watch-all', [NotificationController::class, 'watchedNotiAll']);

    Route::get('dashboard', [DashboardController::class, 'index']);
});


Route::post('login-google', [AuthController::class, 'googleLogin']);
