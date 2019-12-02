<?php
/**
 * Copyright (c) 2.12.2019.
 * File - GameMapClass.php
 * Author - tor
 */

namespace App\Classes;


use App\Models\GameMap;

class GameMapClass
{
    public function updateCoordinates($coordinateId)
    {
        GameMap::whereId($coordinateId)->update([
            'type' => 1
        ]);
        return true;
    }

    public function updateWhenDeletePlanet($coordinateId)
    {
        GameMap::whereId($coordinateId)->update([
            'type' => 0
        ]);
        return true;
    }

}
