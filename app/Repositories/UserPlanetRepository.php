<?php
/**
 * Copyright (c) 29.11.2019.
 * File - UserPlanetRepository.php
 * Author - tor
 */

namespace App\Repositories;


use App\Models\UserPlanet as Model;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class UserPlanetRepository extends CoreRepository
{

    public function getPlanetSector($planetId)
    {
        $planetSector = $this->startConditions()->find($planetId)->GameMap->sector;
        return $planetSector;
    }

    protected function getModelClass()
    {
        return Model::class;
    }
}
