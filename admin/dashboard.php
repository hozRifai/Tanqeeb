<?php
	session_start();
	if(!isset($_SESSION['admin_email'])){
		header('Location: index.php');
	}else{
		$pageTitle = "Admin Dashboard";
		include 'init.php';
		include $templates . 'connection.php';

		$connection = mysqli_connect(DB_HOST,
			DB_USERNAME, DB_PASSWORD, DB_NAME);
		if(!$connection) {
			die("Cconnection Failed: ". mysqli_connect_error());
		}
		// display_users($connection);
	}

?>