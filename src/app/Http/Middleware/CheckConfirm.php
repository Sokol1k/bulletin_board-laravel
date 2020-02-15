<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckConfirm
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
        if ($request->user()) {
            if ($request->user()->confirmed == 0) {
                return redirect()->route('users.unconfirmed');
            } else if ($request->user()->confirmed == 2) {
                return redirect()->route('users.rejected');
            }
        }
        return $next($request);
    }
}
