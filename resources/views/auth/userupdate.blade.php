@extends('welcome')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Register</div>
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

					{!! Form::model($course, ['method' => 'PATCH' , 'action' => ['usersController@update', $user->id]]) !!}
						
						<div class="form-group">
							{!!Form::label('First Name:')!!}
							<div class="col-md-6">
								{!!Form::textarea('firstName',null, ['class'=>'form-control','placeholder'=>'required'])!!}	
							</div>
						</div>

						<div class="form-group">
							{!!Form::label('Last Name:')!!}
							<div class="col-md-6">
								{!!Form::textarea('lastName',null, ['class'=>'form-control','placeholder'=>'required'])!!}	
							</div>
						</div>


						<div class="form-group">
							{!!Form::label('Department:')!!}
							<div class="col-md-6">
								{!!Form::textarea('department',null, ['class'=>'form-control','placeholder'=>'required'])!!}	
							</div>
						</div>


						<div class="form-group">
							{!!Form::label('E-mail Address:')!!}
							<div class="col-md-6">
								{!!Form::textarea('email',null, ['class'=>'form-control','placeholder'=>'required'])!!}	
							</div>
						</div>

					
					{!! Form::close() !!}
						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									Update
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection