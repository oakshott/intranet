@extends('welcome')

@section('head')
<link href="/pickadate/css/classic.css" rel="stylesheet">
<link href="/pickadate/css/classic.date.css" rel="stylesheet">
<script src="/js/checkbox.js"></script>
@endsection

@section('content')
<div class="container-fluid">
	<div class="row">
			<div class="panel panel-default">
				<div class="panel-heading"><h3>Admin Panel</h3></div>
					<div class="panel-body">
						<hr>
					@include('admin.menu')
					</div>
		

						<div class="row">
							<div class="large-12 column">
							<div class="panel panel-default">
							<div class="panel-heading"><h3>On Site Courses</h3></div>
							<div class="panel-body">
							<div class="row">
							<div class="large-3 column ">
								<h6>1. Select Users</h6>
								<input class ="view" type="button" value="Select All" id="togglecheckbox" />
								<table>
								<thead>
									<tr><th>Select</th><th>First Name</th><th>Last Name</th><th>Department</th></tr>
								</thead>
								<tbody>
									{!! Form::open(['action'=>'adminController@onSiteStore']) !!}
									@foreach($users as $user)
									<tr><td><input type="checkbox" class="checkbox" name="users[{{$user->id}}]" id="{{$user->id}}" value="{{$user->id}}"/></td><td>{{$user->firstName}}</td><td>{{$user->lastName}}</td><td>{{$user->department}}</td></tr>
									@endforeach
								</tbody>
								</table>
							</div>

							<div class="large-7 column ">
							<div class="form-group">
						<div class="row">
							<div class="large-5 columns">
						{!!Form::label('Course title:')!!}
						{!!Form::text('courseTitle',null, ['class'=>'form-control','placeholder'=>'required'])!!}
						
							</div>
							</div>

					

					<div class="form-group">
						<div class="row">
							<div class="large-5 columns">
								{!!Form::label('Course Number')!!}
								{!!Form::text('courseNumber',null, ['class'=>'form-control','placeholder'=>'required'])!!}
							</div>
							<div class="large-7 columns">
								{!!Form::label('Course Contact')!!}
								{!!Form::text('courseContact',null, ['class'=>'form-control','placeholder'=>'required'])!!}
								
							</div>	
						</div>
					</div>

					<div class="form-group">
						<div class="row">
							<div class="large-4 columns">
								{!!Form::label('Start Date')!!}
								<input type="text" name="startDate" id="sDate"  placeholder='required' class="form-control" data-value="{{$course->startDate}}" >
							</div>
						
							<div class="large-4 columns">
								{!!Form::label('End Date')!!}	
								<input type="text" name="endDate" id="eDate" placeholder='required' class="form-control" data-value="{{$course->endDate}}" >
							</div>
							<div class="large-4 columns">
								{!!Form::label('Duration')!!}
								{!!Form::text('duration',null, ['class'=>'form-control','placeholder'=>'required'])!!}
							</div>		
						</div>
					</div>
					<div class="form-group">
						{!!Form::label('Course Details:')!!}
						{!!Form::textarea('details',null, ['class'=>'form-control','placeholder'=>'required'])!!}
					</div>
					<div class="form-group">
						{!!Form::label('Course Objectives:')!!}
						{!!Form::text('courseObjectives',null, ['class'=>'form-control','placeholder'=>'required'])!!}
					</div>
					<div class="form-group">
						{!!Form::label('Estimated Course Fees:')!!}
						{!!Form::text('courseFees',null, ['class'=>'form-control','placeholder'=>'required'])!!}
					</div>
					<div class="form-group">
						{!!Form::label('How will this raise standards at Beauchamps High School:')!!}
						{!!Form::textarea('standards',null, ['class'=>'form-control','placeholder'=>'required'])!!}
					</div>	
							{!!Form::submit('Add Course', ['class'=>'button form-control'])!!}
							{!! Form::close() !!}

							
						</div>
			</div>		
		</div>
	</div>
</div>
@endsection


@section('scripts')
<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="/pickadate/js/picker.js"></script>
<script src="/pickadate/js/picker.date.js"></script>
<script>
$(function() {
  // Enable Pickadate on an input field using a custom format for submitted value
  $('#sDate').pickadate({
    format: 'yyyy-mm-dd 00:00:00',
    formatSubmit : 'yyyy-mm-dd 00:00:00',
    hiddenName:false

  });
   $('#eDate').pickadate({
    format: 'yyyy-mm-dd 00:00:01',
    formatSubmit : 'yyyy-mm-dd 00:00:01',
    hiddenName:false
  });
    $('#deadline').pickadate({
    format: 'yyyy-mm-dd 23:59:00',
    formatSubmit : 'yyyy-mm-dd 23:59:00',
    hiddenName:false
  });
});   
</script>
@endsection