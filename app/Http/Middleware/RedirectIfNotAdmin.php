<?php namespace App\Http\Middleware;

use Closure;
use Auth;
use Redirect;
use Flash;

class RedirectIfNotAdmin {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		if(Auth::User()['isAdmin'] == '1'){
		return $next($request);
		}

		flash()->warning('You do not have permission to do this!');
		Return redirect('home'); 
	}
}
