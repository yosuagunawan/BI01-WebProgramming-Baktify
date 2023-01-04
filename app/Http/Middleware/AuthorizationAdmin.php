<?php

namespace App\Http\Middleware;

use App\Http\Controllers\UserRoleController;
use Closure;
use Illuminate\Http\Request;

class AuthorizationAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $admin_role = UserRoleController::get_role_by_name('admin');
        if (auth()->user() != null) {
            if (auth()->user()->role_id != $admin_role->id) {
                return redirect('/');
            } else {
                return $next($request);
            }
        } else {
            return redirect('sign_in');
        }
    }
}
