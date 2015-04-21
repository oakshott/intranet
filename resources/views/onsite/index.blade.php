@extends('welcome')
@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				@include('errors.list')
				@include('flash::message')
				<div class="panel-heading"><h3>On Site Course</h3></div>
				<div class="panel-body">
						<hr/>
					@include('admin.menu')
						<div class="row">
							<div class="panel large-12 column">
							<h4>Select Users</h4>
								<hr/>
								<input type="button" class="check" value="check all" />
								<table>
								@foreach($users as $user)
								
								<tr><td> <input type="checkbox" class="cb-element"/> </td><td>{!!$user->firstName!!}</td><td>{!!$user->lastName!!}</td></tr>
								
								@endforeach
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

@endsection