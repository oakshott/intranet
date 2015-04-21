@extends('welcome')

@section('head')
<link rel="stylesheet" href="//cdn.datatables.net/responsive/1.0.4/css/dataTables.responsive.css">
<link rel="stylesheet" href="//cdn.datatables.net/plug-ins/f2c75b7247b/integration/foundation/dataTables.foundation.css">
<script src="//cdn.datatables.net/responsive/1.0.4/js/dataTables.responsive.js"></script>
<link rel="stylesheet" href="//cdn.datatables.net/plug-ins/f2c75b7247b/integration/foundation/dataTables.foundation.css">
<script src="//cdn.datatables.net/plug-ins/f2c75b7247b/integration/foundation/dataTables.foundation.js"></script>
@endsection
@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				@include('flash::message')
				@include('errors.list')
				<div class="panel-heading"><h3>Course Admin Panel</h3></div>
				<div class="panel-body">
						<hr/>
						<div class="row">
							<div class="panel large-12 column">


							<h4>Courses for Admin Approval</h4>
 								<table id="courseAdminData" class="table table-hover table-condensed">
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
							</table>
							</div>
						</div>

						<hr/>

						<div class="row">
							<div class="panel large-12 column">


							<h4>Approved Courses</h4>
							<table class="courseTable" align="center" style="width:80%;">
							<tr><th>First Name</th><th>Last Name</th><th>Course Title</th><th>Start Date</th><th>End Date</th></tr>
							@foreach($Courses as $Course)
 							<tr><td>{{$Course->firstName}}</td><td>{{$Course->lastName}}</td><td>{{$Course->courseTitle}}</td><td>{{$Course->startDate->format('d/m/y')}}</td><td>{{$Course->endDate->format('d/m/y')}}</td></tr>
 							@endforeach
 							</table>
							</div>
						</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('scripts')
<script>
$(document).ready(function() {
    oTable = $('#courseAdminData').DataTable({
        "processing": false,
        "serverSide": false,
        "ajax": "/home/courseAdminData",
        "deferRender":true,
        "columns": [
        	{data:'firstName', name:'firstName'},
        	{data:'lastName', name:'lastName'},
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