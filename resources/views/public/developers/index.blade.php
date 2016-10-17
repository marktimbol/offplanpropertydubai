@extends('layouts.app')

@section('pageTitle', 'Developers')

@section('content')
	<h1>Developers</h1>

	@foreach( $developers as $developer )
		<li>{{ $developer->name }}</li>
	@endforeach
@endsection