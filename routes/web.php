<?php
/**
 * Copyright (c) 16.12.2019.
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
/**
 * Test Page
 */
Route::get('/test', 'TestPageController@index');
/**
 *
 */
Route::get('/', 'MainPage\IndexMainController@index')->name('index');


Auth::routes(['verify' => true]);

Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {
    Route::get('/{vue_capture?}', function () {
        return view('admin.index');
    })->where('vue_capture', '.*');
    Route::get('/', 'IndexAdminController@index')->name('admin.index');
    Route::resource('users', 'UsersController')->names('admin.users');
});

Route::group(['namespace' => 'Game\Overview', 'prefix' => 'game'], function () {
    Route::get('/', 'OverviewController@index')->name('game.index');
});
