<?php
/**
 * Copyright (c) 25.11.2019.
 * File - IndexMainController.php
 * Author - tor
 */

namespace App\Http\Controllers\MainPage;

use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class IndexMainController extends Controller
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
