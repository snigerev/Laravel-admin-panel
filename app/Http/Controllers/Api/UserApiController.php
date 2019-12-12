<?php
/**
 * Copyright (c) 12.12.2019.
 * File - UserApiController.php
 * Author - tor
 */

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use App\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\Request;

class UserApiController extends Controller
{
    /**
     * @var UserRepository|Application|mixed
     */
    private $userRepository;

    /**
     * UsersController constructor.
     */
    public function __construct()
    {
        $this->userRepository = app(UserRepository::class);
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function getUsersList()
    {
        return $this->userRepository->getAllUsers();
    }
}
