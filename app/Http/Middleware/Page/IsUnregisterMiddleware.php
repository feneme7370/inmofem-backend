<?php

namespace App\Http\Middleware\Page;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsUnregisterMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if(!Auth::user()->status){
            return redirect()->route('auth.is_unregister')->with('message', 'El usuario esta inhabilitado');
        }

        if(!Auth::user()->company){
            return redirect()->route('auth.is_unregister')->with('message', 'El usuario no tiene empresa asignada');
        }
        
        if(Auth::user()->roles->first()->name == 'unregister'){
            return redirect()->route('auth.is_unregister')->with('message', 'El usuario no esta vinculado a una empresa');
        }
        
        if(!Auth::user()->company){
            if(!Auth::user()->company->status){
                return redirect()->route('auth.is_unregister')->with('message', 'El usuario no tiene empresa asignada');
            }
        }
        return $next($request);
    }
}
