<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ManagerCheck
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
           if($user->isManager || $user->isAdmin  ){
               return $next($request);    
           }else{
             return redirect('/');
           }
        
        }else{
            return redirect('/');
        }

    }
}
 