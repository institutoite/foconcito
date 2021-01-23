CKEDITOR.editorConfig = function (config) {
	config.toolbarGroups = [
		{ name: 'clipboard', groups: ['clipboard', 'undo'] },
		{ name: 'editing', groups: ['find', 'selection', 'spellchecker', 'editing'] },
		{ name: 'links', groups: ['links'] },
		{ name: 'insert', groups: ['insert','emoji'] },
		{ name: 'forms', groups: ['forms'] },
		{ name: 'tools', groups: ['tools'] },
		{ name: 'document', groups: ['mode', 'document', 'doctools'] },
		{ name: 'others', groups: ['others'] },
		{ name: 'basicstyles', groups: ['basicstyles', 'cleanup'] },
		{ name: 'paragraph', groups: ['list', 'indent', 'blocks', 'align', 'bidi', 'paragraph'] },
		{ name: 'styles', groups: ['styles'] },
		{ name: 'colors', groups: ['colors'] },
		{ name: 'about', groups: ['about'] }
	];
	config.removePlugins = 'elementspath';
	config.resize_enabled = false;
	config.removeButtons = 'Underline,Subscript,Superscript,Anchor,About,Indent,Outdent,PasteText,PasteFromWord,Source,SpecialChar,HorizontalRule,Blockquote,Image';
};