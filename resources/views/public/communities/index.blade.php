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
				<div class="Communities">
					@foreach( $communities as $community )
						<div class="Community">
							<h2>{{ $community->name }}</h2>
							<p class="lead">
								{{ $community->description }}
							</p>
							@if( count($community->projects) > 0 )
								<h4>Available in {{ $community->name }}</h4>
								@include('public.projects._listings', [
									'projects'	=> $community->projects->take(3)
								])
							@endif
						</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
@endsection