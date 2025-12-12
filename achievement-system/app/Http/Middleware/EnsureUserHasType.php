<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Http\Request;

use Symfony\Component\HttpFoundation\Response;

use App\Models\Administrator;

use App\Models\Teacher;

use App\Models\Guardian;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class EnsureUserHasType
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $type): Response
    {
        $user = User::find(Auth::id());
        if ($user->type()->value === $type) 
        {
            return $next($request);
        }
        return back()->withErrors('Forbidden');
    }
}
