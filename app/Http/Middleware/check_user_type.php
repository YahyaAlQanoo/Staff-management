<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class check_user_type
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
        $user = $request->user();
        if(!$user) {
            return redirect()->route('login');
        }
        if($user->is_employee == 1 || $user->is_hr == 1	) {
            abort(403);
        }


        return $next($request);
    }
}
