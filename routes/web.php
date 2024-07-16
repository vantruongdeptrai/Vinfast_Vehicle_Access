<?php

use App\Http\Controllers\Auth\AccountController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[UserController::class,'userDashboard'])->name('user');

Route::post('/infomation',[UserController::class,'postInformation'])->name('infomation');

Route::post('/license-plate',[UserController::class,'findLicensePlates'])->name('findInfor');

Route::post('/feedback',[UserController::class,'feedback'])->name('feedback');
// Routes cho admin
Route::middleware(['auth','role:admin'])->group(function(){
    Route::get('/admin/dashboard', [AdminController::class, 'adminDashboard']);
});

// Routes cho admin cơ sở
Route::middleware(['auth', 'role:basic_admin'])->group(function () {
    Route::get('/basic_admin/dashboard', [AdminController::class, 'basicAdminDashboard']);
});

// Routes cho người dùng
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/user/dashboard', [UserController::class, 'userDashboard']);
});

Route::get('/login',[AccountController::class,'formLogin'])->name('login');
Route::post('/login',[AccountController::class,'login'])->name('login');

Route::get('/register',[RegisterController::class,'index'])->name('register');
Route::post('/register',[RegisterController::class,'register'])->name('register');

