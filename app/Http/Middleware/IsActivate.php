<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;


class IsActivate
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
        if (auth()->user()->isActivate == 0) {
            return redirect()->to('admin/client/activate');
        }
        return $next($request);
    }
}
