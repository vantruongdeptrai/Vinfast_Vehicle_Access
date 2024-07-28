<?php

use App\Http\Controllers\Admin\ManageParkingController;
use App\Http\Controllers\Admin\ParkingFeeController;
use App\Http\Controllers\Auth\AccountController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CheckinController;
use App\Http\Controllers\CheckoutController;
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
    Route::get('/admin/dashboard', [AdminController::class, 'adminDashboard'])->name('admin-dashboard');
}); 

Route::prefix('admin')->group(function(){
    Route::prefix('parking-fee')->group(function(){
        Route::get('/',[ParkingFeeController::class,'index'])->name('list-parking-fee');
        Route::get('/create',[ParkingFeeController::class,'create'])->name('create');
        Route::post('/create',[ParkingFeeController::class,'store'])->name('store');
        Route::get('/update/{id}',[ParkingFeeController::class,'edit'])->name('edit');
        Route::post('/update/{id}',[ParkingFeeController::class,'update'])->name('update');
        Route::delete('/delete/{id}',[ParkingFeeController::class,'delete'])->name('delete');
    });
    
    Route::prefix('manage-parking')->group(function(){
        Route::get('/',[ManageParkingController::class,'index'])->name('list-manage-parking');
    });
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
Route::post('/login',[AccountController::class,'login'])->name('login.post');

Route::get('/register',[RegisterController::class,'index'])->name('register');
Route::post('/register',[RegisterController::class,'register'])->name('register');

Route::get('/qr-code',[CheckinController::class, 'qrcode'])->name('qrcode');
Route::post('/checkin', [CheckinController::class, 'checkIn'])->name('checkin');

Route::get('/parking-checkout/{id}', [CheckoutController::class, 'show'])->name('checkout');

Route::get('/qr-checkout/{id}', [CheckoutController::class, 'generatePdf'])->name('qr-checkout');
