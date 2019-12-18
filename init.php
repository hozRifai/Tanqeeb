<?php

	$templates  = "includes/templates/" ;
	$css 		= "layouts/css/" ;
	$js 		= "layouts/js/" ;
	$images 	= "layouts/images/" ;
	
	include 'includes/functions/functions.php';
	include $templates . "header.php";

	if(!isset($dont_show_navbar)){ // sometimes we dont need to show the navbar in the page
		include $templates . "navbar.php";
	}
?>