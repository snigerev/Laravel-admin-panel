<?php
/**
 * Copyright (c) 20.11.2019.
 * File - GlobalAdminMiddleware.php
 * Author - tor
 */

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class GlobalAdminMiddleware
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
        $user = Auth::user();
        $isAdmin = Session::get('isAdmin');

        if ($isAdmin) {
            \View::share('authUser', $user);
            return $next($request);
        } else {
            if (!$user->isAdmin()) {
                return redirect(route('index'));
            }
            Session::put('isAdmin', '1');
            \View::share('authUser', $user);
            return $next($request);
        }

    }
}
