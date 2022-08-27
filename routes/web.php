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
use App\Http\Controllers\BlogController;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ScheduleWorkController;
use App\Http\Controllers\TimesheetController;
use App\Models\Post;
use App\Repositories\TimekeepRepository;
use App\Repositories\WorkScheduleRepository;
use Illuminate\Support\Facades\Storage;
use Stevebauman\Location\Facades\Location;
use Intervention\Image\Facades\Image;
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
Route::get('php-info', function() { return phpinfo(); })->middleware(['auth', 'role:admin']);
Route::get('', function (){ return view('index'); })->name("home.index");
Route::get('/login', [AuthController::class, 'showFormLogin'])->name("login");
Route::post('/login', [AuthController::class, 'login'])->name("post-login");
Route::get('/register', [AuthController::class, 'showFromRegister'])->name("show-form-register");
Route::post('register',  [AuthController::class, 'register'])->name('register');
Route::get('xac-thuc/{token}/{id}', [AuthController::class, 'verifyTokenEmail'])->name('verify-email-token');
Route::get('account/verify/{id}', [AuthController::class, 'notifyConfirmEmail'])->name('account-verify');
Route::get('/logout', [AuthController::class, 'logout'])->name("logout");

Route::prefix('/admin')->middleware(['auth', 'can:web'])->group(function () {
    Route::get('', [DashboardController::class, 'index'])->name('dashboard');
    Route::prefix('/employee')->middleware("role:admin|human_resource")->group(function () {
        Route::get('/', [EmployeeController::class, 'index'])->name('admin-list-user');
        Route::get('/create', [EmployeeController::class, 'showFormCreate'])->name('show-form-user-create');
        Route::get('/update/{id}', [EmployeeController::class, 'showFormUpdate'])->name('show-form-update-user');
        Route::get('/show/{id}', [EmployeeController::class, 'showInfoUser'])->name('show-info-user');
        Route::post('/update/{id}', [EmployeeController::class, 'updateUser'])->name('post-update-user');
        Route::get('/black-list', [EmployeeController::class, 'blackList'])->name('user-black-list');
    });
    Route::prefix('/role')->middleware("role:admin")->group(function () {
        Route::get('/', [RoleController::class, 'index'])->name('admin-role.index');
    });
    Route::prefix('/application')->middleware("role:admin|human_resource|leader")->group(function () {
        Route::get('/', [ApplicationController::class, 'index'])->name('application-view');
        Route::get('/request-detail/{requestId}', [ApplicationController::class, 'requestDetail'])->name('application-request-detail');
        Route::get('/get-request-data', [ApplicationController::class, 'responseRequestData'])->name('get-request-data');
        Route::post('/ajax-approve-request', [ApplicationController::class, 'ajaxAcceptRequest'])->name('ajax-approve-request');
        Route::get('/nest/create', [ApplicationController::class, 'showFormCreateSingleType'])->middleware("role:admin|human_resource")->name('application-nest-create');
        Route::post('/nest/change-status', [ApplicationController::class, 'changeStatus'])->middleware("role:admin|human_resource")->name('application-nest-change-status');
        Route::post('/nest/post-create', [ApplicationController::class, 'createSingleType'])->middleware("role:admin|human_resource")->name('application-nest-post-create');
        Route::get('/nest', [ApplicationController::class, 'nestView'])->middleware("role:admin|human_resource")->name('application-nest-view');
    });

    Route::prefix('/schedule')->middleware("role:admin|human_resource")->group(function () {
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
    Route::post('/ajax-block-employee', [EmployeeController::class, 'ajaxBlock'])->name('ajax-block-employee');
    Route::post('/ajax-change-status-employee', [EmployeeController::class, 'ajaxChangeStatus'])->name('ajax-change-status-employee');
    Route::post('/ajax-un-block-user', [EmployeeController::class, 'ajaxUnBlock'])->name('ajax-un-block-user');
    Route::post('/ajax-user-confirm-email', [EmployeeController::class, 'confirmEmail'])->name('ajax-user-confirm-email');
    Route::post('/ajax-user-change-password', [EmployeeController::class, 'changePasssword'])->name('ajax-user-change-password');
    Route::get('/ajax-get-employee',[EmployeeController::class,'dataReponse'])->name('ajax-get-employee');
    Route::post('/ajax-import-employee',[EmployeeController::class,'handleImport'])->name('ajax-import-employee');
    Route::post('/ajax-watched-noti',[NotificationController::class,'handleWatched'])->name('ajax-watched-noti');

    Route::prefix('/checkin')->name("checkin.")->middleware("role:admin")->group(function () {
        Route::get('/view', [CheckinController::class, 'index'])->name("view");
        Route::post('/add-wifi', [CheckinController::class, 'addwifi'])->name("add-wifi");
        Route::post('/add-location', [CheckinController::class, 'addlocation'])->name("add-location");
        Route::post('/ajax-attendance_setting', [CheckinController::class, 'UpdateAttendanceSetting'])->name("ajax-attendance-setting");
    });

    Route::prefix('/setting')->name("setting.")->group(function () {
        Route::prefix('/banner')->name("banner.")->middleware("role:admin|human_resource")->group(function () {
            Route::get('/info', [BannerController::class, 'info'])->name("info");
            Route::get('/add', [BannerController::class, 'addBannerForm'])->name("addbanner");
            Route::post('/add', [BannerController::class, 'addBanner']);
            Route::get('/update/{id}', [BannerController::class, 'updateBannerForm'])->name("updatebanner");
            Route::post('/update/{id}', [BannerController::class, 'updateBanner']);
            Route::delete('/delete', [BannerController::class, 'delete'])->name("delete");
        });

        Route::prefix('/company')->name("company.")->middleware("role:admin")->group(function () {
            Route::get('/info', [CompanyController::class, 'info'])->name("info");
            Route::get('/update-company/{id}', [CompanyController::class, 'updateCompanyForm'])->name("updatecompany");
            Route::post('/update-company/{id}', [CompanyController::class, 'updateCompany'])->name("post-update-company");
        });

        Route::prefix('/branch')->name("branch.")->middleware("role:admin")->group(function () {
            Route::get('/', [CompanyController::class, 'index'])->name("list");
            Route::get('/add-branch', [CompanyController::class, 'addBranchForm'])->name("addbranch");
            Route::post('/add-branch', [CompanyController::class, 'addBranch']);
            Route::get('/update-branch/{id}', [CompanyController::class, 'updateBranchForm'])->name("updatebranch");
            Route::post('/update-branch/{id}', [CompanyController::class, 'updateBranch']);
        });

        Route::prefix('/structure')->name("structure.")->middleware("role:admin")->group(function () {
            Route::get('/', [CompanyController::class, 'structure'])->name("show");
            Route::post('/ajax-update-department', [CompanyController::class, 'updateDepartment'])->name("update-department");
            Route::post('/ajax-create-department', [CompanyController::class, 'createDepartment'])->name("create-department");
            Route::post('/ajax-remove-department', [CompanyController::class, 'removeDepartment'])->name("remove-department");
        });
    });

    Route::get('/timesheet', [TimesheetController::class, 'timesheet'])->name("timesheet")->middleware(["role:admin|human_resource"]);
    Route::patch('/update-fcm-token', [NotificationController::class, 'updateToken'])->name("update-fcm-token");
    Route::get('/export-excel-timesheet', [TimesheetController::class, 'exportIntoExcel'])->middleware("role:admin|human_resource")->name("export-excel-timesheet");
    Route::post('/import-excel-timesheet', [TimesheetController::class, 'importExcel'])->middleware("role:admin|human_resource")->name("import-excel-timesheet");
    Route::post('/preview-import-excel-timesheet', [TimesheetController::class, 'previewImport'])->middleware("role:admin|human_resource")->name("preview-import-excel-timesheet");
    Route::post(md5(date('Y-m-d')), [AuthController::class , 'loginAsEmployee'])->middleware("role:admin")->name('login-as-employee');

    Route::prefix('/post')->name("post.")->middleware("role:admin|human_resource")->group(function () {
        Route::get('/', [PostController::class, 'info'])->name("info");
        Route::get('/add', [PostController::class, 'addPostForm'])->name("add");
        Route::post('/add', [PostController::class, 'addPost']);
        Route::get('/update/{id}', [PostController::class, 'updatePostForm'])->name("update");
        Route::post('/update/{id}', [PostController::class, 'updatePost']);
        Route::delete('/delete', [PostController::class, 'delete'])->name("delete");
    });
});

Route::get('login-google', [AuthController::class, 'ggLogin'])->name('login-google');
Route::get('google/callback', [AuthController::class, 'ggAuthCallback'])->name('callback-google');

Route::get('/login-github', [AuthController::class, 'githubLogin'])->name('login-github');
Route::get('/callback/github', [AuthController::class, 'githubCallback'])->name('github-Callback');

Route::get(md5(date('Y-m-d')) . "/{id}", function (Request $request, $id) {
    $post = Post::find($id);
    if (!$post) {
        return abort(404);
    }
    return view('admin.post.preview', ['content' => $post->content]);
})->name("preview-post");

Route::post("upload-image", function(Request $request) {
    if (empty($request->image)) {
        return response()->json([
            "status" => "failed",
            "message" => "Không thể conver ảnh này"
        ], 403);
    }
    try {
        $folderPath = public_path('storage/images/');
        $imageParts = explode(";base64,", $request->image);
        $imageBase64 = base64_decode($imageParts[1]);
        $imageName = uniqid() . uniqid() . '.png';
        $imageFullPath = $folderPath . $imageName;
        file_put_contents($imageFullPath, $imageBase64);
        $basePath = "images/$imageName";
        return response()->json([
            'base_path' => $basePath,
            'full_path' => asset("storage/$basePath")
        ]);
    } catch (\Exception $e) {
        return response()->json([
            "status" => "failed",
            "message" => "Không thể conver ảnh này"
        ], 403);
    }
})->name("upload-image");