<?php


namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class Role
{
    public function handle($request, Closure $next)
    {
        if ( ! Auth::check()) {
            abort(403, 'Unauthorized action.');
        } else                                                                         //1 admin
            if (Auth::user()->accessRight == 2 || Auth::user()->accessRight == 1){    //2 moderator
                return $next($request);
            }
        abort(403, 'Access denied.');
    }
}
