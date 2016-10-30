@extends('emails.default')

@section('content')
	<h3>Contact Form Message</h3>

	<table class="table table-bordered">
		<tr>
			<td width="100">Name:</td>
			<td>{{ $contact->name }}</td>
		</tr>
		<tr>
			<td>eMail:</td>
			<td><a href="mailto:{{ $contact->email }}">{{ $contact->email }}</td>
		</tr>
		<tr>
			<td>Phone:</td>
			<td>{{ $contact->phone }}</td>
		</tr>
		<tr>
			<td>Message:</td>
			<td>{{ $contact->message }}</td>
		</tr>
	</table>
@endsection