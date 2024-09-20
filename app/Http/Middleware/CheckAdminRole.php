<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckAdminRole
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
        // Check if the user is authenticated and has the role of 'admin'
        if (Auth::check() && Auth::user()->role === 'admin') {
            return $next($request);  // Allow access to the admin routes
        }

        // Redirect the user to a "403 Forbidden" page or any other page
        return redirect('/')->with('error', 'You do not have permission to access this page.');
    }
}
