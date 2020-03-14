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

    //admin posts
    Route::get('/posts','Admin\PostController@index')->name('admin.posts');
    Route::get('/post/create','Admin\PostController@create')->name('admin.post.create');
    Route::get('/post/edit/{post}','Admin\PostController@edit')->name('admin.post.edit');
    Route::put('/post/store','Admin\PostController@store')->name('admin.post.store');
    Route::put('/post/update/{post}','Admin\PostController@update')->name('admin.post.update');
    //admin category
    Route::get('/category','Admin\CategoryController@index')->name('admin.category');
    Route::put('/category/store','Admin\CategoryController@store')->name('admin.category.store');
    Route::get('/category/update/{category}','Admin\CategoryController@update')->name('admin.category.update');
    Route::get('/category/delete/{category}','Admin\CategoryController@delete')->name('admin.category.delete');

    //admin tags
    Route::get('/tag','Admin\TagController@index')->name('admin.tag');
    Route::put('/tag/store','Admin\TagController@store')->name('admin.tag.store');
    Route::put('/tag/update/{tag}','Admin\TagController@update')->name('admin.tag.update');
    Route::get('/tag/delete/{tag}','Admin\TagController@delete')->name('admin.tag.delete');

    //admin login
    Route::get('/login','Auth\AdminLoginController@showloginform')->name('admin.login');
    Route::post('/login','Auth\AdminLoginController@login')->name('admin.login.submit');

    //password reset routes
    Route::post('/password/email','Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::get('/password/reset','Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('/password/reset','Auth\AdminResetPasswordController@reset');
    Route::get('/password/reset/{token}','Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');
});


Auth::routes();
