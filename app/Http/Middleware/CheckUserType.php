<?php

namespace App\Http\Middleware;

use Closure;

class checkUserType
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
        $user = auth()->user();

        if($user->user_type == 'Admin' && ! $request->is('Admin*')){
            return redirect('/home');
        } else if($user->user_type == 'Receptionist' && ! $request->is('Receptionist*')){
            return redirect('service');
        }

        return $next($request);
    }
}
