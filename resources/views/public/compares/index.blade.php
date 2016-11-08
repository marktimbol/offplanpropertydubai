@extends('layouts.app')

@section('pageTitle', 'Project Comparison')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1>Project Compares</h1>
				<p class="lead">
					Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				</p>
			</div>

			<div class="col-md-12">
				<table class="table table-bordered table-striped">
					<thead>
						<th>Name</th>
						<th>Developer</th>
						<th>Location</th>
						<th>Starting From</th>
						<th>Payment Plan</th>
						<th>Expected Completion Date</th>
						<th>&nbsp;</th>
					</thead>
					<tbody>
						@if( count($compares) > 0 )
							@foreach( $compares as $compare )
								<tr>
									<td width="300">
										<a href="{{ route('developers.projects.show', [$compare->options->project->developer->slug, $compare->options->project->slug]) }}">
											{{ sprintf('%s - %s', $compare->options->project->name, $compare->options->project->title) }}
										</a> 
										<small>
											@foreach( $compare->options->project->types as $type )
												<span class="label label-success">{{ $type->name }}</span>
											@endforeach
										</small>
									</td>
									<td>
										<a href="{{ route('developers.show', $compare->options->project->developer->slug) }}">
											{{ $compare->options->project->developer->name }}
										</a>
									</td>
									<td>
										@foreach( $compare->options->project->communities as $community )
											{{ $community->name }}
										@endforeach
									</td>
									<td>
										{{ $compare->options->project->price }}
									</td>
									<td>
										<table class="table table-bordered table-striped">
											@foreach( $compare->options->project->payments as $plan )
												<tr>
													<td width="200">{{ $plan->title }}</td>
													<td width="100">{{ $plan->percentage }}</td>
													<td>{{ $plan->date }}</td>
												</tr>
											@endforeach
										</table>
									</td>
									<td>
										{{ $compare->options->project->expected_completion_date }}
									</td>
									<td>
										<form method="POST" action="{{ route('compares.destroy', $compare->rowId) }}">
											{{ csrf_field() }}
											{!! method_field('DELETE') !!}
											<div class="form-group">
												<button type="submit" class="btn btn-danger">&times;</button>
											</div>
										</form>
									</td>
								</tr>
							@endforeach
						@else
							<tr>
								<td colspan="6">Please <a href="/projects">select a project to compare</a></td>
							</tr>
						@endif
					</tbody>
				</table>
			</div>
		</div>
	</div>
@endsection