<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Auth;

class Course extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'courses';

	protected $dates = ['startDate','endDate','deadline'];


	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['courseTitle','courseProvider','courseVenue','courseTelephone','courseEmail', 
						   'courseContact','courseNumber','startDate','endDate','duration','details',
						   'courseObjectives','courseFees','travelFees','deadline','lineManager','standards',
						   'approved','user_id','lineManagerComments','lineManagerApproved','courseAdminComments','recommended'];

	public function scopeUpcoming($query)
	{
		$today = Carbon::now();
		$query->where('startDate','>', $today)->where('user_id','=',Auth::User()->id);
	}

	public function scopePrevious($query)
	{
		$today = Carbon::now();
		$query->where('startDate','<', $today)->where('user_id','=',Auth::User()->id);
	}

	public function scopeLineManagerReviews($query)
	{
		$query->where('lineManager','=',Auth::User()->id)->where('lineManagerApproved','=','unapproved');
	}

	

	



	

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 *
	* protected $hidden = ['password', 'remember_token'];
	*/

}
