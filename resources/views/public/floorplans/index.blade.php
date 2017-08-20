@extends('layouts.app')

@section('pageTitle', 'Dubai Off Plan Projects')

@section('content')
	<div class="is-gray-bg">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h1 class="ProjectListings__title">
						@lang('nav.floorplans')
					</h1>
				</div>
			</div>

			@include('public.floorplans._listings', [
				'projects' => $projects
			])

			<div class="pagination-container">
				{{ $projects->render() }}
			</div>				
		</div>
	</div>
@endsection