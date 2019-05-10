<?php

namespace App\Http\Middleware;

use Closure;
use Request;

class php16Middleware
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
        echo "hello middle";
        return $next($request);
    }
}
