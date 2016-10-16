@extends('layouts.app')

@section('content')
	@foreach( $projects as $project )
		<li>{{ $project->name }}</li>
	@endforeach
@endsection