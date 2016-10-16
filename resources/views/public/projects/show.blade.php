@extends('layouts.app')

@section('bodyClass', 'Project-page')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="Project">
					<div class="Project__header Flex">
						<div class="Flex Flex--column Column-3">
							<div class="Project__logo Flex Flex--center Flex-1">
								<img src="/images/developers/developer.jpg" alt="{{ $project->name }}" title="{{ $project->name }}" class="img-responsive" />
							</div>

							<div class="Project__inquiry Flex Flex--center Flex-1 Flex--column">
								<h3 class="Section__title">Interested?</h3>
								<button type="button" class="btn btn-lg btn-default" data-toggle="modal" data-target="#FormInquiry">
									Inquire Now
								</button>
							</div>
						</div>

						<div class="Project__hero Flex Flex--center Column-9">
							<button class="btn btn-link" data-toggle="modal" data-target="#VideoModal">
								<div class="play-video-icon Flex Flex--center">
									<span></span>
								</div>
							</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection