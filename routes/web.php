<?php
/**
 * Copyright (c) 25.11.2019.
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

Route::get('/', 'MainPage\IndexController@index')->name('index');

Auth::routes(['verify' => true]);

Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {
    Route::get('/', 'IndexController@index')->name('admin.index');
    Route::resource('users', 'UsersController')->names('admin.users');
});
