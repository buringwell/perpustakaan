<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class adminmiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
        public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) 
        {
            return redirect()->route('login')->with('failed', 'Silahkan login terlebih dahulu');
        }
            $user = Auth::user();
            if ($user->user_level === 'admin') 
            {
                return $next($request);
            }
            abort(403, 'Unauthorized');;
    }
}
