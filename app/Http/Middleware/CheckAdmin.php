<?php

namespace App\Http\Middleware;

use Closure;
use mysql_xdevapi\Session;

class CheckAdmin
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
        if (!auth()->user()->isAdmin()){
            Session()->flash('error','you dont have privilege to visit this page');
            return redirect()->back();
        }
        return $next($request);
    }
}
