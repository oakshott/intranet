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
				<div class="panel-heading"><h3>Admin Panel</h3></div>
				<div class="panel-body">
						<hr/>
					@include('admin.menu')
						<div class="row">
							<div class="panel large-12 column">
							<h4>Courses</h4>
								<table id="courses" class="table table-hover table-condensed">
		    						<thead>
		        							<tr>
									            <th class="col-md-3">{!! Lang::get('Course Title') !!}</th>
									            <th class="col-md-3">{!! Lang::get('Course Provider') !!}</th>
									            <th class="col-md-3">{!! Lang::get('Course Venue') !!}</th>
									            <th class="col-md-3">{{{ Lang::get('Cost') }}}</th>
									            <th class="col-md-3">{{{ Lang::get('Recommended') }}}</th>
		        							</tr>
		    					</thead>
							</table>
							</div>
						</div>
						
					
						<hr/>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('scripts')
<script>
$(document).ready(function() {	
    oTable = $('#courses').DataTable({
        "processing": false,
        "serverSide": false,
        "ajax": "/admin/courseData",
        "columns": [
            {data: 'courseTitle', name: 'courseTitle'}, 
            {data: 'courseProvider', name: 'courseProvider'}, 
            {data: 'courseVenue', name: 'courseVenue'}, 
            {data: 'courseFees', name: 'courseFees'}, 
        ]
    });

    $('div#alert-box').delay(3000).slideUp(300);
});
</script>
@endsection


