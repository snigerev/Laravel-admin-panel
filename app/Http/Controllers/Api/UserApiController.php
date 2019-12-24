<?php
/**
 * Copyright (c) 24.12.2019.
 * File - UserApiController.php
 * Author - snigerev
 */

namespace App\Http\Controllers\Api;

use App\Classes\UserClass;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserCreateRequest;
use App\Repositories\RolesRepository;
use App\Repositories\UserRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class UserApiController extends Controller
{
    /**
     * @var UserRepository|Application|mixed
     */
    private $userRepository;

    /**
     * @var RolesRepository|Application|mixed
     */
    private $rolesRepository;

    /**
     * UsersController constructor.
     */
    public function __construct()
    {
        $this->userRepository = app(UserRepository::class);
        $this->rolesRepository = app(RolesRepository::class);
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function getUsersList()
    {
        return $this->userRepository->getAllUsers();
    }

    public function edit(UserCreateRequest $request, int $id)
    {
        $user = (new UserClass())->updateUser($request, $id);

        if ($user) {
            return 'ok';
        } else {
            return 'false';
        }
    }

    /**
     * @return Application[]|Collection|Model[]|mixed[]
     */
    public function getRoles()
    {
        return $this->rolesRepository->getRoles();
    }
}
