<?php
/**
 * Copyright (c) 27.11.2019.
 * File - CheckGameIsOnline.php
 * Author - tor
 */

namespace App\Http\Middleware;

use App\Repositories\ServerConfigRepository;
use Closure;

class CheckGameIsOnline
{
    protected $serverConfigRepository;

    public function __construct()
    {
        $this->serverConfigRepository = app(ServerConfigRepository::class);
    }

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $game_is_active = $this->serverConfigRepository->isActive();
        if ($game_is_active) {
            return $next($request);
        } else {
            return redirect(route('index'));
        }
    }
}
