<?php
	require_once 'bower_components/ckeditor/ckeditor.php';
	require_once 'bower_components/ckfinder/ckfinder.php';
	$ckeditor = new CKEditor();
	$ckeditor->basePath = 'ckeditor';
	CKFinder::SetupCKEditor($ckeditor, 'bower_components/ckfinder/');
?>