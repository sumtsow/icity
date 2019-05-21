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
        $locale = app()->getLocale();
        $crypted = $request->cookie('locale');
        if(isset($crypted)) {
            $locale = \Crypt::decryptString($crypted);
        }
        if (in_array($locale, config('app.locales'))) {
            app()->setLocale($locale);
        }
        setlocale(LC_ALL, config('app.timeformat')[$locale]);
        return $next($request);
    }
}
