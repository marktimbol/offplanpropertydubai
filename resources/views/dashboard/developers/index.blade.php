@extends('layouts.dashboard')

@section('content')
	@forelse($developers as $developer)
		<li>{{ $developer->name }}</li>
	@empty
		<li>No developer yet.</li>
	@endforelse
@endsection