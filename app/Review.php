<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model {

	//
	protected $fillable = ['course_id','review','recommend'];

	public function course()
	{
		return $this->belongsTo('App\Course');
	} 

}
