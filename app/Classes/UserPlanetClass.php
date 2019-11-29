<?php
/**
 * Copyright (c) 29.11.2019.
 * File - UserPlanetClass.php
 * Author - tor
 */

namespace App\Classes;


use App\Models\UserPlanet;
use App\Repositories\GameMapRepository;

class UserPlanetClass
{
    protected $gameMapRepository;

    public function __construct()
    {
        $this->gameMapRepository = app(GameMapRepository::class);
    }

    public function createUserPlanet($userId, $gameMapId)
    {
        $actionToCoordinate = mt_rand(0, 1);
        dd($actionToCoordinate);
        $coordinates = $this->gameMapRepository
            ->getFreeCoordinatesInSector($gameMapId);

        dd($coordinates);

        $planet = UserPlanet::create([
            'userId' => $userId,
            'game_map_id' => $gameMapId
        ]);

        return $planet;
    }

}
