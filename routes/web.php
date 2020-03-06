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

//Public routes
Route::get('/', 'HomeController@index')->name('home');

//User Routes
Route::get('/home', 'User\HomeController@index')->name('user.home');

//Admin routes

Route::prefix('admin')->group(function(){
    Route::get('/','Admin\AdminController@index')->name('admin.dashboard');
    Route::get('/login','Auth\AdminLoginController@showloginform')->name('admin.login');
    Route::post('/login','Auth\AdminLoginController@login')->name('admin.login.submit');
});
Auth::routes();
