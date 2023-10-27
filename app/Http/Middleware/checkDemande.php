<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth ;

class checkDemande
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::user()){
            if(Auth::user()->admin == 1){
                return $next($request);
            }elseif(Auth::user()->admin == 2 || Auth::user()->admin == 0){
                return back();
            }
        }
        else {
            return redirect()->route('login');
        }
    }
}
