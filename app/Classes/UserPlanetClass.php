<?php
/**
 * Copyright (c) 29.11.2019.
 * File - UserPlanetClass.php
 * Author - tor
 */

namespace App\Classes;


use App\Models\UserPlanet;
use App\Repositories\GameMapRepository;
use App\Repositories\ServerConfigRepository;
use Arr;

class UserPlanetClass
{
    protected $gameMapRepository;
    protected $serverConfigRepository;

    public function __construct()
    {
        $this->gameMapRepository = app(GameMapRepository::class);
        $this->serverConfigRepository = app(ServerConfigRepository::class);
    }

    public function createUserPlanetOnRegistration($userId)
    {
        $lastSector = $this->serverConfigRepository->getLastSector();

        $arrayFreePlaces = $this->gameMapRepository->getFreeCoordinatesInSector($lastSector)->toArray();

        $placeForPlanet = Arr::random($arrayFreePlaces);
        $planet = UserPlanet::create([
            'user_id' => $userId,
            'game_map_id' => $placeForPlanet['id']
        ]);

        (new GameMapClass())->updateCoordinates($placeForPlanet['id']);

        (new ServerConfigClass())->updateLastSector();

        dd($lastSector, $arrayFreePlaces, $placeForPlanet);

        return $planet;
    }
}
