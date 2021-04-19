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
Route::get('/customer/{id}', [CustomerController::class, 'destroy'])->name('customer.destroy');
Route::resource('/customer',CustomerController::class);

Route::get('/company/{id}', [CompanyController::class, 'destroy'])->name('company.destroy');
Route::resource('/company',CompanyController::class);

Route::resource('/product',ProductController::class);

Route::get('/setting',[SettingController::class, 'index'])->name('back.setting');
Route::put('/setting/{id}',[SettingController::class, 'update'])->name('back.setting.update');

Route::resource('/domain',DomainController::class);
Route::resource('/user',UserController::class);
