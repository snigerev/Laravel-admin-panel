<?php
/**
 * Copyright (c) 23.11.2019.
 * File - IndexController.php
 * Author - tor
 */

namespace App\Http\Controllers\MainPage;

use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class IndexController extends Controller
{

    protected $userRepository;

    public function __construct()
    {
        $this->userRepository = app(UserRepository::class);
    }

    public function index()
    {
        $nick = '';

        if (\Auth::check()) {
            $nick = $this->userRepository->getUserNick(\Auth::user()->id)->nickname;
        }

        return view('mainPage.index', ['nick' => $nick]);
    }
}
