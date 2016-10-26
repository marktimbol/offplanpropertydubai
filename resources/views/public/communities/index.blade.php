@extends('layouts.app')

@section('pageTitle', 'Communities')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1>Communities</h1>
				<p class="lead">
					Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				</p>
			</div>

			<div class="col-md-12">
				@foreach( $communities as $community )
					<li>
						<a href="{{ route('communities.show', $community->slug) }}">
							{{ $community->name }}
						</a>
					</li>
				@endforeach
			</div>
		</div>
	</div>
@endsection