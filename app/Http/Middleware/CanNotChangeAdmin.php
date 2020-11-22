<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class CanNotChangeAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::user()->isSuperAdmin) {
            return $next($request);
        }
        else {
            foreach (Auth::user()->roles as $role) {
                if (($role->name === "Admin")) {
                    return $next($request);
                }
            }
        }
        
        return redirect()->route('user.index')->with('warning','You are not authorized to do this task');
    }
}
