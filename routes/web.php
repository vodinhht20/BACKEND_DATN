<?php

use App\Exports\ProductExport;
use App\Http\Controllers\Api\ProductController as ApiProductController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckinController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\EmployeeController;
use App\Http\Resources\ProductCollection;
use App\Http\Controllers\BannerController;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ScheduleWorkController;
use App\Http\Controllers\TimesheetController;
use Illuminate\Support\Facades\Storage;
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
Route::get('php-info', function() { return phpinfo(); })->middleware('auth');
Route::get('', function (){ return view('index'); })->name("home.index");
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
    Route::prefix('/schedule')->group(function () {
        Route::get('/calender', [ScheduleWorkController::class, 'calendar'])->name('schedule-calender-index');
        Route::post('/ajax-add-work-shift', [ScheduleWorkController::class, 'ajaxAddWorkShift'])->name('schedule-ajax-add-work-shift');
    });
    Route::post('/ajax-add-role-user', [RoleController::class, 'addRole'])->name('ajax-add-role-user');
    Route::post('/ajax-get-role-user', [RoleController::class, 'getRole'])->name('ajax-get-role-user');
    Route::post('/ajax-create-user', [EmployeeController::class, 'addUser'])->name('ajax-create-user');
    Route::post('/ajax-remove-user', [EmployeeController::class, 'ajaxRemove'])->name('ajax-remove-user');
    Route::post('/ajax-block-user', [EmployeeController::class, 'ajaxBlock'])->name('ajax-block-user');
    Route::post('/ajax-un-block-user', [EmployeeController::class, 'ajaxUnBlock'])->name('ajax-un-block-user');
    Route::post('/ajax-user-confirm-email', [EmployeeController::class, 'confirmEmail'])->name('ajax-user-confirm-email');
    Route::post('/ajax-user-change-password', [EmployeeController::class, 'changePasssword'])->name('ajax-user-change-password');

    Route::prefix('/company')->name("company.")->group(function () {
        Route::get('/info', [CompanyController::class, 'info'])->name("info");
        Route::get('/updatecompany/{id}', [CompanyController::class, 'updateCompanyForm'])->name("updatecompany");
        Route::post('/updatecompany/{id}', [CompanyController::class, 'updateCompany'])->name("updatecompany");
        Route::get('/addbranch', [CompanyController::class, 'addBranchForm'])->name("addbranch");
        Route::post('/addbranch', [CompanyController::class, 'addBranch'])->name("addbranch");
        Route::get('/updatebranch/{id}', [CompanyController::class, 'updateBranchForm'])->name("updatebranch");
        Route::post('/updatebranch/{id}', [CompanyController::class, 'updateBranch'])->name("updatebranch");
        Route::get('/delete/{id}', [CompanyController::class, 'delete'])->name("delete");
        Route::get('/structure', [CompanyController::class, 'structure'])->name("structure");
        Route::get('/branchs', [CompanyController::class, 'branchs'])->name("branchs");
    });
    Route::prefix('/checkin')->name("checkin.")->group(function () {
        Route::get('/view', [CheckinController::class, 'index'])->name("view");
        Route::post('/add-wifi', [CheckinController::class, 'addwifi'])->name("add-wifi");
        Route::post('/add-location', [CheckinController::class, 'addlocation'])->name("add-location");
    });

    Route::prefix('/banner')->name("banner.")->group(function () {
        Route::get('/info', [BannerController::class, 'info'])->name("info");
        Route::get('/addbanner', [BannerController::class, 'addBannerForm'])->name("addbanner");
        Route::post('/addbanner', [BannerController::class, 'addBanner']);
        Route::get('/updatebanner/{id}', [BannerController::class, 'updateBannerForm'])->name("updatebanner");
        Route::post('/updatebanner/{id}', [BannerController::class, 'updateBanner']);
        Route::get('/delete/{id}', [BannerController::class, 'delete'])->name("delete");
    });

    Route::get('/timesheet', [TimesheetController::class, 'timesheet'])->name("timesheet");
});

Route::get('login-google', [AuthController::class, 'ggLogin'])->name('login-google');
Route::get('google/callback', [AuthController::class, 'ggAuthCallback'])->name('callback-google');

Route::get('/login-github', [AuthController::class, 'githubLogin'])->name('login-github');
Route::get('/callback/github', [AuthController::class, 'githubCallback'])->name('github-Callback');

Route::get('/test', function(Request $request) {
    return view('test');
});
Route::post('/test', function(Request $request) {
    $fileRequest = $request->file('file');
    $getNameFile = date('Y-m-d H:i').$fileRequest->getClientOriginalName();
    $getContent = $fileRequest->get();
    Storage::disk('google')->put($getNameFile, $getContent);

    // lấy ra đường dẫn
    dd(Storage::disk('google'));
});


Route::get('list', function() {
    $dir = '/';
    $recursive = false; // Có lấy file trong các thư mục con không?
    $contents = collect(Storage::disk('google')->listContents($dir, $recursive));
    return $contents->where('type', '=', 'file');
});

Route::get('get', function() {
    $filename = '1W5GndP2oU2fLVJv424uh3s92MpVzr0xV';
    $dir = '/';
    $recursive = false; // Có lấy file trong các thư mục con không?
    $contents = collect(Storage::disk('google')->listContents($dir, $recursive));
    $file = $contents
        ->where('type', '=', 'file')
        ->where(function($val) use ($filename){
            return $val['extraMetadata']['id'] == $filename;
        })
        ->first(); // có thể bị trùng tên file với nhau!
    $rawData = Storage::disk('google')->get($file['path']);
    $name = $file['path'];
    return response($rawData, 200)
        ->header('Content-Type', $file['mime_type'])
        ->header('Content-Disposition', "attachment; filename=$name");
});

Route::get('delete', function() {
    $filename = '1TJYM3ap3SS2DkMmB7b9rzokxw8K9geeu';
    $dir = '/';
    $recursive = false; // Có lấy file trong các thư mục con không?
    $contents = collect(Storage::disk('google')->listContents($dir, $recursive));
    $file = $contents
        ->where('type', '=', 'file')
        ->where(function($val) use ($filename){
            return $val['extraMetadata']['id'] == $filename;
        })
        ->first(); // có thể bị trùng tên file với nhau!
    Storage::disk('google')->restore($file['path']);
    return 'File was deleted from Google Drive';
});
