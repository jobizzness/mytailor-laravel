<?php

namespace MyTailor\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @param null $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {

        if (Auth::guard($guard)->guest() || ! $this->notAdmin()) {

            if ($request->ajax() || $request->wantsJson()) {
                return response('Unauthorized.', 401);

            }

            return redirect()->guest('/');
        }

        return $next($request);
    }

    /**
     * Check if user has access to admin area or nah.
     *
     * @return bool
     */
    private function notAdmin() {

        $user = Auth::user();

        if($user->hasRole(['owner', 'administrator'])) return true;

        return false;


    }
}
