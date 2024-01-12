<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LogRequest
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        \Log::channel('request')->info('Request Logged:', [
            'url' => $request->fullUrl(),
            'method' => $request->method(),
            'ip' => $request->ip(),
            'agent' => $request->header('user-agent'),
            'params' => $request->all(),
        ]);
    
        $response = $next($request);
    
        \Log::channel('response')->info('Response Logged:', [
            'status' => $response->status(),
            'headers' => $response->headers->all(),
            'content' => $response->getContent(),
        ]);
    
        return $response;
    }
}
