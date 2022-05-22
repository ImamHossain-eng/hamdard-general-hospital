<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class User
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
        if(auth()->check()){
            if(auth()->user()->role_id == 2){
                return $next($request);
            }else{
                return back()->with('error', 'You are not user.');
            }
        }else{
            return redirect()->route('login')->with('error', 'You are unauthorized user');
        } 
    }
}
