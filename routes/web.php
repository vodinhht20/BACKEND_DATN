<?php

use App\Exports\ProductExport;
use App\Http\Controllers\Api\ProductController as ApiProductController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\EmployeeController;
use App\Http\Resources\ProductCollection;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\TimesheetController;
use Stevebauman\Location\Facades\Location;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
})->name("home.index");
Route::get('/san-pham/{slug}', [ProductController::class, 'showDetail'])->name("product.showDetail");
Route::get('/tin-tuc', [PostController::class, 'index'])->name("new.index");
Route::get('/login', [AuthController::class, 'showFormLogin'])->name("login");
Route::post('/login', [AuthController::class, 'login'])->name("post-login");
Route::get('/register', [AuthController::class, 'showFromRegister'])->name("show-form-register");
Route::post('register', [AuthController::class, 'register'])->name('register');
Route::get('xac-thuc/{token}/{id}', [AuthController::class, 'verifyTokenEmail'])->name('verify-email-token');
Route::get('account/verify/{id}', [AuthController::class, 'notifyConfirmEmail'])->name('account-verify');
Route::get('/logout', [AuthController::class, 'logout'])->name("logout");

Route::prefix('/admin')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('', [DashboardController::class, 'index'])->name('dashboard');
    Route::prefix('/employee')->group(function () {
        Route::get('/', [EmployeeController::class, 'index'])->name('admin-list-user');
        Route::get('/create', [EmployeeController::class, 'showFormCreate'])->name('show-form-user-create');
        Route::get('/update/{id}', [EmployeeController::class, 'showFormUpdate'])->name('show-form-update-user');
        Route::get('/show/{id}', [EmployeeController::class, 'showInfoUser'])->name('show-info-user');
        Route::post('/update/{id}', [EmployeeController::class, 'updateUser'])->name('post-update-user');
        Route::get('/black-list', [EmployeeController::class, 'blackList'])->name('user-black-list');
    });
    Route::prefix('/role')->group(function () {
        Route::get('/', [RoleController::class, 'index'])->name('admin-role.index');
    });
    Route::prefix('/application')->group(function () {
        Route::get('/', [ApplicationController::class, 'index'])->name('application-view');
        Route::get('/detail', [ApplicationController::class, 'detail'])->name('application-detail');
        Route::get('/nest', [ApplicationController::class, 'nestView'])->name('application-nestView');
        Route::get('/policy', [ApplicationController::class, 'policy'])->name('application-policy');
        Route::get('/procedure', [ApplicationController::class, 'procedure'])->name('application-procedure');
    });
    Route::post('/ajax-add-role-user', [RoleController::class, 'addRole'])->name('ajax-add-role-user');
    Route::post('/ajax-get-role-user', [RoleController::class, 'getRole'])->name('ajax-get-role-user');
    Route::post('/ajax-create-user', [EmployeeController::class, 'addUser'])->name('ajax-create-user');
    Route::post('/ajax-remove-user', [EmployeeController::class, 'ajaxRemove'])->name('ajax-remove-user');
    Route::post('/ajax-block-user', [EmployeeController::class, 'ajaxBlock'])->name('ajax-block-user');
    Route::post('/ajax-un-block-user', [EmployeeController::class, 'ajaxUnBlock'])->name('ajax-un-block-user');
    Route::post('/ajax-user-confirm-email', [EmployeeController::class, 'confirmEmail'])->name('ajax-user-confirm-email');
    Route::post('/ajax-user-change-password', [EmployeeController::class, 'changePasssword'])->name('ajax-user-change-password');
});

Route::get('login-google', [AuthController::class, 'ggLogin'])->name('login-google');
Route::get('google/callback', [AuthController::class, 'ggAuthCallback'])->name('callback-google');

Route::get('/login-github', [AuthController::class, 'githubLogin'])->name('login-github');
Route::get('/callback/github', [AuthController::class, 'githubCallback'])->name('github-Callback');

Route::prefix('/company')->name("company.")->group(function () {
    Route::get('/info', [CompanyController::class, 'info'])->name("info");
    Route::get('/updatecompany/{id}', [CompanyController::class, 'updatecompany'])->name("updatecompany");
    Route::post('/updatecompany/{id}', [CompanyController::class, 'updatecompany1'])->name("updatecompany");
    Route::get('/addbranch', [CompanyController::class, 'addbranch'])->name("addbranch");
    Route::post('/addbranch', [CompanyController::class, 'addbranch1'])->name("addbranch");
    Route::get('/updatebranch/{id}', [CompanyController::class, 'updatebranch'])->name("updatebranch");
    Route::post('/updatebranch/{id}', [CompanyController::class, 'updatebranch1'])->name("updatebranch");
    Route::get('/delete/{id}', [CompanyController::class, 'delete'])->name("delete");
    Route::get('/structure', [CompanyController::class, 'structure'])->name("structure");
    Route::get('/branchs', [CompanyController::class, 'branchs'])->name("branchs");
});
Route::get('/timesheet', [TimesheetController::class, 'timesheet'])->name("timesheet");
Route::get('/test', function (Request $request) {
    $ip = $request->ip();
    dump($ip);
    $position = Location::get($ip);
    dd($position);
});
