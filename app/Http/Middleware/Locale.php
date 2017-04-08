<?php

namespace App\Http\Middleware;

use Closure;

class Locale
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
        if( ! session()->has('locale') ) {
            session(['locale' => 'en']);
        }

        app()->setLocale(session('locale'));
        config(['translatable.locale' => session('locale')]);

        return $next($request);
    }
}