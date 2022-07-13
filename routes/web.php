<?php

use App\Exports\ProductExport;
// use App\Http\Controllers\Api\ProductController as ApiProductController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckinController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
// use App\Http\Controllers\PostController;
// use App\Http\Controllers\ProductController;
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
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ScheduleWorkController;
use App\Http\Controllers\TimesheetController;
use App\Repositories\TimekeepRepository;
use App\Repositories\WorkScheduleRepository;
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
        Route::get('/calendar-holiday', [ScheduleWorkController::class, 'calendarHoliday'])->name('schedule-calendar-holiday');
        Route::get('/calendar-holiday/create', [ScheduleWorkController::class, 'showFormCreateHoliday'])->name('schedule-calendar-holiday-create');
        Route::post('/calendar-holiday/insert', [ScheduleWorkController::class, 'insertHoliday'])->name('schedule-calendar-holiday-insert');
    });

    Route::post('/ajax-add-role-user', [RoleController::class, 'addRole'])->name('ajax-add-role-user');
    Route::post('/ajax-get-role-user', [RoleController::class, 'getRole'])->name('ajax-get-role-user');
    Route::post('/ajax-create-user', [EmployeeController::class, 'addUser'])->name('ajax-create-user');
    Route::post('/ajax-remove-user', [EmployeeController::class, 'ajaxRemove'])->name('ajax-remove-user');
    Route::post('/ajax-block-user', [EmployeeController::class, 'ajaxBlock'])->name('ajax-block-user');
    Route::post('/ajax-un-block-user', [EmployeeController::class, 'ajaxUnBlock'])->name('ajax-un-block-user');
    Route::post('/ajax-user-confirm-email', [EmployeeController::class, 'confirmEmail'])->name('ajax-user-confirm-email');
    Route::post('/ajax-user-change-password', [EmployeeController::class, 'changePasssword'])->name('ajax-user-change-password');
    Route::get('/ajax-filter',[EmployeeController::class,'filter'])->name('ajax-filter-employee');

    Route::prefix('/checkin')->name("checkin.")->group(function () {
        Route::get('/view', [CheckinController::class, 'index'])->name("view");
        Route::post('/add-wifi', [CheckinController::class, 'addwifi'])->name("add-wifi");
        Route::post('/add-location', [CheckinController::class, 'addlocation'])->name("add-location");
        Route::post('/ajax-attendance_setting', [CheckinController::class, 'UpdateAttendanceSetting'])->name("ajax-attendance-setting");
    });

    Route::prefix('/setting')->name("setting.")->group(function () {

        Route::prefix('/banner')->name("banner.")->group(function () {
            Route::get('/info', [BannerController::class, 'info'])->name("info");
            Route::get('/addbanner', [BannerController::class, 'addBannerForm'])->name("addbanner");
            Route::post('/addbanner', [BannerController::class, 'addBanner']);
            Route::get('/updatebanner/{id}', [BannerController::class, 'updateBannerForm'])->name("updatebanner");
            Route::post('/updatebanner/{id}', [BannerController::class, 'updateBanner']);
            Route::get('/delete/{id}', [BannerController::class, 'delete'])->name("delete");
        });

        Route::prefix('/company')->name("company.")->group(function () {
            Route::get('/info', [CompanyController::class, 'info'])->name("info");
            Route::get('/update-company/{id}', [CompanyController::class, 'updateCompanyForm'])->name("updatecompany");
            Route::post('/update-company/{id}', [CompanyController::class, 'updateCompany']);
        });

        Route::prefix('/branch')->name("branch.")->group(function () {
            Route::get('/', [CompanyController::class, 'branchs'])->name("list");
            Route::get('/add-branch', [CompanyController::class, 'addBranchForm'])->name("addbranch");
            Route::post('/add-branch', [CompanyController::class, 'addBranch']);
            Route::get('/update-branch/{id}', [CompanyController::class, 'updateBranchForm'])->name("updatebranch");
            Route::post('/update-branch/{id}', [CompanyController::class, 'updateBranch']);
        });

        Route::prefix('/structure')->name("structure.")->group(function () {
            Route::get('/', [CompanyController::class, 'structure'])->name("show");
            Route::post('/ajax-update-department', [CompanyController::class, 'updateDepartment'])->name("update-department");
            Route::post('/ajax-create-department', [CompanyController::class, 'createDepartment'])->name("create-department");
        });
    });

    Route::get('/timesheet', [TimesheetController::class, 'timesheet'])->name("timesheet");
    Route::patch('/update-fcm-token', [NotificationController::class, 'updateToken'])->name("update-fcm-token");
    Route::get('/exportexcel', [TimesheetController::class, 'exportIntoExcel'])->name("exportIntoExcel");
});

Route::get('login-google', [AuthController::class, 'ggLogin'])->name('login-google');
Route::get('google/callback', [AuthController::class, 'ggAuthCallback'])->name('callback-google');

Route::get('/login-github', [AuthController::class, 'githubLogin'])->name('login-github');
Route::get('/callback/github', [AuthController::class, 'githubCallback'])->name('github-Callback');

Route::get('/test/data', function(Request $request) {
    $timeKeepRepo = app(WorkScheduleRepository::class);
    dd($timeKeepRepo->workDayByEmployeeId('2022-05-05', 1));
});
