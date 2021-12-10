<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
// Класс проверки на то, является ли он админом
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

        if (session()->get('admin')==null) {
            return redirect()->route('admin.login');
        }


        return $next($request);
    }
}
