<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Illuminate\Support\Facades\Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        /**@var User $user */
        $user = Auth::user();
        if (!$user || !$user->isAdmin()) {
            return redirect('/');
        }
        return $next($request);
    }
}
