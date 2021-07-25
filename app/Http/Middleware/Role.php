<?php

namespace App\Http\Middleware;

use Closure;

class Role
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
        $roles = $this->CekRoute($request->route());

        if(\App\Role::isRole($roles))
        {
            return $next($request);
        }
        return abort(401, 'Maaf, anda tidak diizinkan mengakses halaman ini.');
    }

    private function CekRoute($route)
    {
        $actions = $route->getAction();
        return isset($actions['role']) ? $actions['role'] : null;
    }
}
