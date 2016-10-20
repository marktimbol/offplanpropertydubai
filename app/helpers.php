<?php

use Illuminate\Support\Facades\Storage;

function getPhotoPath($photo)
{
	if( ! $photo )
	{
		return '/images/developers/developer.jpg';
	}

	if( config('filesystems.default') === 'local' ) {
		// return asset('storage/'.$photo);
		// return Storage::url('app/public/'.$photo);
	}

	return sprintf('https://s3-%s.amazonaws.com/%s/%s', 
			config('filesystems.disks.s3.region'), 
			config('filesystems.disks.s3.bucket'), 
			$photo
	);
}