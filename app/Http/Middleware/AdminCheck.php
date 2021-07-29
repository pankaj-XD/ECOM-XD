<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminCheck
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

        $user =  auth()->user();
        if($user){
           if($user->isAdmin ){
               return $next($request);    
           }else{
             return redirect('/');
           }
        
        }else{
            return redirect('/');
        }
        
        
    }
}
