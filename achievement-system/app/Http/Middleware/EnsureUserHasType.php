<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Http\Request;

use Symfony\Component\HttpFoundation\Response;

use App\UserType;

class EnsureUserHasType
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $user_type): Response
    {
        if ($request->user()->type === $user_type)
        {
            return $next($request);
        }
        return back()->withErrors('Unauthorised');
    }
}
