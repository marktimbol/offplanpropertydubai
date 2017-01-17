@extends('layouts.app')

@section('pageTitle', 'Dubai Off Plan Projects')

@section('content')
	<div class="is-gray-bg">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h1 class="ProjectListings__title">
						Dubai Off Plan Projects - Floor Plans
					</h1>
				</div>
			</div>

			@include('public.floorplans._listings', [
				'projects' => $projects
			])
		</div>
	</div>
@endsection