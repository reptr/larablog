<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
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
        // return $next($request);
        $user = $request->user();

        if (!$user) {
            abort(403);
        }

        // role id === 1 (admin)
        if ($user->role->id === 1) {
            return $next($request);
        } else {
            abort(403);
        }

        return redirect('/');
    }
}
