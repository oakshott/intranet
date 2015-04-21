@extends('welcome')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Update User</div>
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

					{!! Form::model($user, ['method' => 'PATCH' , 'action' => ['usersController@update', $user->id]]) !!}
						
						<div class="form-group">
							{!!Form::label('First Name:')!!}
							<div class="col-md-6">
								{!!Form::text('firstName',null, ['class'=>'form-control','placeholder'=>'required'])!!}	
							</div>
						</div>

						<div class="form-group">
							{!!Form::label('Last Name:')!!}
							<div class="col-md-6">
								{!!Form::text('lastName',null, ['class'=>'form-control','placeholder'=>'required'])!!}	
							</div>
						</div>


						<div class="form-group">
							{!!Form::label('Department:')!!}
							<div class="col-md-6">
								{!!Form::text('department',null, ['class'=>'form-control','placeholder'=>'required'])!!}	
							</div>
						</div>


						<div class="form-group">
							{!!Form::label('E-mail Address:')!!}
							<div class="col-md-6">
								{!!Form::text('email',null, ['class'=>'form-control','placeholder'=>'required'])!!}	
							</div>
						</div>

						<div class="form-group">
							{!!Form::label('is the user a Linemanager?:')!!}
							<div class="col-md-6">
								{!!Form::select('isLineManager', array('1' => 'Yes', '0' => 'No'))!!}
							</div>
						</div>

						@if(Auth::Guest())
						
						@elseif(Auth::User()->isAdmin == '1')
						<div class="form-group">
							{!!Form::label('is the user an Admin User?:')!!}
							<div class="col-md-6">
								{!!Form::select('isAdmin', array('1' => 'Yes', '0' => 'No'))!!}
							</div>
						</div>

						<div class="form-group">
							{!!Form::label('is the user a Course Administrator?:')!!}
							<div class="col-md-6">
								{!!Form::select('isCourseAdmin', array('1' => 'Yes', '0' => 'No'))!!}
							</div>
						</div>
						@endif
					
					
						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									Update
								</button>
							</div>
						</div>

					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection