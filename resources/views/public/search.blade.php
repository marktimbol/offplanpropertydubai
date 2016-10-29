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

			@include('public.projects._listings', [
				'projects' => $projects
			])
		</div>
	</div>
@endsection