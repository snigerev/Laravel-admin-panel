<?php
/**
 * Copyright (c) 27.12.2019.
 * File - BaseAdminController.php
 * Author - snigerev
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;

class BaseAdminController extends Controller
{

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        $this->middleware(['auth', 'verified']); //, 'globalAdmin'

    }

}
