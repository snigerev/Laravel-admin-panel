<?php
/**
 * Copyright (c) 12.12.2019.
 * File - TestPageController.php
 * Author - tor
 */

namespace App\Http\Controllers;

use App\Classes\ResourcesPlanetClass;
use App\Classes\UserPlanetClass;
use App\Http\Controllers\Game\BaseGameController;
use App\Repositories\GameMapRepository;
use App\Repositories\ResourcesPlanetRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TestPageController extends BaseGameController
{
    /**
     * @var
     */
    public $username;


    /**
     * @var UserRepository|\Illuminate\Contracts\Foundation\Application|mixed
     */
    protected $userRepository;

    /**
     * @var GameMapRepository|\Illuminate\Contracts\Foundation\Application|mixed
     */
    protected $gameMapRepository;

    /**
     * @var ResourcesPlanetRepository|\Illuminate\Contracts\Foundation\Application|mixed
     */
    protected $resourcesPlanetRepository;

    /**
     * OverviewController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->userRepository = app(UserRepository::class);
        $this->gameMapRepository = app(GameMapRepository::class);
        $this->resourcesPlanetRepository = app(ResourcesPlanetRepository::class);
    }

    /**
     * @return string
     */
    public function index()
    {
        $this->username = $this->userRepository->getUserNick(Session::get('userId'));
        //$sector = $this->gameMapRepository->getSectorByCoordinates(1, 1);
        $resource = $this->resourcesPlanetRepository->getResourcesPlanet(32)->toArray();

        $resource['nanoid'] += 1000;

        (new ResourcesPlanetClass())->updateResourcePlanet(32, $resource);
        (new UserPlanetClass())->createUserPlanetOnRegistration(1);

        //dd($resource, $sector);
        return 'hello ';
    }
}
