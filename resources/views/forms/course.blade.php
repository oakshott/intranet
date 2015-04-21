
					

					<div class="form-group">
						<div class="row">
							<div class="large-5 columns">
						{!!Form::label('Course title:')!!}
						{!!Form::text('courseTitle',null, ['class'=>'form-control','placeholder'=>'required'])!!}
						

							</div>
							<div class="large-7 columns">
								{!!Form::label('Course Provider:')!!}
								{!!Form::text('courseProvider',null, ['class'=>'form-control','placeholder'=>'required'])!!}
							</div>	
						</div>
					</div>

						<div class="form-group">
						<div class="row">
							<div class="large-12 columns">
								{!!Form::label('Course Venue:')!!}
								{!!Form::textarea('courseVenue',null, ['class'=>'form-control','placeholder'=>'required'])!!}
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="large-5 columns">
								{!!Form::label('Contact Telephone:')!!}
								{!!Form::text('courseTelephone',null, ['class'=>'form-control','placeholder'=>'required'])!!}
							</div>
							<div class="large-7 columns">
								{!!Form::label('Contact Email:')!!}
								{!!Form::text('courseEmail',null, ['class'=>'form-control','placeholder'=>'required'])!!}
							</div>	
						</div>
					</div>

					<div class="form-group">
						<div class="row">
							<div class="large-5 columns">
								{!!Form::label('Course Number')!!}
								{!!Form::text('courseNumber',null, ['class'=>'form-control','placeholder'=>'required'])!!}
							</div>
							<div class="large-7 columns">
								{!!Form::label('Course Contact')!!}
								{!!Form::text('courseContact',null, ['class'=>'form-control','placeholder'=>'required'])!!}
								
							</div>	
						</div>
					</div>

					<div class="form-group">
						<div class="row">
							<div class="large-4 columns">
								{!!Form::label('Start Date')!!}
								<input type="text" name="startDate" id="startDate"  placeholder='required' class="form-control" data-value="{{$course->startDate}}" >
							</div>
						
							<div class="large-4 columns">
								{!!Form::label('End Date')!!}	
								<input type="text" name="endDate" id="endDate" placeholder='required' class="form-control" data-value="{{$course->endDate}}" >
							</div>
							<div class="large-4 columns">
								{!!Form::label('Duration')!!}
								{!!Form::text('duration',null, ['class'=>'form-control','placeholder'=>'required'])!!}
							</div>		
						</div>
					</div>
					<div class="form-group">
						{!!Form::label('Course Details:')!!}
						{!!Form::textarea('details',null, ['class'=>'form-control','placeholder'=>'required'])!!}
					</div>
					<div class="form-group">
						{!!Form::label('Course Objectives:')!!}
						{!!Form::text('courseObjectives',null, ['class'=>'form-control','placeholder'=>'required'])!!}
					</div>
					<div class="form-group">
						{!!Form::label('Estimated Course Fees:')!!}
						{!!Form::text('courseFees',null, ['class'=>'form-control','placeholder'=>'required'])!!}
					</div>
					<div class="form-group">
						{!!Form::label('Estimated Travel Fees:')!!}
						{!!Form::text('travelFees',null, ['class'=>'form-control','placeholder'=>'required'])!!}
					</div>
					<div class="form-group">
						{!!Form::label('Course Approval Deadline:')!!}
						<input type="text" name="deadline" id="deadline" placeholder='required' class="form-control" data-value="{{$course->deadline}}">
					</div>
					<div class="form-group">
						{!!Form::label('Line Manager:')!!}
						<!--{!!Form::text('lineManager',null, ['class'=>'form-control'])!!}-->
						{!! Form::select('lineManager', $lineManagers)  !!}
					</div>
					<div class="form-group">
						{!!Form::label('How will this raise standards at Beauchamps High School:')!!}
						{!!Form::textarea('standards',null, ['class'=>'form-control','placeholder'=>'required'])!!}
					</div>


					
					