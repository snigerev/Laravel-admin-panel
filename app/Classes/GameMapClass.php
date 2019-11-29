<?php
/**
 * Copyright (c) 29.11.2019.
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

}
