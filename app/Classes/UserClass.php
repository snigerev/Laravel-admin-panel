<?php
/**
 * Copyright (c) 27.11.2019.
 * File - UserClass.php
 * Author - tor
 */

namespace App\Classes;


use App\Repositories\ServerConfigRepository;
use App\Repositories\UserRepository;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserClass
{
    /**
     * @var
     */
    protected $userRepository;
    protected $serverConfigRepository;

    public function __construct()
    {
        $this->userRepository = app(UserRepository::class);
        $this->serverConfigRepository = app(ServerConfigRepository::class);
    }

    /**
     * Меняем имя пользователя
     * @param $id
     * @param $name
     * @return bool
     */
    public function setUsername($id, $name)
    {
        return true;
    }

    /**
     * Установка роли пользователя(игрок, модератор, админ)
     * @param $user
     * @param $role_id
     * @return bool
     */
    public function setUserRole($user, $role_id)
    {
        return $user->DataUser->update(['role_id' => $role_id]);
    }

    /**
     * Смена ника пользователя
     *
     * @param $user
     * @param $nickname
     * @return bool
     */
    public function setUserNick($user, $nickname)
    {
        return $user->DataUser->update(['nickname' => $nickname]);
    }

    /**
     * Создаем пользователя проверив введенные данные
     *
     * @param $request
     * @return User|\Illuminate\Database\Eloquent\Model
     */
    public function createUser($request)
    {
        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        $user->DataUser()->create(['role_id' => $request['role_id']]);

        if ($user) {
            $updateUserCount = $this->serverConfigRepository->userCountUp(1);
        }

        return $user;
    }

    /**
     * Обновить данные пользователя
     *
     * @param $request
     * @param int $id
     * @return bool
     */
    public function updateUser($request, int $id)
    {
        $user = $this->userRepository->getUserById($id);

        if (empty($user)) {
            abort(404);
        }

        $user->update(array_filter($request->all()));

        if (($user->DataUser->role_id != $request['role_id']) && in_array($request['role_id'], [0, 1, 2])) {
            $this->setUserRole($user, $request['role_id']);
        }
        if ($request['nickname']) {
            $this->setUserNick($user, $request['nickname']);
        }

        return true;
    }

    /**
     * Удалить пользователя
     *
     * @param $id
     * @return bool
     */
    public function deleteUser($id)
    {
        $user = $this->userRepository->getUserById($id);
        if (empty($user)) {
            return abort(404);
        }

        $adminUser = $this->userRepository->getAdminUsers();

        if ($user->DataUser->role_id === 2 AND count($adminUser) <= 1) {
            return true;
        }
        $user->delete();
        $user->DataUser()->delete();

        return true;
    }


}
