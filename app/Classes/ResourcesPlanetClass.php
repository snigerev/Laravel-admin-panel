<?php
/**
 * Copyright (c) 2.12.2019.
 * File - ResourcesPlanetClass.php
 * Author - tor
 */

namespace App\Classes;


use App\Models\ResourcesPlanet;
use App\Repositories\ServerConfigRepository;

class ResourcesPlanetClass
{
    private $serverConfigRepository;

    public function __construct()
    {
        $this->serverConfigRepository = app(ServerConfigRepository::class);
    }

    public function createResourcesPlanet($planetId)
    {
        $resourcesConfig = $this->serverConfigRepository->getDefaultResources();

        return ResourcesPlanet::create([
            'planet_id' => $planetId,
            'unobtaniy' => $resourcesConfig->def_unobtaniy,
            'tiberium' => $resourcesConfig->def_tiberium,
            'spaice' => $resourcesConfig->def_spaice,
            'nanoid' => $resourcesConfig->def_nanoid,
        ]);
    }

}
