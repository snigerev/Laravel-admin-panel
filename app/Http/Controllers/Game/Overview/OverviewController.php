<?php
/**
 * Copyright (c) 2.12.2019.
 * File - OverviewController.php
 * Author - tor
 */

namespace App\Http\Controllers\Game\Overview;


use App\Classes\ResourcesPlanetClass;
use App\Classes\UserPlanetClass;
use App\Http\Controllers\Game\BaseGameController;
use App\Repositories\GameMapRepository;
use App\Repositories\ResourcesPlanetRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OverviewController extends BaseGameController
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
        return 'hello ';
    }
}
