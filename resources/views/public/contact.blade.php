@extends('layouts.app')

@section('pageTitle', 'Contact Us')

@section('bodyClass', 'Contact')

@section('content')
	<section>
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<h3 class="Section__title">Contact Information</h3>
					<address>
						Address: Dubai Off Plan<br />
						Mobile: +971 55 966 4000<br />
						eMail:
							<a href="mailto:info@offplanpropertydubai.com">
								info@offplanpropertydubai.com
							</a>
					</address>
				</div>
				<div class="col-md-6">
					<h3 class="Section__title">Send us a message</h3>
					<form method="POST" action="{{ route('contact.store') }}">
						{{ csrf_field() }}
						<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
							<label for="name">Name *</label>
							<input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" />
							@if( $errors->has('name') )
								<span class="help-block">{{ $errors->first('name') }}</span>
							@endif
						</div>
						<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
							<label for="email">eMail *</label>
							<input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" />
							@if( $errors->has('email') )
								<span class="help-block">{{ $errors->first('email') }}</span>
							@endif
						</div>
						<div class="form-group">
							<label for="phone">Phone</label>
							<input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone') }}" />
						</div>
						<div class="form-group">
							<label for="message">Message</label>
							<textarea name="message" id="message" class="form-control" rows="5">
								{{ old('message') }}
							</textarea>
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-lg btn-primary">Send Message</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>
@endsection