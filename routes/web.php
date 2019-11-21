<?php
/**
 * Copyright (c) 21.11.2019.
 * File - web.php
 * Author - tor
 */

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
})->name('index');

Auth::routes(['verify' => true]);

//Route::get('/home', 'HomeController@index')->name('home');

Route::get('/verify/{token}', 'Auth\RegisterController@verify')->name('register.verify');

Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {
    Route::get('/', 'IndexController@index')->name('admin.index');
    Route::resource('users', 'UsersController')->names('admin.users');
});
