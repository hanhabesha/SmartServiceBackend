<?php

namespace App\Http\Middleware;

use Closure;

class SubAdmin
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
        if (auth()->user()->userType == 1) {
            return $next($request);
        }
        return redirect()->back()->with('error', 'Beyond Privillage!');
    }
}
