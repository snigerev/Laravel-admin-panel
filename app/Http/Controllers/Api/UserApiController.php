<?php
/**
 * Copyright (c) 11.12.2019.
 * File - UserApiController.php
 * Author - tor
 */

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UserApiController extends Controller
{
    public function getUsersList()
    {
        return User::get(['id', 'name', 'email'])->toArray();
    }
}
