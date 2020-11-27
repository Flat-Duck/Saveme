<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class CheckClink
{
    /**
     * * Handle an incoming request.
     *
    * @param  \Illuminate\Http\Request  $request
    * @param  \Closure  $next
    * @return mixed
    */
    public function handle($request, Closure $next)
    {
        if (Auth::guard('admin')->user()->clink !=null ) 
        {
            return $next($request);
        }
        return redirect('/admin/dashboard');
    }

}