<?php namespace App\Services;

use App\User;
use Validator;
use Illuminate\Contracts\Auth\Registrar as RegistrarContract;
use Mail;
use Request;

class Registrar implements RegistrarContract {

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function validator(array $data)
	{
		return Validator::make($data, [
			'firstName' => 'required|max:255|min:3',
			'lastName' => 'required|max:255|min:4',
			'department' => 'required|max:255|min:3',
			'isLineManager' => 'required|min:1|max:1',
			'email' => 'required|email|max:255|unique:users',
			'password' => 'required|confirmed|min:6',
		]);
	}

	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array  $data
	 * @return User
	 */
	public function create(array $data)
	{
		//Mail::send('emails.welcome', ['key' => 'value'], function($message)
		//{
    	//	$message->to(request::input('email'), request::input('firstName'))->subject('Welcome!');
		//});


		return User::create([
			'firstName' => $data['firstName'],
			'lastName' => $data['lastName'],
			'department' => $data['department'],
			'isLineManager' => $data['isLineManager'],
			'email' => $data['email'],
			'password' => bcrypt($data['password'])

		]);
	}

}
