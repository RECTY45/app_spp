<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class isPetugas
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(auth()->guest()){
            abort(403);
        }else if(auth()->user()->level == "admin" || auth()->user()->level == "petugas"){
            return $next($request);
        }

        return abort(403);
    }
}
