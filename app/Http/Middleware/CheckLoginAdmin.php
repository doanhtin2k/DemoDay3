<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class CheckLoginAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::guard("admin")->check())
        {
            return $next($request);
        }
        return redirect()->route("form.login.admin");
    }
}
