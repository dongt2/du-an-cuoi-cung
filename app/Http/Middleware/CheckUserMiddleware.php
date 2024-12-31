<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // Kiểm tra người dùng đã đăng nhập chưa
        if (!$request->user()) {
            return redirect()->route('login.index')->with('messageError', 'Bạn cần đăng nhập để truy cập trang này.');
        }

        return $next($request);
    }
}
