<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth as Auth;

class MiddlewareKaryawan
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
         if (Auth::guard('web')->check()){
            if(Auth::guard('web')->user()->jabatan == 'Karyawan')
                {
                     return $next($request);
                    
                }
            return redirect('/yah');
        }
            return redirect('/yah');
        
        
    }
}
