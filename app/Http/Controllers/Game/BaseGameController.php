<?php
/**
 * Copyright (c) 28.11.2019.
 * File - BaseGameController.php
 * Author - tor
 */

namespace App\Http\Controllers\Game;


use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;

class BaseGameController extends Controller
{

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        $this->middleware(['auth', 'verified', 'gameIsActive', 'setSessionsParameters']);
    }

}
