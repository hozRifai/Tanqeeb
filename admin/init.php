<?php

	$templates  = "includes/templates/" ; 
	$css 		= "layouts/css/" ;
	$js 		= "layouts/js/" ;

	include 'includes/functions/functions.php';
	include 'utils.php';
	include $templates . "header.php";

	if(!isset($dont_show_navbar)){
		include $templates . "navbar.php";
	}
	include $templates . "footer.php" ;