<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');

Route::get('home/previousData', 'HomeController@getPreviousData');

Route::get('home/upcomingData', 'HomeController@getUpcomingData');

Route::get('home/lineManagerData', 'HomeController@getLineManagerData');

Route::get('home/courseAdminData','HomeController@getCourseAdminData');

Route::get('home/userData/{id}','HomeController@getUserData');

Route::get('home/messages', 'HomeController@messages');

Route::get('home/cpd','Homecontroller@homepage');

Route::get('home/cover', 'HomeController@cover');

Route::get('home/courseAdmin','HomeController@courseAdmin');

Route::get('home', 'HomeController@homepage');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

//Route::get('courses','coursesController@index');

Route::get('courses/new','coursesController@create');

//Route::get('courses/{id}','coursesController@show');

Route::resource('courses', 'coursesController', array('except' => array('show','edit')));

Route::post('courses/update','coursesController@lineManagerComments');

Route::post('courses/adminUpdate','coursesController@courseAdminComments');

Route::post('courses/courseReview','coursesController@courseReview');

Route::get('courses/{id}/edit',['middleware' =>'user', 'uses'=> 'coursesController@edit']);

Route::get('courses/{id}',['middleware' =>'user', 'uses'=> 'coursesController@show']);

Route::get ('users/create','usersController@create');

Route::post('users/delete/{id}','usersController@destroy');

Route::post('users','usersController@store');

Route::get('users/import','usersController@import');

Route::post('users/import','usersController@importfile');

Route::get('users/{id}','usersController@show');

Route::get('users/{id}/edit','usersController@edit');

Route::get('admin/data','adminController@getData');

Route::get('admin/linemanagers', 'adminController@linemanagers');

Route::get('admin/linemanagerData', 'adminController@getLinemanagerData');

Route::get('admin/courseData','adminController@getCourseData');

Route::get('admin/courses','adminController@courses');

Route::get('admin/onsite','adminController@onSiteCourses');

Route::post('admin/onSiteStore','adminController@onSiteStore');

Route::get('onsitecourses','onSiteCoursesController@index');

Route::resource('admin', 'adminController');

Route::resource('users', 'usersController',array('except'=>array('create','store')));









