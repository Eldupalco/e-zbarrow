<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        // if(Auth::user()->userType == 'admin')
        // {
        //     return $next($request);
        // }
        // elseif(Auth::user()->userType == 'student')
        // {
        //     return $next($request);
        // }
        // else
        // {
        //     return redirect('/home');
        // }

        if(Auth::user()->userType == 'admin')
        {
            return $next($request);
        }
        else
        {
            return redirect('/home');
        }
        
    }
}
