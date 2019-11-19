<?php
/**
 * Copyright (c) 19.11.2019.
 * File - UserRepository.php
 * Author - tor
 */

namespace App\Repositories;


use App\User as Model;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Database\Eloquent\Collection;

class UserRepository extends CoreRepository
{

    /**
     * @return mixed
     */

    public function getAdminUsers()
    {
        return $this->startConditions()
            ->whereHas('DataUser', function ($q) {
                $q->where('role_id', '2');
            })->get('id');
    }

    /**
     * @param $id
     * @return mixed
     */

    public function getUserById($id)
    {
        return $this->startConditions()->find($id, ['id', 'name', 'email']);
    }

    /**
     * @param $id
     * @return mixed
     */

    public function getEdit($id)
    {
        return $this->startConditions()->find($id, ['id', 'name', 'email']);
    }

    /**
     * @return Application[]|Collection|\Illuminate\Database\Eloquent\Model[]|mixed[]
     */

    public function getAllUsers()
    {
        return $this->startConditions()->all('id', 'name', 'email');
    }

    /**
     * @return string
     */

    protected function getModelClass()
    {
        return Model::class;
    }
}
