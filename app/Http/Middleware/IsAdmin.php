<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

use function GuzzleHttp\Promise\all;

class IsAdmin
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
        if(auth()->user()->is_admin==1){
            return $next($request);
        }
        dd('hello');
        return redirect('home')->with('error',"you dont have access to admin.");
    }
}
