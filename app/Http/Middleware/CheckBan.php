<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckBan
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
        if ( ! Auth::check()) {
            abort(403, 'Unauthorized action.');
        } else
            if (Auth::user()->banned == 1){
                Auth::logout();
                return redirect('/ban');
        }
        return $next($request);
    }
}
