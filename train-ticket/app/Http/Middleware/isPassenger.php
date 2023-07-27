<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class isPassenger
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
        if (Auth::check()) {
            if(Auth::user()->status == 'Active') {
                if (Auth::user()->type == 'Passenger') {
                    return $next($request);
                }
            }else{
                return redirect()->intended('/blocked');
            }
        }
        return redirect()->intended('/login');
    }
}
