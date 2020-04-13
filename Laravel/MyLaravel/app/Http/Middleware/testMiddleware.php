<?php

namespace App\Http\Middleware;

use Closure;

class testMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        echo "đây là role : ".$role;
        echo "<br>";
        return $next($request);
    }

    public function terminate($request, $response){
        echo "<br>";
        echo "đây là code trong terminate";
    }
}
