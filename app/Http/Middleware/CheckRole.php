<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, string $role)
    {
        if ($role == 'admin' && auth()->user()->role_id != 1) {
            abort(403);
        }

        if ($role == 'konferans_admin' && auth()->user()->role_id != 2) {
            abort(403);
        }

        if ($role == 'hakem_admin' && auth()->user()->role_id != 3) {
            abort(403);
        }
        if ($role == 'yazar_admin' && auth()->user()->role_id != 4) {
            abort(403);
        }

        return $next($request);
    }
}
