<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\User;
use Redirect;
use Auth;
use Input;
use Excel;
use File;


class usersController extends Controller {

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
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$user= new user;
		return view('admin.adduser');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Requests\CreateUserRequest $request)
	{
		$user = User::create([
			'firstName' => $request['firstName'],
			'lastName' => $request['lastName'],
			'department' => $request['department'],
			'isLineManager' => $request['isLineManager'],
			'isAdmin'=>$request['isAdmin'] or '0',
			'isCourseAdmin'=>$request['isCourseAdmin'] or '0',
			'email' => $request['email'],
			'password' => bcrypt($request['password'])

		]);

		flash()->success('User added successfully');

		Return Redirect('/admin');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$user = User::findOrFail($id);
		return view('users.show', compact ('user'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$user = User::findOrFail($id);
		return view('users.edit')->with('user',$user);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id,Requests\CreateUserRequest $request)
	{
		$user = User::findOrFail($id);

		$user->update($request->all());

		flash()->success('User updated successfully');
		
		Return Redirect('admin');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		User::destroy($id);
		flash()->success('User has been deleted successfully');
		return Redirect('admin');
	}

	public function import()
	{
		return view('users.import');
	}

	public function importfile(Request $request)
	{
		$path = storage_path();
		$file = array('image' => Input::file('image'));

		$extension = Input::file('file')->getClientOriginalExtension();
		$filename = rand(11111,99999).'.'.$extension;
		Input::file('file')->move($path,$filename);

		$excelpath='/storage/'.$filename;

		$results = Excel::load($excelpath)->get();

		$errors = array();

		foreach ($results as $row){

	

			$exists = User::where('email','=',$row->email)->first();
			
			if($exists == null){
				USER::create([
				'firstName' => $row->firstname,
				'lastName' => $row->lastname,
				'department' => $row->department,
				'isLineManager' => $row->islinemanager,
				'isAdmin' => $row->isadmin,
				'isCourseAdmin'=> $row->iscourseadmin,
				'email' => $row->email,
				'password' => bcrypt($row->password)]);
				flash()->success('file has been uploaded successfully');
			}
			else{
				$errors[] = $row->email.' is a duplicate user. Please remove from Excel file and try again.';
			

				flash()->error('There are duplicate users please see below for details.');
			}

		}
			

			$errors = new \Illuminate\support\collection($errors);

			file::delete(storage_path().$filename);

			return view('admin.index')->with('errors',$errors);
				
	}
		
	}




/*if (User::select()->where('email','=',$row->email)->count() = 0)
			{
			USER::create([
				'firstName' => $row->firstname,
				'lastName' => $row->lastname,
				'department' => $row->department,
				'isLineManager' => $row->islinemanager,
				'isAdmin' => $row->isadmin,
				'isCourseAdmin'=> $row->iscourseadmin,
				'email' => $row->email,
				'password' => bcrypt($row->password)]);
			flash()->success('file has been uploaded successfully');
			}
			else
			{
			
   			}