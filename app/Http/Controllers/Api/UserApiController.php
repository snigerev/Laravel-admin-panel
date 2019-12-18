<?php
/**
 * Copyright (c) 18.12.2019.
 * File - UserApiController.php
 * Author - snigerev
 */

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use Illuminate\Contracts\Foundation\Application;

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
