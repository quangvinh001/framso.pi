<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\PetController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\BillController;
use App\Http\Controllers\VacxinController;
use Illuminate\Support\Facades\Auth;

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

// Route::get('/', function () {
//     return view('admin.login');
// });

Route::get('/login', [LoginController::class, 'index'])->name('getlogin');
Route::post('/postlogin', [LoginController::class, 'store'])->name('postLogin');


Route::resource('registers', RegisterController::class);

Route::group(['middleware' => ['auth']], function () {
    Route::get('/', [AdminController::class, 'index']);
    Route::resource('admins', AdminController::class);
    Route::resource('jobs', JobController::class);
    Route::resource('foods', FoodController::class);
    Route::resource('pets', PetController::class);
    Route::resource('products', ProductController::class);
    Route::resource('vacxins', VacxinController::class);
    Route::resource('users', UserController::class);
    Route::resource('bills', BillController::class);
    Route::get('/logout', [LogoutController::class, 'perform'])->name('logout');
});


