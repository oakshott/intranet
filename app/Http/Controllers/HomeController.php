<?php namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Course;
use Auth;
use User;
use Request;
use Datatables;


class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth',['except' =>['messages','cover']]);
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()

	{
		//$upcomingCourses = \App\Course::all();
		//$previousCourses = Course::latest()->get();
		

		

		$check_LineManager = \DB::table('users')->where('id',Auth::User()->id)->pluck('isLineManager');

		$lineManagerReviews = Course::latest('created_at')->lineManagerReviews()->paginate(5);

		$upcomingCourses = Course::latest('created_at')->upcoming()->Paginate(5);
		//$previousCourses = \App\Course::where('startDate','<', $today)->get();
		$previousCourses = Course::latest('created_at')->previous()->Paginate(5);
	
	     return view('home')->with('upcomingCourses',$upcomingCourses)->with('previousCourses',$previousCourses)->with('check_LineManager',$check_LineManager)->with('lineManagerReviews',$lineManagerReviews);
		
	}

	public function homepage()
	{
		$check_LineManager = \DB::table('users')->where('id',Auth::User()->id)->pluck('isLineManager');
		$check_courseAdmin = \DB::table('users')->where('id',Auth::User()->id)->pluck('isCourseAdmin');
		return view('home.index')->with('check_LineManager',$check_LineManager)->with('check_courseAdmin',$check_courseAdmin);
	}

	public function getPreviousData()
	{
		$today = Carbon::now();
		$previousCourses = Course::select()->where('startDate','<', $today)->where('user_id','=',Auth::User()->id);
		
		return Datatables::of($previousCourses)
		->editColumn('startDate', function($data) {return $data->startDate->format('d/m/y');})
		->editColumn('deadline', function($data) {return $data->deadline->format('d/m/y');})
		->editColumn('approved','<span class="text-center {{$approved}}">{{$approved}}</span>')
		->addColumn('actions','<a href="{{URL::action(\'coursesController@index\')}}/{{$id}}/" class="review">Review</a> ')
		->make(true);
	}

	public function getUpcomingData()
	{
		$today = Carbon::now();
		$upcomingCourses = Course::select()->where('startDate','>', $today)->where('user_id','=',Auth::User()->id);
		return Datatables::of($upcomingCourses)
		->editColumn('startDate', function($data) {return $data->startDate->format('d/m/y');})
		->editColumn('deadline', function($data) {return $data->deadline->format('d/m/y');})
		->editColumn('approved','<span class="text center {{$approved}}">{{$approved}}</span>')
		->addColumn('actions','<a href="{{URL::action(\'coursesController@index\')}}/{{$id}}/" class="review">Review</a> <a href="{{URL::action(\'coursesController@index\')}}/{{$id}}/edit" class="edit">edit</a>')
		->make(true);
	}

	public function getLineManagerData()
	{
		$today = Carbon::now();
		$lineManagerReviews = Course::select('courses.id','users.firstName','users.lastName','courses.courseTitle','courses.startDate','courses.approved','courses.deadline')
		->where('lineManager','=',Auth::User()->id)->where('lineManagerApproved','=','unapproved')
		->join('users','courses.user_id','=','users.id');


		return Datatables::of($lineManagerReviews)
		->editColumn('startDate', function($data) {return $data->startDate->format('d/m/y');})
		->editColumn('deadline', function($data) {return $data->deadline->format('d/m/y');})
		->editColumn('approved','<span class="text center {{$approved}}">{{$approved}}</span>')
		->addColumn('actions','<a href="{{URL::action(\'coursesController@index\')}}/{{$id}}/" class="review">Review</a>')
		->make(true);
	}

	public function getUserData($id)
	{
		$today = Carbon::now();
		$userData = Course::select('users.id','courses.id','courses.user_id','courseTitle','startDate','approved','deadline')
		->where('users.id','=',$id)
		->join('users','courses.user_id','=','users.id');


		return Datatables::of($userData)
		->editColumn('startDate', function($data) {return $data->startDate->format('d/m/y');})
		->editColumn('deadline', function($data) {return $data->deadline->format('d/m/y');})
		->editColumn('approved','<span class="text center {{$approved}}">{{$approved}}</span>')
		->addColumn('actions','<a href="{{URL::action(\'coursesController@index\')}}/{{$id}}/" class="review">Review</a>')
		->make(true);
	}

	public function getCourseAdminData()
	{
		$today = Carbon::now();
		$courseAdmin = Course::select('courses.id','users.firstName','users.lastName','courses.courseTitle','courses.startDate','courses.approved','courses.deadline')
		->where('lineManagerApproved','=','approved')->where('approved','=','unapproved')
		->join('users','courses.user_id','=','users.id');


		return Datatables::of($courseAdmin)
		->editColumn('startDate', function($data) {return $data->startDate->format('d/m/y');})
		->editColumn('deadline', function($data) {return $data->deadline->format('d/m/y');})
		->editColumn('approved','<span class="text center {{$approved}}">{{$approved}}</span>')
		->addColumn('actions','<a href="{{URL::action(\'coursesController@index\')}}/{{$id}}/" class="review">Review</a>')
		->make(true);
	}


	public function messages()
	{
		return view('pages.messages');
	}

	public function cover()
	{
		return view('pages.cover');
	}

	public function courseAdmin()
	{
		$today= Carbon::now();
	
		$Courses = Course::select('courses.id','users.firstName','users.lastName','courses.courseTitle','courses.startDate','courses.endDate','courses.approved','courses.deadline')->where('approved','=','Approved')->where('endDate','>', $today)
		->join('users','courses.user_id','=','users.id')->get();
		return view('courseAdmin.index')->with('Courses',$Courses);
		
	}

}
