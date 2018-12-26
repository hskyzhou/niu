<?php

namespace App\Http\Middleware;

use Closure;
use App;

class LanguagePackageMiddleware
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
        $language = session('language') ?: 'zh';

        App::setLocale($language);

        return $next($request);
    }
}
