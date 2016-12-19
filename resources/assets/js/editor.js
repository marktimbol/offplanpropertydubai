$(function() {
	var changeDirection = function (dir, align) {
		this.selection.save();
		var elements = this.selection.blocks();

		for (var i = 0; i < elements.length; i++) {
			var element = elements[i];
			if (element != this.$el.get(0)) {
				$(element)
					.css('direction', dir)
					.css('text-align', align);
			}
		}

		this.selection.restore();
	}

	// console.log($.FroalaEditor.DefineIcon('rightToLeft', { NAME: 'long-arrow-left' }));

	$.FroalaEditor.DefineIcon('rightToLeft', {NAME: 'long-arrow-left'});
	$.FroalaEditor.RegisterCommand('rightToLeft', {
		title: 'RTL',
		focus: true,
		undo: true,
		refreshAfterCallback: true,
		callback: function () {
			changeDirection.apply(this, ['rtl', 'right']);
		}
	})

	$.FroalaEditor.DefineIcon('leftToRight', {NAME: 'long-arrow-right'});
	$.FroalaEditor.RegisterCommand('leftToRight', {
		title: 'LTR',
		focus: true,
		undo: true,
		refreshAfterCallback: true,
		callback: function () {
			changeDirection.apply(this, ['ltr', 'left']);
		}
	})	

	var froalaEditorStandardButtons = [
		"bold", "italic", "underline", "strikeThrough",
		"fontFamily", "fontSize", "emoticons",
		"|", "color", "paragraphFormat", "align", "formatOL", "formatUL", "outdent", "indent", "clearFormatting",
		"|", "insertLink", "insertTable", 
		"|", "undo", "redo", "save",
		"|", 'rightToLeft', 'leftToRight',
	];

	$('#editor').froalaEditor({
		height: '600px',
		direction: 'ltr',
		toolbarButtons: froalaEditorStandardButtons,
		toolbarButtonsMD: froalaEditorStandardButtons,
		toolbarButtonsSM: froalaEditorStandardButtons,
		// toolbarButtonsSM: ['undo', 'redo' , 'bold', 'formatOL', 'formatUL', 'rightToLeft', 'leftToRight'],
		// toolbarButtonsMD: ['undo', 'redo' , 'bold', 'formatOL', 'formatUL', 'rightToLeft', 'leftToRight'],
	})   	
})


