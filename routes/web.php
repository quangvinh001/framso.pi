<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\AdminController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\PetController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VacxinController;

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
    return view('admin.login');
});

Route::get('/jobs', function () {
    return view('admin.jobs.job');
});


Route::get('/admin1', function () {
    return view('admin.dashboard');
});


Route::resource('admins', AdminController::class);
Route::resource('jobs', JobController::class);
Route::resource('foods', FoodController::class);
Route::resource('pets', PetController::class);
Route::resource('products', ProductController::class);
Route::resource('vacxins', VacxinController::class);
Route::resource('users', UserController::class);
Route::get('/', [AdminController::class, 'getLoginadmin'])->name('getLoginadmin');
Route::post('/', [AdminController::class, 'postLoginadmin'])->name('postLoginadmin');


// Route::prefix('admin')->group(function () {
//     Route::get('/', [AdminController::class, 'getLoginadmin'])->name('getLoginadmin');
//     Route::post('/', [AdminController::class, 'postLoginadmin'])->name('postLoginadmin');

//     Route::prefix('users')->group(function () {
//         Route::get('/', [UserController::class, 'getLoginadmin'])->name('getLoginadmin');
//     });
//     Route::prefix('jobs')->group(function () {
//         Route::get('/',[JobController::class, 'getJob'])->name('getJob');
//     });
//     Route::prefix('pet')->group(function () {
//     });
//     Route::prefix('admin')->group(function () {
//     });
// });
