@extends('layouts.app')

@section('pageTitle', 'Communities')

@section('content')
	<div class="Communities">
		<div class="Communities__bg Flex Flex--center Flex--column">
			<h1 class="Communities__title is-white">Communities</h1>
		</div>
	</div>
	<div class="container">
		<div class="row">
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

					{!! $communities->links() !!}
				</div>
			</div>
		</div>
	</div>
@endsection