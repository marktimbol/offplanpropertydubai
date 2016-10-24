@extends('emails.default')

@section('content')
	<h3>Download Brochure</h3>
	<table class="table table-bordered">
		<tr>
			<td colspan="2">
				<a href="{{ $project->brochure->file }}" class="btn btn-block btn-success">
					Download {{ $project->name }} Brochure
				</a>
			</td>
		</tr>
	</table>
@endsection