<?php
/**
 * Copyright (c) 26.11.2019.
 * File - UserClass.php
 * Author - tor
 */

namespace App\Classes;


use App\Repositories\UserRepository;

class UserClass
{
    /**
     * @var
     */
    protected $username;
    protected $userRole;
    protected $userRepository;

    public function __construct()
    {
        $this->userRepository = app(UserRepository::class);
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
     * @param $id
     * @param $role_id
     * @return bool
     */
    public function setUserRole($id, $role_id)
    {
        return true;
    }

    /**
     * @param $id
     * @return bool
     */
    public function deleteUser($id)
    {
        $user = $this->userRepository->getUserById($id);
        if (empty($user)) {
            return false;
            //abort(404);
        }
        $adminUser = $this->userRepository->getAdminUsers();

        if ($user->DataUser->role_id === 2 AND count($adminUser) <= 1) {
            return true;// redirect(route('admin.users.index'));
        }
        $user->delete();
        $user->DataUser()->delete();

        return true;
    }


}
