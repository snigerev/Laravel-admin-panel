<?php
/**
 * Copyright (c) 28.11.2019.
 * File - ServerConfigRepository.php
 * Author - tor
 */

namespace App\Repositories;


use App\Models\ServerConfig as Model;

class ServerConfigRepository extends CoreRepository
{

    /**
     * Получаем полный конфиг сервера
     *
     * @return mixed
     */
    public function getServerConfig()
    {
        return $this->startConditions()->get()->first();
    }

    /**
     * Активна ли игра
     *
     * @return mixed
     */
    public function isActive()
    {
        return $this->startConditions()->get(['is_active'])->first()->is_active;
    }

    /**
     * Получаем кол-во пользователей в системе
     *
     * @return mixed
     */
    public function getUserCount()
    {
        return $this->startConditions()->get(['user_count'])->first()->user_count;
    }

    /**
     * Увеличиваем счетчик на $count
     * @param int $count
     * @return int
     */

    public function userCountUp(int $count)
    {
        return $this->model->increment('user_count', $count);
    }

    /**
     * @return string
     */
    protected function getModelClass()
    {
        return Model::class;
    }
}
