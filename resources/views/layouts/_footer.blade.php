<section class="Developers">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h3 class="Section__title text-center">Developers</h3>
				<div class="Developers Carousel">
					@foreach( $developers as $developer )
					<div class="Developer">
						<div class="Developer__image">
							<a href="#">
								<img src="/images/developers/developer.jpg" alt="{{ $developer->name }}" title="{{ $developer->Name }}" class="img-responsive" />
							</a>
						</div>
					</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
</section>

<footer></footer>