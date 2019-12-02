<?php
/**
 * Copyright (c) 2.12.2019.
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

    public function getLastSector()
    {
        return $this->startConditions()->get(['last_sector'])->first()->last_sector;
    }

    public function getDefaultResources()
    {
        $resources = $this->startConditions()->get([
            'def_unobtaniy',
            'def_tiberium',
            'def_spaice',
            'def_nanoid'
        ])->first();

        return $resources;
    }

    /**
     * @return string
     */
    protected function getModelClass()
    {
        return Model::class;
    }
}
