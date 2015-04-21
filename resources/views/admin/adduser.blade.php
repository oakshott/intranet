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
								<div class="panel-heading"><h4>Add User</h4></div>
				<hr/>
				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> There were some problems with your input.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

					{!! Form::open( ['method' => 'POST' , 'action' => ['usersController@store']]) !!}
						@include('forms.user')

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									Add User
								</button>
							</div>
						</div>
					{!! Form::close() !!}
				</div>
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
        "ajax": "/admin/linemanagerData",
        "columns": [
            {data: 'id', name: 'id'},
            {data: 'user_id', name: 'user_id'},
            {data: 'courseTitle', name: 'courseTitle'},     
        ]
    });

    $('div#alert-box').delay(3000).slideUp(300);
});
</script>
@endsection


