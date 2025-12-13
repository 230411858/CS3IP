<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Http\Request;

use Symfony\Component\HttpFoundation\Response;

use Illuminate\Support\Facades\Auth;

class EnsureUserHasType
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $required_type): Response
    {
        $roles = [
            'administrator' => 3, 
            'teacher' => 2,
            'guardian' => 1,
            'student' => 0
        ];
        if ($roles[Auth::user()->type] >= $roles[$required_type])
        {
            return $next($request);
        }
        return back()->withErrors('Forbidden: You must be at least a' . $required_type === 'administrator' ? 'n ' : ' ' . ucfirst($required_type) . ' to complete this request');
    }
}