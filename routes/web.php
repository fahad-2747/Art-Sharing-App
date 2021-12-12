<?php

use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Backend\ArtController;
use App\Http\Controllers\Backend\BannerController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Frontend\IndexController;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::group(['prefix'=> 'admin', 'middleware'=>['admin:admin']], function(){
	Route::get('/login', [AdminController::class, 'loginForm']);
	Route::post('/login',[AdminController::class, 'store'])->name('admin.login');
});

Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
    return view('admin.index');
})->name('dashboard');

//admin all routes
Route::get('/admin/logout' , [AdminController::class, 'destroy'])->name('admin.logout');
Route::get('/admin/profile' , [AdminProfileController::class, 'AdminProfile'])->name('admin.profile');
Route::get('/admin/profile/edit' , [AdminProfileController::class, 'AdminProfileEdit'])->name('admin.profile.edit');
Route::post('/admin/profile/store' , [AdminProfileController::class, 'AdminProfileStore'])->name('admin.profile.store');
Route::get('/admin/change/password' , [AdminProfileController::class, 'AdminChangePassword'])->name('admin.change.password');
Route::post('/admin/change/password/update' , [AdminProfileController::class, 'AdminUpdateChangePassword'])->name('update.change.password');

// Admin Category routes
Route::prefix('category')->group(function (){
    Route::get('/view' , [CategoryController::class, 'categoryView'])->name('all.category');
    Route::post('/store' , [CategoryController::class, 'categoryStore'])->name('category.store');
    Route::get('/edit/{id}' , [CategoryController::class, 'categoryEdit'])->name('category.edit');
    Route::post('/update' , [CategoryController::class, 'categoryUpdate'])->name('category.update');
    Route::get('/delete/{id}' , [CategoryController::class, 'categoryDelete'])->name('category.delete');
});

// Admin art routes
Route::prefix('art')->group(function (){
    Route::get('/view' , [ArtController::class, 'artView'])->name('all.art');
    Route::post('/store' , [ArtController::class, 'artStore'])->name('art.store');
    Route::get('/edit/{id}' , [ArtController::class, 'artEdit'])->name('art.edit');
    Route::post('/update' , [ArtController::class, 'artUpdate'])->name('art.update');
    Route::get('/delete/{id}' , [ArtController::class, 'artDelete'])->name('art.delete');
});

// Admin Banner routes
Route::prefix('banner')->group(function (){
    Route::get('/view' , [BannerController::class, 'bannerView'])->name('all.banner');
    Route::post('/store' , [BannerController::class, 'bannerStore'])->name('banner.store');
    Route::get('/edit/{id}' , [BannerController::class, 'bannerEdit'])->name('banner.edit');
    Route::post('/update' , [BannerController::class, 'bannerUpdate'])->name('banner.update');
    Route::get('/delete/{id}' , [BannerController::class, 'bannerDelete'])->name('banner.delete');
});




Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    $category = Category::latest()->get();
    $arts=DB::table('art')->orderBy('id','desc')->get();
    return view('frontend.index',compact('category','arts'));
})->name('dashboard');

Route::get('/' , [IndexController::class, 'index']);
Route::get('/user/logout' , [IndexController::class, 'UserLogout'])->name('user.logout');
Route::get('/gallery' , [IndexController::class, 'gallery']);
Route::get('/art/{id}' , [IndexController::class, 'art'])->name('category.art');
Route::get('/art/view/{id}' , [IndexController::class, 'artView'])->name('art.view');
