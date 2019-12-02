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

    protected function getModelClass()
    {
        return Model::class;
    }
}
