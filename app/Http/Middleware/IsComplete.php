<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;


class IsComplete
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
        if (auth()->user()->isComplete == 0) {
            return redirect()->to('admin/client/account');
        }
        return $next($request);
    }
}
