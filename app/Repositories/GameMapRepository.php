<?php
/**
 * Copyright (c) 29.11.2019.
 * File - GameMapRepository.php
 * Author - tor
 */

namespace App\Repositories;


use App\Models\GameMap as Model;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class GameMapRepository extends CoreRepository
{

    /**
     * @return bool
     */
    public function isExist()
    {
        $map = $this->startConditions()->get(['id'])->first();

        if (empty($map)) {
            return false;
        }
        return true;
    }

    /**
     * @param $x
     * @param $y
     * @return int
     */
    public function getSectorByCoordinates($x, $y)
    {
        $sector = $this->startConditions()
            ->where('x', $x)
            ->where('y', $y)
            ->get(['sector'])
            ->first()
            ->sector;
        return $sector;
    }

    public function getAllCoordinatesInSector($sector)
    {
        return $this->startConditions()->where('sector', $sector)->get(['id', 'x', 'y'])->toArray();
    }

    public function getFreeCoordinatesInSector($sector)
    {
        return $this->startConditions()
            ->where('sector', $sector)
            ->where('type', 0)
            ->get(['id']);
    }

    protected function getModelClass()
    {
        return Model::class;
    }
}
