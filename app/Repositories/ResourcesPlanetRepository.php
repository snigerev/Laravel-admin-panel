<?php
/**
 * Copyright (c) 2.12.2019.
 * File - ResourcesPlanetRepository.php
 * Author - tor
 */

namespace App\Repositories;


use App\Models\ResourcesPlanet as Model;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class ResourcesPlanetRepository extends CoreRepository
{
    /**
     * @param $planetId
     * @return mixed
     */
    public function getResourcesPlanet($planetId)
    {
        return $this->startConditions()->where('planet_id', $planetId)
            ->get([
                'unobtaniy',
                'tiberium',
                'spaice',
                'energy',
                'energy_used',
                'nanoid',
            ])->first();
    }

    /**
     * @param $planetId
     * @return mixed
     */
    public function getNanoid($planetId)
    {
        return $this->startConditions()->where('planet_id', $planetId)
            ->get([
                'nanoid',
            ])->first()->nanoid;
    }

    protected function getModelClass()
    {
        return Model::class;
    }
}
