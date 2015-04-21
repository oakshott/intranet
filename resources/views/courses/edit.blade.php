@extends('welcome')
@section('head')
<link href="/pickadate/css/classic.css" rel="stylesheet">
<link href="/pickadate/css/classic.date.css" rel="stylesheet">
@endsection


@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading"><h3>Edit Course</h3></div>
				<div class="panel-body">
				@include('errors.list')
				<hr/>
        {!! Form::model($course, ['method' => 'PATCH' , 'action' => ['coursesController@update', $course->id]]) !!}
				@include('forms.course',[
        'startDate' => '$startDateFormat',
        'endDate' => '$course->endDate',
        'deadline' => '$course->deadline'
        ])
        <div class="form-group">
            {!!Form::submit('Update Course', ['class'=>'button form-control'])!!}

          </div>
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
  $('#startDate').pickadate({
    format: 'd mmmm, yyyy',
    formatSubmit : 'yyyy-mm-dd 00:00:00',
    hiddenName:true

  });
   $('#endDate').pickadate({
    format: 'd mmmm, yyyy',
    formatSubmit : 'yyyy-mm-dd 00:00:01',
    hiddenName:true
  });
    $('#deadline').pickadate({
    format: 'd mmmm, yyyy',
    formatSubmit : 'yyyy-mm-dd 23:59:00',
    hiddenName:true
  });
});   
</script>
@endsection