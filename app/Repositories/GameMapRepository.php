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
        return $sector = $this->startConditions()
            ->where('x', $x)
            ->where('y', $y)
            ->get(['sector'])
            ->first()
            ->sector;
    }

    /**
     * @param $sector
     * @return mixed
     */
    public function getPlacesWithPlanetInSector($sector)
    {
        return $this->startConditions()->where('sector', $sector)
            ->where('type', '1')->get(['id']);
    }

    /**
     * @param $sector
     * @return mixed
     */
    public function getAllCoordinatesInSector($sector)
    {
        return $this->startConditions()->where('sector', $sector)->get(['id', 'x', 'y'])->toArray();
    }

    /**
     * @param $sector
     * @return mixed
     */
    public function getFreeCoordinatesInSectorOnRegistration($sector)
    {
        $placesWithPlanets = $this->getPlacesWithPlanetInSector($sector)->toArray();

        while (count($placesWithPlanets) > 2) {
            $sector += 1;
            $placesWithPlanets = $this->getPlacesWithPlanetInSector($sector)->toArray();
        }

        $freeCoordinates = $this->startConditions()
            ->where('sector', $sector)
            ->where('type', 0)
            ->get(['id']);

        while (empty($freeCoordinates)) {
            $sector += 1;
            $freeCoordinates = $this->startConditions()
                ->where('sector', $sector)
                ->where('type', 0)
                ->get(['id']);
        }

        return $freeCoordinates;
    }

    protected function getModelClass()
    {
        return Model::class;
    }
}
