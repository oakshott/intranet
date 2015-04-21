@extends('welcome')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading"><h3>Profile</h3></div>

				<div class="panel-body">
					@include('flash::message')
					<p><quote><strong>Name:</strong></quote> {{Auth::user()->firstName}} {{Auth::user()->lastName}}</p>
					<p><quote><strong>Department:</strong></quote> {{Auth::user()->department}}</p>
					<p><quote><strong>Email:</strong></quote> {{Auth::user()->email}}</p>
					<a href="{{URL::action('coursesController@create')}}" class="small button">Apply for a course</a>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading" id="upcoming-title" onclick="$('#upcoming').toggle('normal');"><h3>Upcoming Courses </h3></div>

				<div class="panel-body" id="upcoming">
					@if($upcomingCourses->isEmpty())
					<p>No courses to review</p>
					@else
					<table class="courseTable" align="center">
						<tr><th>Course Name</th><th>Course Date</th><th>Approval Status</th><th>Approval Deadline</th><th>Action</th></tr>
						@foreach($upcomingCourses as $upcomingCourse)
						<tr><th>{{$upcomingCourse->courseTitle}}</th><td>{{$upcomingCourse->startDate->diffForHumans()}}</td><td>@if($upcomingCourse->approved=="approved")<span ="center" class="approved text-center"> @else<span class="unapproved text-center"> @endif {{$upcomingCourse->approved}}</span></td><td>{{$upcomingCourse->deadline->format('d/m/y')}}</td><td><a class ="review" href="{{URL::action('coursesController@index')}}/{{$upcomingCourse->id}}">Review</a> <a class ="edit" href="{{URL::action('coursesController@index')}}/{{$upcomingCourse->id}}/edit">Edit</a></tr>
						@endforeach
					</table>
					@endif
				</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading" onclick="$('#previous').toggle('normal')"><h3>Previous Courses</h3></div>

				<div class="panel-body" id="previous">
					@if($previousCourses->isEmpty())
					<p>No courses to review</p>
					@else
					<table class="courseTable" align="center">
						<tr><th>Course Name</th><th>Course Date</th><th>Approval Status</th><th>Approval Deadline</th><th>Action</th></tr>
						@foreach($previousCourses as $previousCourse)
						<tr><th>{{$previousCourse->courseTitle}}</th><td>{{$previousCourse->startDate->diffForHumans()}}</td><td>@if($previousCourse->approved =='Unapproved')<span class="unapproved text-center">Unapproved</span>  @else <span class="approved text-center"> approved</span>@endif</td><td>{{$previousCourse->deadline->format('d/m/y')}}</td><td><a class ="review" href="{{URL::action('coursesController@index')}}/{{$previousCourse->id}}">Review</a></tr>
						@endforeach
					</table>
					<table align="center">
						<tr><td align="center">{!!$previousCourses->render()!!}</td></tr>
					</table>
					@endif
				</div>
			</div>
		</div>
	</div>

@if($check_LineManager != '0')
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading" onclick="$('#linemanagement').toggle('normal')"><h3>Line Management</h3></div>

				<div class="panel-body" id="linemanagement">
					@if($lineManagerReviews->isEmpty())
					<p>No courses to review</p>
					@else
					<table class="courseTable" align="center">
						<tr><th>Staff Name</th><th>Course</th><th>Course date</th><th>Approval Deadline</th><th>Action</th></tr>
					@foreach ($lineManagerReviews as $lineManagerReview)
						<tr><td>{{$lineManagerReview->User->firstName}} {{$lineManagerReview->User->lastName}}</td><td>{{$lineManagerReview->courseTitle}}</td><td>{{$lineManagerReview->startDate->format('d/m/y')}}</td><td>{{$lineManagerReview->deadline->diffForHumans()}}</td><td><a class ="tiny button" href="{{URL::action('coursesController@index')}}/{{$lineManagerReview->id}}">Review</a></td></tr>					
					@endforeach
					</table>
					@endif
				</div>
			</div>
		</div>
	</div>
</div>
@endif
@endsection



