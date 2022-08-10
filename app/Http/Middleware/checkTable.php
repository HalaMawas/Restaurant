<?php

namespace App\Http\Middleware;

use Closure;

class checkTable
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
        dd($request->input());
        return $next($request);
    }
}
