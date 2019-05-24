/**
 * @license Copyright (c) 2003-2017, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
  config.filebrowserBrowseUrl = 'kcfinder/browse.php?opener=ckeditor&type=files';
 config.filebrowserImageBrowseUrl = 'kcfinder/browse.php?opener=ckeditor&type=images';
 config.filebrowserFlashBrowseUrl = 'kcfinder/browse.php?opener=ckeditor&type=flash';
 config.filebrowserUploadUrl = 'kcfinder/upload.php?opener=ckeditor&type=files';
 config.filebrowserImageUploadUrl = 'kcfinder/upload.php?opener=ckeditor&type=images';
 config.filebrowserFlashUploadUrl = 'kcfinder/upload.php?opener=ckeditor&type=flash';
 // config.extraPlugins = 'youtube';
 // config.toolbar = [{ name: 'insert', items: ['Youtube']}];
 config.extraPlugins = 'videodetector';
 config.toolbarGroups = [
   { name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
   { name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
   { name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
   { name: 'forms', groups: [ 'forms' ] },
   { name: 'links', groups: [ 'links' ] },
   { name: 'insert', groups: [ 'insert' ] },
   '/',
   { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
   { name: 'paragraph', groups: [ 'align', 'list', 'indent', 'blocks', 'bidi', 'paragraph' ] },
   { name: 'tools', groups: [ 'tools' ] },
   '/',
   { name: 'styles', groups: [ 'styles' ] },
   { name: 'colors', groups: [ 'colors' ] },
   { name: 'others', groups: [ 'others' ] },
   { name: 'about', groups: [ 'about' ] }
 ];

 config.removeButtons = 'Source,Save,NewPage,Preview,Print,Templates,PasteText,PasteFromWord,SelectAll,Scayt,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,Anchor,Flash,Smiley,PageBreak,Replace,Find,CreateDiv,CopyFormatting,RemoveFormat,Language,BidiRtl,BidiLtr,Styles';
};
