<?php namespace App\Http\Middleware;

use Closure;
use Auth;
use Redirect;
use Flash;

class RedirectIfNotUser {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		$getLineManager = \DB::table('courses')->where('id',$request->id)->pluck('LineManager');
		if(Auth::user()->courses()->find($request->id) OR Auth::user()->id == $getLineManager OR Auth::user()->isCourseAdmin == 1){
			
			return $next($request);
			
		}
		flash()->warning('You do not have permission to do this!');
		Return redirect('home'); 
		
	}

}
