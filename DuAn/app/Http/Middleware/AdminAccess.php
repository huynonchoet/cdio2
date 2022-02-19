<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class AdminAccess
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
        //dd(Auth::user());
        if(Auth::check() && Auth::user()->level == 1){
            return $next($request);
        }
        dd("Bạn ko truy cập được trang web này");
        //return redirect()->route('login.member');
    }
}
