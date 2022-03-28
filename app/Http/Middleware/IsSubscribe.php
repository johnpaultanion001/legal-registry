<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Carbon\Carbon;

class IsSubscribe
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
        date_default_timezone_set('Asia/Manila');
        if (auth()->user()->subscribe_at < Carbon::today()->subDays(1)) {
            return redirect()->to('admin/client/activate');
        }
        return $next($request);
    }
}
