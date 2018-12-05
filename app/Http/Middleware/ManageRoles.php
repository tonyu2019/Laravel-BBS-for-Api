<?php

namespace App\Http\Middleware;

use Closure;

class ManageRoles
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
        return \Auth::user()->can('manage_roles') ? $next($request) : abort(403, '你没有该权限');;
    }
}
