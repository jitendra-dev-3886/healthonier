<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;



class MultiAuthUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $userType): Response
    {
        if (auth()->user()->type == $userType) {
            if (auth()->user()->status === 0) {
                Auth::logout();
                return redirect('/login')->with('error', 'Your account is no longer active. Please contact to admin.');
            } else {


                return $next($request);
            }
        }

        return response()->json(['You do not have permission to access for this page.']);
        // return $next($request);
    }
}