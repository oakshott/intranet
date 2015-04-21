<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<label class="col-md-4 control-label">First Name</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="firstName" value="{{ old('firstName') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Last Name</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="lastName" value="{{ old('lastName') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Department</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="department" value="{{ old('department') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">E-Mail Address</label>
							<div class="col-md-6">
								<input type="email" class="form-control" name="email" value="{{ old('email') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Password</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Confirm Password</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password_confirmation">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Is the user a Linemanager?</label>
							<div class="col-md-6">
								Yes <input type="radio" class="form-control" name="isLineManager" value="1">
								No <input type="radio" class="form-control" name="isLineManager" value="0" checked>
							</div>
						</div>
						
						@if(Auth::Guest())
						
						@elseif(Auth::User()->isAdmin == '1')
						<div class="form-group">
							<label class="col-md-4 control-label">Is the user an Admin?</label>
							<div class="col-md-6">
								Yes <input type="radio" class="form-control" name="isAdmin" value="1">
								No <input type="radio" class="form-control" name="isAdmin" value="0" checked>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Is the user a Course Admin?</label>
							<div class="col-md-6">
								Yes <input type="radio" class="form-control" name="isCourseAdmin" value="1">
								No <input type="radio" class="form-control" name="isCourseAdmin" value="0" checked>
							</div>
						</div>
						@endif