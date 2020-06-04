<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        $user = $request->user();

        if (! $user->hasRole($role) ){
            echo "No está autorizado para realizar la operación";
            exit();
        }
        return $next($request);
    }
}
