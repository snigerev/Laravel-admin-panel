<?php
/**
 * Copyright (c) 27.11.2019.
 * File - OverviewController.php
 * Author - tor
 */

namespace App\Http\Controllers\Game\Overview;


use App\Http\Controllers\Game\BaseGameController;
use Illuminate\Http\Request;

class OverviewController extends BaseGameController
{
    public function index()
    {
        return 'hello';
    }
}
