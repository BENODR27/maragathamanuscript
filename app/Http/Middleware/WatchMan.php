<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Auth;
class WatchMan
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::user()){
            if(Auth::user()->role=="admin"||Auth::user()->role=="superadmin"){
                return $next($request);          
             }else{
                return redirect('/');
             }           
        }
        else{
            return redirect()->route('login');
        }
    }
}
