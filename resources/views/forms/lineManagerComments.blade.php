	<div class="form-group">
						<div class="row">
							<div class="large-12 columns">
								{!! Form::hidden('id',$course->id)!!}
								{!!Form::label('Line Manager Comments:')!!}
								{!!Form::textarea('lineManagerComments',null, ['class'=>'form-control'])!!}	
							</div>
						</div>
	</div>
		<div class="form-group">
						<div class="row">
							<div class="large-12 columns">
								{!!Form::label('Approve:')!!}
								{!!Form::select('lineManagerApproved', array('Approved' => 'Approved', 'Unapproved' => 'Unapproved'))!!}
							</div>
						</div>
	</div>


	