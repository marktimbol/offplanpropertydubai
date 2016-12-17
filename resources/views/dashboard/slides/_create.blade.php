<h3>Upload Slide</h3>
<form method="POST" action="{{ route('dashboard.slides.store') }}" class="dropzone">
	{{ csrf_field() }}
</form>