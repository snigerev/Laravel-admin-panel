<?php
/**
 * Copyright (c) 20.11.2019.
 * File - GlobalAdminMiddleware.php
 * Author - tor
 */

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

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

        if (!$user->isAdmin()) {
            return redirect(route('index'));
        }
        \View::share('authUser', $user);

        return $next($request);
    }
}
