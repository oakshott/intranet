<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Course;
use Auth;
use App\User;
use App\Review;
use Request;
use Carbon\Carbon;
use Mail;
use Flash;



class coursesController extends Controller {


	public function __construct()
	{
		$this->middleware('auth');
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('courses.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
     

        $lineManagers = User::select(\DB::raw('concat (firstName," ",lastName) as full_name,id'))->where('isLineManager','=','1')->lists('full_name', 'id');

       	$course = new Course;	
		
		return view('courses/new')->with('lineManagers',$lineManagers)->with('course',$course);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Requests\CreateCourseRequest $request)
	{
	
		$input = new Course($request->all());

		$input['lineManagerApproved'] = "Unapproved";
		$input['approved'] = "Unapproved"; 
		$input['recommended'] = "0"; 

		Auth::user()->courses()->save($input);

		    $linemanageremail = \DB::table('users')->where('id','=',Request::input('lineManager'))->pluck('email');
			$query = User::select(\DB::raw('concat (firstName," ",lastName) as full_name,id'))->where('id','=',Request::input('lineManager'))->first();
			$linemanagername = $query['full_name'];

			$data = array( 'email'=>$linemanageremail, 'toName'=>$linemanagername, 'firstName' => Auth::user()
                ->firstName, 'lastName' => Auth::user()->lastName, 'courseName' => $input['courseTitle']);

		Mail::send('emails.newapplication', $data, function($message) use ($data)
		{
			
    		$message->to($data['email'], $data['toName'])->subject('New Course Application');
		});

		flash()->success('Your course has been added successfully');

		//Return $input;

		Return redirect('home');

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$course = Course::findOrFail($id);

		$today = carbon::now();

		$exists = Review::where('id','=',$id)->first();

		$reviewableDate = $course->endDate->addDays(5);

		$review = course::find($id)->review;

		if ($today > $reviewableDate AND $exists == null){
			$reviewable = '1';
		}
		else
		{
			$reviewable = '0';
		}


		$startDate = $course['startDate'];

		$coursesOnDate = Course::Select()

		->where('startDate','=',$startDate)
		->where('approved','=','Approved')
		->join('users','courses.user_id','=','users.id')
		->get();

		return view('courses.show')
			   ->with('course',$course)
			   ->with('reviewable',$reviewable)
			   ->with('coursesOnDate',$coursesOnDate)
			   ->with('review',$review);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{

		$lineManagers = User::select(\DB::raw('concat (firstName," ",lastName) as full_name,id'))->where('isLineManager','=','1')->lists('full_name', 'id');

		$course = Course::findOrFail($id);

		$startDateFormat = $course['startDate']->format('Y-m-d H:i:s');

		

		//return $startDateFormat;

		return view ('courses.edit')->with('course',$course)->with('lineManagers',$lineManagers)->with('startDateFormat',$startDateFormat);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id,Requests\CreateCourseRequest $request)
	{
		$course = Course::findOrFail($id);

		$course->update($request->all());

		Return Redirect('home');

	}

	public function lineManagerComments(Requests\CreateLineManagerReviewRequest $request)
	{
		$id = Request::input('id');

		$course = Course::findOrFail($id);

		$course->update($request->all());

		flash()->success('Comments submitted successfully');

		$data = array( 'email'=>'cpdadmin@beauchamps.essex.sch.uk', 'toName'=>'Admin', 'firstName' => Auth::user()->firstName, 'lastName' => Auth::user()->lastName, 'courseName' => $course['courseTitle']);

		//Mail::send('emails.linemanagercomments', $data, function($message) use ($data)
		//{
			
    	//	$message->to($data['email'], $data['toName'])->subject('New Course Application');
		//});

		Return Redirect('home');
		
	}

		public function courseAdminComments(Requests\CreateAdminReviewRequest $request)
	{
		$id = Request::input('id');

		$course = Course::findOrFail($id);

	    $course->update($request->all());

	    flash()->success('Comments submitted successfully');

		$data = array( 'email'=>'cpdadmin@beauchamps.essex.sch.uk', 'toName'=>'Admin', 'firstName' => Auth::user()->firstName, 'lastName' => Auth::user()->lastName, 'courseName' => $course['courseTitle']);

		//Mail::send('emails.linemanagercomments', $data, function($message) use ($data)
		//{
			
    	//	$message->to($data['email'], $data['toName'])->subject('New Course Application');
		//});

		Return Redirect('home');
		
	}

	public function courseReview(Requests\CreateReviewRequest $request)
	{
		$id = Request::input('id');

		$course = course::findOrFail($id);

		$review = new Review($request->all());

		$review['course_id'] = $id;

		$course->review()->save($review);

		flash()->success('Review submitted successfully');

		Return Redirect('home');
	}
	
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
