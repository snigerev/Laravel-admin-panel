<?php
/**
 * Copyright (c) 28.11.2019.
 * File - OverviewController.php
 * Author - tor
 */

namespace App\Http\Controllers\Game\Overview;


use App\Http\Controllers\Game\BaseGameController;
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
     * OverviewController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->userRepository = app(UserRepository::class);
    }

    /**
     * @return string
     */
    public function index()
    {
        $this->username = $this->userRepository->getUserNick(Session::get('userId'));

        return 'hello ' . $this->username;
    }
}
