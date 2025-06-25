<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EnsureIsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // if (!auth()->check() || !auth()->user()->is_admin) {
        //     abort(403, 'Unauthorized access. Admin privileges required.');
        // }

        if (!Auth::check() || !Auth::user()->is_admin) {
            return redirect(RouteServiceProvider::HOME)
                ->with('error', 'You do not have admin access');
        }

        return $next($request);
    }
}
