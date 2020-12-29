<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Session;


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
        $role = $this->CekRoute($request->route());
        
        if($request->user()->hasRole($role) || !$role)
        {
            return $next($request);
        }
        return abort(503, 'Anda tidak memiliki hak akses');
    }
}
