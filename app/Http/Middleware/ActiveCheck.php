<?php

namespace App\Http\Middleware;
use Auth;

use Closure;

class ActiveCheck
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
        $isActive = (Auth::user()->is_active == 1);
  
        //This will be excecuted if the new authentication fails.
        if (! $isActive){
            Auth::logout();
            return redirect('/login')->with('message', 'Authentication Error.');
        }
        return $next($request);
    }
}
