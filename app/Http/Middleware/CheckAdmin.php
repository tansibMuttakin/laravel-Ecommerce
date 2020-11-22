<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;

class CheckAdmin
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
        // if (Auth::user()->isAdmin) {
        //     return $next($request);
        // }
        // return redirect('/');
        if (Auth::user()->isSuperAdmin) {
            return $next($request);
        }
        else {
            foreach (Auth::user()->roles as $role) {
                if (($role->name === 'Admin') || ($role->name === 'Sub Admin')) {
                    return $next($request);
                }
            }
            return redirect('/');
        }
        

        // if (Auth::user()->roles()->name === 'Admin') {
        //     return $next($request);
        // }
        // return redirect('/');

    }
}
