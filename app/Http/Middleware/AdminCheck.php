<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!session()->has('loggedUser') && ($request->path() != 'admin/login' && $request->path() != 'admin/register' )) {
            return redirect(route('login'))->with('fail', 'Giriş yapmadan bu sayfayı göremezsiniz!');
        }

        if (session()->has('loggedUser') && ($request->path() == 'admin/login' || $request->path() == 'admin/register' )) {
            return back();
        }
        return $next($request)->header('Cache-Control','nocache, no-store, max-age=0, must-revalidate')
                              ->header('Pragma','no-cache')
                              ->header('Expires','Sun, 02 Jan 1990 00:00:00 GMT');
    }
}
