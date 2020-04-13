<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminLogginMiddleware
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

        return $next($request);
        // tạm thời bỏ đoạn dưới để check mấy cái linh tinh
        /*if(Auth::check()){
            $user = Auth::user();
            if($user->level == 1){
                return $next($request);
            }else{
                return redirect('dangnhap1');
            }
        }else{
            return redirect('dangnhap1');
        }*/
    }
}
