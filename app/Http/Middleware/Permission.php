<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Permission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $permission)
    {        
        $routepermission = [];

        if(Auth::user())
        {
            foreach(Auth::user()->group[0]['permission'] as $value)
            {
                $routepermission[] = $value->name;
            }

            if(!in_array($permission, $routepermission))
            {
                return redirect()->route('admin.home')->withFlashDanger(trans('auth.general_error'));
            }

            return $next($request);
        } else {
            return redirect()->guest('login');
        }
    }
}
