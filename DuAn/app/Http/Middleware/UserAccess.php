<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class UserAccess
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
        if(Auth::check() && Auth::user()->level == 0 ){
            return $next($request);
        }
        if(!Auth::check()){
            return redirect()->route('login.member');
        }
        dd("Bạn không có quyền truy cập trang web này");
    }
}
