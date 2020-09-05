<?php

namespace App\Http\Middleware;

use App;
use Closure;

class SetLanguage
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
        $lang = is_null($request->cookie('lang')) ? config('app.locale') : $request->cookie('lang');
        
        App::setLocale($lang);

        return $next($request);
    }
}
