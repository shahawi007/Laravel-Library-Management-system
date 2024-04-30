<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user is authenticated
        if (\Auth::check()) {
            // Check if the user is an admin (role = 1)
            if (\Auth::user()->role == 1) {
                return $next($request);
            }
        }

        // If the user is not an admin, redirect or respond with an error
        return redirect('/')->with('error', 'You do not have permission to access this page.');
    }
}
