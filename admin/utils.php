<?php
/* 
This file will have all the helpful functions  in our website
*/


// a function wcich automatically set the title of the page.
function set_title() {
	global $pageTitle;
	if (isset($pageTitle)) {
		echo 'Tanqeeb | ' . $pageTitle;
	}else{
		echo 'Tanqeeb';
	}
}