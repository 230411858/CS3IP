<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Http\Request;

use Symfony\Component\HttpFoundation\Response;

use App\Models\Administrator;

use App\Models\Teacher;

use App\Models\Guardian;

use App\Models\Student;

class EnsureUserHasType
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $type): Response
    {
        switch ($type) 
        {
            case 'admin':
                try 
                {
                    Administrator::where('user_id', $request->user()->id)->firstOrFail();
                } 
                catch (\Throwable $th) 
                {
                    return back()->withErrors('Unauthorised');
                }
                return $next($request);

            case 'teacher':
                try 
                {
                    Teacher::where('user_id', $request->user()->id)->firstOrFail();
                } 
                catch (\Throwable $th) 
                {
                    return back()->withErrors('Unauthorised');
                }
                return $next($request);

            case 'guardian':
                try 
                {
                    Guardian::where('user_id', $request->user()->id)->firstOrFail();
                } 
                catch (\Throwable $th) 
                {
                    return back()->withErrors('Unauthorised');
                }
                return $next($request);

            case 'student':
                try 
                {
                    Student::where('user_id', $request->user()->id)->firstOrFail();
                } 
                catch (\Throwable $th) 
                {
                    return back()->withErrors('Unauthorised');
                }
                return $next($request);
        }
        return back()->withErrors('Unauthorised');
    }
}
