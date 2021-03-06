<?php

namespace App\Http\Middleware;

use Closure;

class CheckAdminMiddleware
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
		if (session()->has('admin'))
		{
		return $next($request);
		}
		else {
		return redirect('/login')->with('pesan',"Maaf, silahkan login terlebih dahulu");
		}
    }
}
