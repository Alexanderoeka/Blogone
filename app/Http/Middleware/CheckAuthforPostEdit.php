<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckAuthforPostEdit
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

       // if(isset(Auth::id()) && )
      // должны передаться сюда через route id поста -> далее от него находим юзера и сравниваем с настоящим юзером
      // если все совпадает, то переходим к редактированию, если же нет, то просто возвращяемся на страницу поста сообщая человеку что он пидор


        return $next($request);
    }
}
