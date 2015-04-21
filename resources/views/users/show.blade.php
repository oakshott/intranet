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
				<div class="panel-heading"><h3>{{$user->firstName}} {{$user->lastName}}</h3></div>
					<div class="panel-body">
						<hr>
						<span><strong>First Name: </strong>{{$user->firstName}}</span></p>	
						<span><strong>Last Name: </strong>{{$user->lastName}}</span></p>
						<span><strong>Department : </strong>{{$user->department}}</span></p>
						<span><strong>Email: </strong>{{$user->email}}</span></p>
					</div>
				</div>
			</div>

			<div class="panel panel-default">
				<div class="panel-heading"><h3>Course History</h3></div>
					<div class="panel-body">
						<hr>
						<table id="userData" class="table table-hover table-condensed">
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
	</div>


@endsection
@section('scripts')
<script>
$(document).ready(function() {
    oTable = $('#userData').DataTable({
        "processing": false,
        "serverSide": false,
        "ajax": "/home/userData/{{$user->id}}",
        "deferRender":true,
        "columns": [
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