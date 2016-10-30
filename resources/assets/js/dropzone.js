var Dropzone = require('dropzone');

Dropzone.options.UploadProjectLogo = {
	uploadMultiple: false,
	maxFilesize: .02, // 50kb
	acceptedFiles: 'image/*',
	dictDefaultMessage: 'Upload Project Logo. Recommended dimensions: 230 x 85px. Maximum 20kb'
};

Dropzone.options.UploadProjectFloorplans = {
	paramName: 'file',
	uploadMultiple: true,
	maxFilesize: .2, // 200kb
	acceptedFiles: 'image/*, application/pdf',
	dictDefaultMessage: 'Upload Project Floor Plans'
};

Dropzone.options.UploadProjectPhotos = {
	paramName: 'file',
	uploadMultiple: false,
	maxFilesize: .2, // 200kb
	acceptedFiles: 'image/*',
	dictDefaultMessage: 'Upload Project Photos'
};

Dropzone.options.UploadDeveloperLogo = {
	paramName: 'file',
	uploadMultiple: false,
	maxFilesize: .02, // 50kb
	acceptedFiles: 'image/*',
	dictDefaultMessage: 'Upload Developer Logo. Recommended dimensions: 450 x 343. Maximum 20kb'
};







