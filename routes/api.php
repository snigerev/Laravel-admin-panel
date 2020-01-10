<?php
/**
 * Copyright (c) 10.1.2020.
 * File - api.php
 * Author - snigerev
 */

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('roles', 'Api\UserApiController@getRoles');

Route::get('users', 'Api\UserApiController@getUsersList');

Route::post('users/{id}', 'Api\UserApiController@edit');
