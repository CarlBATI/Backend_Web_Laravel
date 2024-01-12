<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserIsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!$request->user()) {
            return response()->json(['error' => 'Unauthorized, not logged in'], 403);
        }
        if (!$request->user()->hasRole('admin')) {
            // User is not an admin or not authenticated
            return response()->json(['error' => 'Unauthorized, must be adminstrator'], 403);
        }
        return $next($request);
    }
}
