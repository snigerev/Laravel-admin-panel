<?php
/**
 * Copyright (c) 1.11.2019.
 * File - UserRole.php
 * Author - tor
 */

namespace App\Http\Middleware;

use App\User;
use Closure;

class UserRole
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
        // dd($request->user());
        if (auth()->check()) {
            $user = User::find($request->user()->id);
            $roles = $user->roles;
            foreach ($roles as $role) {
                dd($role->id);
            }
            return redirect('index');
        }

        return $next($request);
    }
}
