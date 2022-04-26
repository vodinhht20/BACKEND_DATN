<?php

use App\Exports\ProductExport;
use App\Http\Controllers\Api\ProductController as ApiProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Resources\ProductCollection;
use App\Http\Controllers\ManagementController;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

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

Route::get('/', [HomeController::class, 'index'])->name("home.index");
Route::get('/san-pham', [ProductController::class, 'index'])->name("product.index");
Route::get('/san-pham/{slug}', [ProductController::class, 'showDetail'])->name("product.showDetail");
Route::get('/tin-tuc', [PostController::class, 'index'])->name("new.index");
Route::get('/login', [AuthController::class, 'showFormLogin'])->name("login")->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])->name("post-login")->middleware('guest');
Route::get('/register', [AuthController::class, 'showFromRegister'])->name("show-form-register");
Route::post('register', [AuthController::class, 'register'])->name('register');
Route::get('xac-thuc/{token}/{id}', [AuthController::class, 'verifyTokenEmail'])->name('verify-email-token');
Route::get('account/verify/{id}', [AuthController::class, 'notifyConfirmEmail'])->name('account-verify');
Route::get('/logout', [AuthController::class, 'logout'])->name("logout");
Route::get('/admin/management', [ManagementController::class, 'showManagement']);
Route::prefix('/admin')->middleware(['auth', 'role:admin'])->group(function() {
    Route::get('', [DashboardController::class, 'index'])->name('dashboard');
    Route::prefix('/product')->group(function() {
        Route::get('/export-excel', [ProductController::class, 'exportExcel'])->name('product-export-excel');
        Route::get('/export-csv', [ProductController::class, 'exportCSV'])->name('product-export-csv');
        Route::get('/', [ProductController::class, 'listProduct'])->name('admin-product-list');
        Route::get('/create', [ProductController::class, 'showFormCreate'])->name('admin-product-create');
        Route::post('/create', [ProductController::class, 'addProduct'])->name('post-admin-product-create');
        Route::get('/update/{id}', [ProductController::class, 'showFormUpdate'])->name('admin-product-update');
        Route::post('/update/{id}', [ProductController::class, 'updateProduct'])->name('post-admin-product-update');
        Route::get('/trash', [ProductController::class, 'showTrash'])->name('admin-product-trash');
        Route::get('/{id}/preview', [ProductController::class, 'preview'])->name("admin-product-preview");
    });
    Route::prefix('/category')->group(function() {
        Route::get('/', [CategoryController::class, 'index'])->name('admin-list-category');
        Route::get('/create', [CategoryController::class, 'showFormCreate'])->name('show-form-create-category');
        Route::post('/create', [CategoryController::class, 'create'])->name('post-create-category');
        Route::get('/update/{id}', [CategoryController::class, 'showFormUpdate'])->name('show-form-update-category');
        Route::post('/update/{id}', [CategoryController::class, 'update'])->name('post-update-category');
    });
    Route::prefix('/user')->group(function() {
        Route::get('/', [UserController::class, 'index'])->name('admin-list-user');
        Route::get('/create', [UserController::class, 'showFormCreate'])->name('show-form-user-create');
        Route::get('/update/{id}', [UserController::class, 'showFormUpdate'])->name('show-form-update-user');
        Route::post('/update/{id}', [UserController::class, 'updateUser'])->name('post-update-user');
        Route::get('/black-list', [UserController::class, 'blackList'])->name('user-black-list');
    });
    Route::prefix('/role')->group(function() {
        Route::get('/', [RoleController::class, 'index'])->name('admin-role.index');
    });
    Route::post('/ajax-add-role-user', [RoleController::class, 'addRole'])->name('ajax-add-role-user');
    Route::post('/ajax-get-role-user', [RoleController::class, 'getRole'])->name('ajax-get-role-user');
    Route::post('/ajax-create-user', [UserController::class, 'addUser'])->name('ajax-create-user');
    Route::post('/ajax-remove-user', [UserController::class, 'ajaxRemove'])->name('ajax-remove-user');
    Route::post('/ajax-block-user', [UserController::class, 'ajaxBlock'])->name('ajax-block-user');
    Route::post('/ajax-un-block-user', [UserController::class, 'ajaxUnBlock'])->name('ajax-un-block-user');
    Route::post('/ajax-category-change-status', [CategoryController::class, 'ajaxChangeStatus'])->name('ajax-category-change-status');
    Route::post('/ajax-category-remove', [CategoryController::class, 'ajaxRemoveCategory'])->name('ajax-category-remove');
    Route::post('/ajax-product-remove', [ProductController::class, 'ajaxRemoveProduct'])->name('ajax-product-remove');
    Route::post('/ajax-product-change-status', [ProductController::class, 'ajaxChangeStatus'])->name('ajax-product-change-status');
    Route::post('/ajax-filter-product', [ProductController::class, 'ajaxFilterProduct'])->name('ajax-filter-product');
    Route::post('/ajax-restore-trash-product', [ProductController::class, 'ajaxRestoreTrash'])->name('ajax-restore-trash-product');
    Route::post('/ajax-restore-trash-all-product', [ProductController::class, 'ajaxRestoreTrashAll'])->name('ajax-restore-trash-all-product');
    Route::post('/ajax-delete-trash-product', [ProductController::class, 'ajaxDeleteTrash'])->name('ajax-delete-trash-product');
    Route::post('/ajax-delete-trash-all-product', [ProductController::class, 'ajaxDeleteTrashAll'])->name('ajax-delete-trash-all-product');
    Route::post('/ajax-user-confirm-email', [UserController::class, 'confirmEmail'])->name('ajax-user-confirm-email');
    Route::post('/ajax-user-change-password', [UserController::class, 'changePasssword'])->name('ajax-user-change-password');
});

Route::get('login-google', [AuthController::class, 'ggLogin'])->name('login-google');
Route::get('google/callback', [AuthController::class, 'ggAuthCallback'])->name('callback-google');

