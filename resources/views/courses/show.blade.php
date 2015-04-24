@extends('welcome')
@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading"><h3>{{$course->courseTitle}}</h3></div>
					<div class="panel-body">
						<hr>
						<span><strong>Course Provider: </strong>{{$course->courseProvider}}</span></p>	
						<span><strong>Course Venue: </strong>{{$course->courseVenue}}</span></p>
						<span><strong>Course Telehone Number : </strong>{{$course->courseTelephone}}</span></p>
						<span><strong>Course Email: </strong>{{$course->courseEmail}}</span></p>
						<span><strong>Course Contact: </strong>{{$course->courseContact}}</span></p>
						<span><strong>Course Number: </strong>{{$course->courseNumber}}</span></p>
						<span><strong>Start Date: </strong>{{$course->startDate->format('d/m/y')}}</span></p>
						<span><strong>End Date: </strong>{{$course->endDate->format('d/m/y')}}</span></p>
						<span><strong>Duration: </strong>{{$course->duration}}</span></p>
						<span><strong>Details: </strong></br>{{$course->details}}</span></p>
						<span><strong>Objectives: </strong>{{$course->courseObjectives}}</span></p>
						<span><strong>Course Fees: </strong>£{{$course->courseFees}}</span></p>
						<span><strong>Travel Fees: </strong>£{{$course->travelFees}}</span></p>
						<span><strong>Deadline: </strong>{{$course->deadline->format('d/m/y')}}</span></p>
						<span><strong>How will this raise standards at Beauchamps High School: </strong></br>{{$course->standards}}</span></p>
						@if(!empty($review->review))
						<span><strong>Course Review: </strong></br>{{$review->review}}</span></p>
						@endif
						@if(!empty($course->lineManagerComments))
						<span><strong>Linemanager Comments: </strong></br>{{$course->lineManagerComments}}</span></p>
						@endif
						@if(!empty($course->courseAdminComments))
						<span><strong>Course Admin Comments: </strong></br>{{$course->courseAdminComments}}</span></p>
					    @endif
					    
			



					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@if($course->lineManager == Auth::User()->id)
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading"><h3>Line Managment</h3></div>
					<div class="panel-body">
						<hr>
							{!! Form::open(array('action'=>'coursesController@lineManagerComments')) !!}
							@include('forms.lineManagerComments')
        					<div class="form-group">
           						 {!!Form::submit('Update Course', ['class'=>'button form-control'])!!}
          					</div>
        				{!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>
	</div>

@endif

@if($reviewable == '1')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading"><h3>Course Review</h3></div>
					<div class="panel-body">
						<hr>
							{!! Form::open(array('action'=>'coursesController@courseReview')) !!}
							@include('forms.courseReview')
        					<div class="form-group">
           						 {!!Form::submit('Submit Review', ['class'=>'button form-control'])!!}
          					</div>
        				{!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>
	</div>
The review goes here.
@endif

@if(Auth::User()->isCourseAdmin == 1 AND $course->lineManagerApproved == 'Approved' AND $course->approved !== 'Approved')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading"><h3>Course Admin</h3></div>
					<div class="panel-body">
						<hr>
					<div class="info">
						<h5> Other approved training taking place on this day.</h5>
						@foreach($coursesOnDate as $courseOnDate)
						<span>{{$courseOnDate->firstName}} {{$courseOnDate->lastName}} ({{$courseOnDate->department}}) - {{$courseOnDate->courseTitle}} </span><br />
						@endforeach
					</div>


							{!! Form::open(array('action'=>'coursesController@courseAdminComments')) !!}
							@include('forms.courseAdminComments')
        					<div class="form-group">
           						 {!!Form::submit('Update Course', ['class'=>'button form-control'])!!}
          					</div>
        				{!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>
	</div>

@endif
@endsection