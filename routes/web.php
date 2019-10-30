<?php
/**
 * Copyright (c) 30.10.2019.
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
});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {
    Route::get('/', 'IndexController@index')->name('admin.index');
    Route::resource('users', 'UsersController')->names('admin.users');
    Route::resource('roles', 'RolesController')->names('admin.roles');
    Route::get('roles/{role}/delete', 'RolesController@delete')->name('admin.roles.delete');
});
