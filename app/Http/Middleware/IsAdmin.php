<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class IsAdmin
{
    public function handle($request, Closure $next, $role)
    {
        $roles = explode("|", $role);
        if(Auth::user() && Auth::user()->hasRole($roles)){
            return $next($request);
        }
        return redirect('/');
    }
}
