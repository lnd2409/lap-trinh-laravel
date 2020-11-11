<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class CheckNhanVien
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
        if (Auth::guard('nhanvien')->check()) {
            # code...
            return $next($request);
        }
        //Chỗ này tùy theo route của mấy bạn tên gì
        #CHÍNH TẢ
        return redirect()->route('login-admin');
    }
}
