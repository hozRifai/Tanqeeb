<?php
	session_start();
	if(!isset($_SESSION['user_email'])){
		header('Location: index.php');
	}else{
		$pageTitle = "User Dashboard";
		// $dont_show_navbar = "";
		include 'init.php';

		$connection = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
		if(!$connection) {
			die("Connection Failed: ". mysqli_connect_error());
		}
		
	}