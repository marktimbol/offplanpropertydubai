@extends('layouts.app')

@section('pageTitle', 'Project Comparison')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1>@lang('nav.compare-projects')</h1>
			</div>

			<div class="col-md-12">
				@if( count($compares) > 0 )
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
						</tbody>
					</table>

					<form method="POST" action="/reset-compare">
						{{ csrf_field() }}
						{{ method_field('DELETE') }}
						<button class="btn btn-danger"><i class="fa fa-refresh"></i> Reset Compares</button>
					</form>					
				@else
					<table class="table table-bordered table-striped">
						<thead>
							<th>Name</th>
							<th>Developer</th>
							<th>Location</th>
						</thead>

						<form method="POST">
							{{ csrf_field() }}
							<tbody>
								@foreach( $projects as $project )
								<tr>
									<td>
										<div class="checkbox">
											<label>
												<input type="checkbox" name="project_ids[]" value="{{ $project->id }}" /> 
												{{ $project->name }}

												<span>
													<small>
														@foreach( $project->types as $type )
															<span class="label label-success">{{ $type->name }}</span>
														@endforeach
													</small>
												</span>												
											</label>
										</div>										
									</td>
									<td>
										<a href="{{ route('developers.show', $project->developer->slug) }}">
											{{ $project->developer->name }}
										</a>									
									</td>
									<td>
										@foreach( $project->communities as $community )
											{{ $community->name }}
										@endforeach										
									</td>
								</tr>
								@endforeach
							</tbody>

							<tfoot>
								<tr>
									<td colspan="3">
										<div class="form-group">
											<button class="btn btn-primary"><i class="fa fa-code-fork"></i> Compare selected projects</button>
										</div>
									</td>
								</tr>
							</tfoot>							
						</form>						
					</table>					
				@endif
			</div>
		</div>
	</div>
@endsection