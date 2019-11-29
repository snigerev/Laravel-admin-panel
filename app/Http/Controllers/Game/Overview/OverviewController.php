<?php
/**
 * Copyright (c) 29.11.2019.
 * File - OverviewController.php
 * Author - tor
 */

namespace App\Http\Controllers\Game\Overview;


use App\Classes\UserPlanetClass;
use App\Http\Controllers\Game\BaseGameController;
use App\Repositories\GameMapRepository;
use App\Repositories\UserPlanetRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OverviewController extends BaseGameController
{

    /**
     * @var
     */
    public $username;
    public $sector;


    /**
     * @var UserRepository|\Illuminate\Contracts\Foundation\Application|mixed
     */
    protected $userRepository;

    /**
     * @var GameMapRepository|\Illuminate\Contracts\Foundation\Application|mixed
     */
    protected $gameMapRepository;

    /**
     * @var UserPlanetRepository|\Illuminate\Contracts\Foundation\Application|mixed
     */
    protected $userPlanetRepository;

    /**
     * OverviewController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->userRepository = app(UserRepository::class);
        $this->gameMapRepository = app(GameMapRepository::class);
        $this->userPlanetRepository = app( UserPlanetRepository::class);
    }

    /**
     * @return string
     */
    public function index()
    {
        $this->username = $this->userRepository->getUserNick(Session::get('userId'));
        $this->sector = $this->gameMapRepository->getSectorByCoordinates(1, 1);
        (new UserPlanetClass())->createUserPlanet(1, 5000);
        dd($this->gameMapRepository->getAllCoordinatesInSector());

        return 'hello ' . $this->username . ' ' . $this->sector;
    }
}
