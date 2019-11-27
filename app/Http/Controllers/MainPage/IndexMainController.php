<?php
/**
 * Copyright (c) 27.11.2019.
 * File - IndexMainController.php
 * Author - tor
 */

namespace App\Http\Controllers\MainPage;

use App\Http\Controllers\Controller;
use App\Repositories\ServerConfigRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class IndexMainController extends Controller
{

    /**
     * @var UserRepository|\Illuminate\Contracts\Foundation\Application|mixed
     */
    protected $userRepository;

    /**
     * @var ServerConfigRepository|\Illuminate\Contracts\Foundation\Application|mixed
     */
    protected $serverConfigRepository;

    /**
     * Счетчик игроков
     *
     * @var mixed
     */
    public $userCount;

    /**
     * IndexMainController constructor.
     */
    public function __construct()
    {
        $this->userRepository = app(UserRepository::class);
        $this->serverConfigRepository = app(ServerConfigRepository::class);

        $this->userCount = $this->serverConfigRepository->getUserCount();
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {

        if (\Auth::check()) {
            $nick = $this->userRepository->getUserNick(\Auth::user()->id)->nickname;
        }

        return view('mainPage.index', [
            'nick' => $nick,
            'user_count' => $this->userCount
        ]);
    }
}
