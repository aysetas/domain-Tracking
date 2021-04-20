<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DomainController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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
Route::prefix('login')->name('login.')->middleware('isLogin')->group(function (){
    Route::get('/', [UserController::class, 'login'])->name('index');
    Route::post('/post', [UserController::class, 'loginPost'])->name('index.post');
});

Route::post('/logout', [UserController::class, 'logout'])->name('logout');

Route::group(['middleware' => 'isUser'], function () {

    Route::get('/customer/{id}', [CustomerController::class, 'destroy'])->name('customer.destroy');
    Route::resource('/customer', CustomerController::class);

    Route::get('/company/{id}', [CompanyController::class, 'destroy'])->name('company.destroy');
    Route::resource('/company', CompanyController::class);

    Route::get('/product/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
    Route::resource('/product', ProductController::class);

    Route::prefix('setting')->name('back.setting.')->group(function () {
        Route::get('/', [SettingController::class, 'index'])->name('index');
        Route::patch('/{id}', [SettingController::class, 'update'])->name('update');
    });

    Route::resource('/domain', DomainController::class);
});
Route::resource('/user',UserController::class);
