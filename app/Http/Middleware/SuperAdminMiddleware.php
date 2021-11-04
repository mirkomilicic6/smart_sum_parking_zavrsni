<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuperAdminMiddleware
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
        if(Auth::user()->user_type == 'super_admin') {

            return $next($request);
        }
       else {
           abort(403, 'Nemate ovlasti za izmjenu korisnika, molimo obratite se administratoru na admin@example.com!');
       }
    }
}
