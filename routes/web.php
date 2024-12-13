<?php

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


Route::group(['middleware' => 'auth'], function() {
    
    Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::resource('courses', \App\Http\Controllers\CourseController::class);
});

Route::controller(\App\Http\Controllers\AuthController::class)->group(function(){
    Route::get('login','showLogin');
    Route::get('register','showRegister')->name('auth.showRegister');
    Route::post('login','login')->name('auth.login');
    Route::post('register','register')->name('auth.register');
    Route::get('logout', 'logout')->name('auth.logout');
});