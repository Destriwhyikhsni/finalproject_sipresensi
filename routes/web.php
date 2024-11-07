<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // return view('welcome');
    return redirect()->route('auth.login'); 

});
Route::get('web/beranda', [IndexController::class, 'authBeranda'])
->name('web.beranda')->middleware('auth'); 
Route::get('auth/login', [LoginController::class, 'loginBackend'])
->name('auth.login'); 
Route::post('auth/login', [LoginController::class, 'authenticateBackend'])
->name('auth.login'); 
Route::post('auth/logout', [LoginController::class, 'logoutBackend'])
->name('auth.logout');