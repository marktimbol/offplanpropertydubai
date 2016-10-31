var Dropzone = require('dropzone');

Dropzone.options.UploadProjectLogo = {
	uploadMultiple: false,
<<<<<<< HEAD
	maxFilesize: 2, // MB
	acceptedFiles: 'image/*',
	dictDefaultMessage: 'Upload Project Logo. Maximum 2MB'
=======
	maxFilesize: .02, // 50kb
	acceptedFiles: 'image/*',
	dictDefaultMessage: 'Upload Project Logo. Recommended dimensions: 230 x 85px. Maximum 20kb'
>>>>>>> d442f8544cd7c633002271aa2830201155c4d758
};

Dropzone.options.UploadProjectFloorplans = {
	paramName: 'file',
	uploadMultiple: true,
<<<<<<< HEAD
	maxFilesize: 3, // MB
=======
	maxFilesize: .2, // 200kb
>>>>>>> d442f8544cd7c633002271aa2830201155c4d758
	acceptedFiles: 'image/*, application/pdf',
	dictDefaultMessage: 'Upload Project Floor Plans'
};

<<<<<<< HEAD
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
=======
Dropzone.options.UploadProjectPhotos = {
	paramName: 'file',
	uploadMultiple: false,
	maxFilesize: .2, // 200kb
>>>>>>> d442f8544cd7c633002271aa2830201155c4d758
	acceptedFiles: 'image/*',
	dictDefaultMessage: 'Upload Project Photos'
};

Dropzone.options.UploadDeveloperLogo = {
	paramName: 'file',
	uploadMultiple: false,
<<<<<<< HEAD
	maxFilesize: 2, // MB
	acceptedFiles: 'image/*',
	dictDefaultMessage: 'Upload Developer Logo'
=======
	maxFilesize: .02, // 50kb
	acceptedFiles: 'image/*',
	dictDefaultMessage: 'Upload Developer Logo. Recommended dimensions: 450 x 343. Maximum 20kb'
>>>>>>> d442f8544cd7c633002271aa2830201155c4d758
};







