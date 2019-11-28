<?php
/**
 * Copyright (c) 28.11.2019.
 * File - SetSessionsParametersMiddleware.php
 * Author - tor
 */

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class SetSessionsParametersMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!(Session::get('userId'))) {
            Session::put('userId', \Auth::user()->id);
        }
        return $next($request);
    }
}
