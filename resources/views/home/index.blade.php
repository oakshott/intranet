@extends('welcome')

@section('head')
<link rel="stylesheet" href="//cdn.datatables.net/responsive/1.0.4/css/dataTables.responsive.css">
<link rel="stylesheet" href="//cdn.datatables.net/plug-ins/f2c75b7247b/integration/foundation/dataTables.foundation.css">
<script src="//cdn.datatables.net/responsive/1.0.4/js/dataTables.responsive.js"></script>
<link rel="stylesheet" href="//cdn.datatables.net/plug-ins/f2c75b7247b/integration/foundation/dataTables.foundation.css">
<script src="//cdn.datatables.net/plug-ins/f2c75b7247b/integration/foundation/dataTables.foundation.js"></script>
@endsection

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
				<div class="panel-heading" id="upcoming-title" onclick="$('#upcoming-body').toggle('normal');"><h3>Upcoming Courses </h3></div>
				<hr/>
				<div class="panel-body" id="upcoming-body">
								<table id="upcoming" class="table table-hover table-condensed">
		    						<thead>
		        							<tr>
									            <th class="col-md-3">{!! Lang::get('Course Name') !!}</th>
									            <th class="col-md-3">{!! Lang::get('Course Date') !!}</th>
									            <th class="col-md-3">{{{ Lang::get('Approval Status') }}}</th>
									            <th class="col-md-3">{{{ Lang::get('Approval Deadline') }}}</th>
									            <th class="col-md-3">{{{ Lang::get('Actions') }}}</th>
		        							</tr>
		    						</thead>
								</table>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading" id="previous-title" onclick="$('#previous-body').toggle('normal');"><h3>Previous Courses</h3></div>
				<hr/>
				<div class="panel-body" id="previous-body">
								<table id="previous" class="table table-hover table-condensed">
		    						<thead>
		        							<tr>
									            <th class="col-md-3">{!! Lang::get('Course Name') !!}</th>
									            <th class="col-md-3">{!! Lang::get('Course Date') !!}</th>
									            <th class="col-md-3">{{{ Lang::get('Approval Status') }}}</th>
									            <th class="col-md-3">{{{ Lang::get('Approval Deadline') }}}</th>
									            <th class="col-md-3">{{{ Lang::get('Actions') }}}</th>
									        
		        							</tr>
		    					</thead>
							</table>
							</div>
						</div>
					</div>
				</div>
						
@if($check_LineManager != '0')
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading" onclick="$('#linemanagement').toggle('normal')"><h3>Line Management</h3></div>
				<hr/>
				<div class="panel-body" id="linemanagement">
					<table id="lineManager" class="table table-hover table-condensed">
		    						<thead>
		        							<tr>
		        								<th class="col-md-3">{!! Lang::get('First Name') !!}</th>
									            <th class="col-md-3">{!! Lang::get('Last Name') !!}</th>
									           <th class="col-md-3">{!! Lang::get('Course Name') !!}</th>
									            <th class="col-md-3">{!! Lang::get('Course Date') !!}</th>
									            <th class="col-md-3">{{{ Lang::get('Approval Status') }}}</th>
									            <th class="col-md-3">{{{ Lang::get('Approval Deadline') }}}</th>
									            <th class="col-md-3">{{{ Lang::get('Actions') }}}</th>
		        							</tr>
		    					</thead>
				</div>
			</div>
		</div>
	</div>
</div>
@endif
@endsection

@section('scripts')
<script>
$(document).ready(function() {
  
      oTable = $('#previous').DataTable({
      	responsive: true,
        "processing": false,
        "serverSide": false,
        "searching":false,
        "lengthChange":false,
        "pageLength":5,
        "ajax": "/home/previousData",
        "columns": [
            {data: 'courseTitle', name: 'courseTitle'},
            {data: 'startDate', name: 'startDate'},
            {data: 'approved', name: 'approved'},
            {data: 'deadline', name: 'deadline'},
            {data: 'actions', name: 'action'},
        ]
    });

      oTable = $('#upcoming').DataTable({
      	responsive: true,
        "processing": false,
        "serverSide": false,
        "searching":false,
        "lengthChange":false,
        "pageLength":5,

        "ajax": "/home/upcomingData",
        "columns": [
            {data: 'courseTitle', name: 'courseTitle'},
            {data: 'startDate', name: 'startDate'},
            {data: 'approved', name: 'approved'},
            {data: 'deadline', name: 'deadline'},
            {data: 'actions', name: 'action'},   
        ]
    });

       oTable = $('#lineManager').DataTable({
      	responsive: true,
        "processing": true,
        "serverSide": true,
        "searching":false,
        "lengthChange":false,
        "pageLength":5,

        "ajax": "/home/lineManagerData",
        "columns": [
        	{data: 'firstName', name: 'firstName'},
        	{data: 'lastName', name: 'lastName'},
             {data: 'courseTitle', name: 'courseTitle'},
            {data: 'startDate', name: 'startDate'},
            {data: 'approved', name: 'approved'},
            {data: 'deadline', name: 'deadline'}, 
            {data: 'actions', name: 'action'}, 

        ]
    });
});
</script>
@endsection