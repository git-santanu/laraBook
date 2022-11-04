<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\friendController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/trait', function () {
    return Auth::user()->test();
});
Auth::routes();
Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/profile', [App\Http\Controllers\profileControl::class, 'index'])->name('profile');
    Route::get('/find',[friendController::class,'findFriend']);
    Route::get('/addFriend/{id}',[friendController::class,'friendReq']);
    Route::get('/req',[friendController::class,'requestIn']);
    Route::get('/accept/{id}',[friendController::class,'acceptFriend']);
    
});
Route::get('/logout', [LoginController::class, 'logout']);


