/**
 * @license Copyright (c) 2003-2017, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
  config.filebrowserBrowseUrl = "kcfinder/browse.php?opener=ckeditor&type=files";
   config.filebrowserImageBrowseUrl = "kcfinder/browse.php?opener=ckeditor&type=images";
   config.filebrowserFlashBrowseUrl = "kcfinder/browse.php?opener=ckeditor&type=flash";
   config.filebrowserUploadUrl = "kcfinder/upload.php?opener=ckeditor&type=files";
   config.filebrowserImageUploadUrl = "kcfinder/upload.php?opener=ckeditor&type=images";
   config.filebrowserFlashUploadUrl = "kcfinder/upload.php?opener=ckeditor&type=flash";
   config.extraPlugins = 'videodetector';

 	config.removeButtons = 'Soucre, Save, NewPage, DocProps, Preview, Print, Templates, document, Cut, Copy, Paste, PasteText, PasteFromWord, Undo, Redo, Find, Replace, SelectAll, Scayt, Form, Checkbox, Radio, TextField, Textarea, Select';
 };
