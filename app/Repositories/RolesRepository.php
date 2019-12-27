<?php
/**
 * Copyright (c) 24.12.2019.
 * File - RolesRepository.php
 * Author - snigerev
 */

namespace App\Repositories;


use App\Models\Role as Model;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class RolesRepository extends CoreRepository
{
    public function getRoles()
    {
        return $this->startConditions()->all();
    }

    protected function getModelClass()
    {
        return Model::class;
    }
}
