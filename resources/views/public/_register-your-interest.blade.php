<div class="modal fade" id="RegisterYourIntestForm" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4>Register your Intest</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-12">
						<form method="POST" action="{{ route('inquiries.store') }}">
							{{ csrf_field() }}
							<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
								<label for="name">Name *</label>
								<input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required/>
								@if( $errors->has('name') )
									<span class="help-block">
										<strong>{{ $errors->first('name') }}</strong>
									</span>
								@endif
							</div>
							<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
								<label for="email">eMail *</label>
								<input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required />
								@if( $errors->has('email') )
									<span class="help-block">
										<strong>{{ $errors->first('email') }}</strong>
									</span>
								@endif
							</div>
							<div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
								<label for="phone">Phone *</label>
								<input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone') }}" required />
								@if( $errors->has('phone') )
									<span class="help-block">
										<strong>{{ $errors->first('phone') }}</strong>
									</span>
								@endif
							</div>
							<div class="form-group">
								<label for="iam">I Am:</label>
								<select name="iam" class="form-control">
									<option value=""></option>
									<option value="Investor">Investor</option>
									<option value="Agent">Agent</option>
									<option value="Guest">Guest</option>
								</select>
							</div>
							<div class="form-group">
								<label for="country">Country</label>
								<input type="text" name="country" id="country" class="form-control" value="{{ old('country') }}" required />
							</div>
							<div class="form-group">
								<label for="message">Message</label>
								<textarea name="message" id="message" class="form-control">
									{{ old('message') }}
								</textarea>
							</div>
							<div class="form-group">
								<div class="g-recaptcha" data-sitekey="6LeKrhIUAAAAAASOmIxl4WVSzfHE4E1dooL8LuNy"></div>
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-primary">
									Send Inquiry
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>