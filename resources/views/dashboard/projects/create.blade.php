@extends('layouts.dashboard')

@section('header_styles')
	<link rel="stylesheet" href="/css/editor.css" />
@endsection

@section('content')
	<h1>Add Project to {{ $developer->name }}</h1>

	<div id="CreateProject"></div>

@endsection

@section('footer_scripts')
	<script src="/js/editor.js"></script>
	<script src="/js/CreateProject.js"></script>
@endsection