<?php
/**
 * Copyright (c) 2.12.2019.
 * File - UserPlanetClass.php
 * Author - tor
 */

namespace App\Classes;


use App\Models\ResourcesPlanet;
use App\Models\UserPlanet;
use App\Repositories\GameMapRepository;
use App\Repositories\ServerConfigRepository;
use Arr;

class UserPlanetClass
{
    /**
     * @var GameMapRepository|\Illuminate\Contracts\Foundation\Application|mixed
     */
    protected $gameMapRepository;

    /**
     * @var ServerConfigRepository|\Illuminate\Contracts\Foundation\Application|mixed
     */
    protected $serverConfigRepository;

    /**
     * UserPlanetClass constructor.
     */
    public function __construct()
    {
        $this->gameMapRepository = app(GameMapRepository::class);
        $this->serverConfigRepository = app(ServerConfigRepository::class);
    }

    /**
     * @param $userId
     * @return UserPlanet|\Illuminate\Database\Eloquent\Model
     */
    public function createUserPlanetOnRegistration($userId)
    {
        $lastSector = $this->serverConfigRepository->getLastSector();

        $arrayFreePlaces = $this->gameMapRepository->getFreeCoordinatesInSectorOnRegistration($lastSector)->toArray();

        $placeForPlanet = Arr::random($arrayFreePlaces);
        $planet = UserPlanet::create([
            'user_id' => $userId,
            'game_map_id' => $placeForPlanet['id']
        ]);

        (new GameMapClass())->updateCoordinates($placeForPlanet['id']);

        (new ServerConfigClass())->updateLastSector();

        (new ResourcesPlanetClass())->createResourcesPlanet($planet['id']);

        dd($lastSector, $arrayFreePlaces, $placeForPlanet);

        return $planet;
    }
}
