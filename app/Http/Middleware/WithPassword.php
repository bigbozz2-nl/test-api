<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class WithPassword
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param \Closure(Request): (Response) $next
     * @return Response
     * @throws Exception
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (empty(config('quotes.api.endpoint')) || empty(config('quotes.api.password'))) {
            throw new Exception('Your API settings are not set.');
        }

        if ($request->header('token') !== config('quotes.api.password')) {
            return response()->json('Unauthorized', 401);
        }

        return $next($request);
    }
}
