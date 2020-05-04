<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Response;

class AcceptJsonOnly
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        abort_unless(
            $request->headers->get('Accept') === 'application/json',
            Response::HTTP_BAD_REQUEST,
            'You have to accept application/json.'
        );

        return $next($request);
    }
}
