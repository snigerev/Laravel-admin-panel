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
    /**
     * @var ServerConfigRepository|\Illuminate\Contracts\Foundation\Application|mixed
     */
    private $serverConfigRepository;

    /**
     * ResourcesPlanetClass constructor.
     */
    public function __construct()
    {
        $this->serverConfigRepository = app(ServerConfigRepository::class);
    }

    /**
     * @param $planetId
     * @return mixed
     */
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

    /**
     * Принимаем на вход ид планеты и готовый массив с ресурсами(уже посчитанный)
     *
     * @param int $planetID
     * @param array $resources
     * @return mixed
     */
    public function updateResourcePlanet(int $planetID, array $resources)
    {
        return (new ResourcesPlanet)->where('planet_id', $planetID)->update($resources);
    }

}
