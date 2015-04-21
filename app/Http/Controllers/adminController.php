<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\User;
use Datatables;
use App\Course;
use Auth;
use Carbon\Carbon;
use DB;

class adminController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function __construct()
	{
		$this->middleware('admin');
	}
	public function index()
	{
		$error = array();
		Return view('admin.index')->with('error',$error);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
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

	public function getData()
	{
		$users = User::select(array('id','firstName','lastName','created_at','email','department'));
		
     	return Datatables::of($users)
     	->addColumn('actions', '<a href="{{URL::action(\'usersController@index\')}}/{{$id}}" class="view">view</a> <a href="{{URL::action(\'usersController@index\')}}/{{$id}}/edit" class="edit">edit</a>
     		<form method = "POST" onsubmit="return confirm(\'Are you sure you want to delete this user and all their course data?\')" action="/users/delete/{{$id}}">
     	<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
     	<input type="hidden" name="id" value="{{$id}}" />
     	<button type="submit" class="delete">delete</button>
     	</form>
		')
     	->addColumn('ChangePassword', 
     	'<form method = "POST" action="/password/email">
     	<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
     	<input type="hidden" name="email" value="{{$email}}">
     	<button type="submit" class="password">send reset email</button>
     	</form>
     	')->make(true);
     }

	public function getCourseData()
	{
		$course = Course::select(array('id','user_id','courseTitle','courseVenue','courseProvider','courseFees','recommended'));
		
     	return Datatables::of($course)->make(true);
	}



	public function getLinemanagerData()
	{
		$linemanagers = User::select(array('id','firstName','lastName','created_at','email','department'))->where('isLinemanager','=','1');
		
     	return Datatables::of($linemanagers)
     	->addColumn('actions', '<a href="{{URL::action(\'usersController@index\')}}/{{$id}}/edit" class="edit">edit</a>

     	<form method = "POST" onsubmit="return confirm(\'Are you sure you want to delete this user and all their course data?\')" action="/users/delete/{{$id}}">
     	<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
     	<input type="hidden" name="id" value="{{$id}}" />
     	<button type="submit" class="delete">delete</button>
     	</form>
		')    	

     	->addColumn('ChangePassword', 
     	'<form method = "POST" action="/password/email">
     	<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
     	<input type="hidden" name="email" value="{{$email}}">
     	<button type="submit" class="password">send reset email</button>
     	</form>
     	')->make(true);
	}

	public function linemanagers()
	{
     	return view('admin.linemanagers');
	}

	public function courses()
	{
     	return view('admin.courses');
	}

	public function onSiteCourses()
	{
		$users = User::where('email','!=','administrator@beauchamps.essex.sch.uk')->get();

		$course = new Course;

		$lineManagers = User::select(\DB::raw('concat (firstName," ",lastName) as full_name,id'))->where('isLineManager','=','1')->lists('full_name', 'id');


		return view('admin.onsite')->with('users',$users)->with('course',$course)->with('lineManagers',$lineManagers);
	}

	public function onSiteStore(Request $request)
	{
		$users_checked = $request->get('users', []);

		$input = new Course($request->all());


		foreach ($users_checked as $user_checked) {

			$input = new Course($request->all());

			$input['courseProvider'] = 'Beauchamps High School';

			$input['courseVenue'] = 'Beauchamps High School, Beauchamps Drive, Wickford, Essex, SS11 8LY';

			$input['courseTelephone'] = '01268735466';

			$input['courseEmail'] = 'mainoffice@beauchamps.essex.sch.uk';

			$input['deadline'] = Carbon::now();

			$input['approved'] = 'Approved';

			$input['travelFees'] = '0';

			$input['lineManagerApproved'] = 'Approved';

			$input['lineManagerComments'] = 'On Site Course';

			$input['courseAdminComments'] = 'On Site Course';

			$input['user_id']=$user_checked;

			$input->save();
           			
		}

		
		Return redirect('home');
	}

}
