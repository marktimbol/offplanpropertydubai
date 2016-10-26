var Dropzone = require('dropzone');

Dropzone.options.UploadProjectLogo = {
	uploadMultiple: false,
	maxFilesize: 2, // MB
	acceptedFiles: 'image/*',
	dictDefaultMessage: 'Upload Project Logo. Maximum 2MB'
};

Dropzone.options.UploadProjectFloorplans = {
	paramName: 'file',
	uploadMultiple: true,
	maxFilesize: 3, // MB
	acceptedFiles: 'image/*, application/pdf',
	dictDefaultMessage: 'Upload Project Floor Plans'
};

Dropzone.options.UploadProjectBrochure = {
	paramName: 'file',
	uploadMultiple: false,
	maxFilesize: 10, // MB
	acceptedFiles: 'image/*, application/pdf',
	dictDefaultMessage: 'Upload Project Brochure'
};

Dropzone.options.UploadProjectPhotos = {
	paramName: 'file',
	uploadMultiple: false,
	maxFilesize: 2, // MB
	acceptedFiles: 'image/*',
	dictDefaultMessage: 'Upload Project Photos'
};

Dropzone.options.UploadDeveloperLogo = {
	paramName: 'file',
	uploadMultiple: false,
	maxFilesize: 2, // MB
	acceptedFiles: 'image/*',
	dictDefaultMessage: 'Upload Developer Logo'
};







