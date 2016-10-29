@extends('layouts.app')

@section('pageTitle', sprintf('Search results for %s', $query))

@section('content')
	<div class="is-gray-bg">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h1 class="ProjectListings__title">
						{{ sprintf('Search results for %s', $query) }}
					</h1>
				</div>
			</div>

			@if( count($projects) > 0 )
				@include('public.projects._listings', [
					'projects' => $projects
				])
			@else
				<div class="row">
					<div class="col-md-12">
						<p class="lead">
							{{ sprintf('No search results for %s', $query) }}
						</p>
					</div>
				</div>
			@endif
		</div>
	</div>
@endsection