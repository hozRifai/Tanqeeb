 <?php
 	session_start();
	if (!isset($_SESSION['user_email'])) {
		header('Location: restaurants.php');
	} else {
		$pageTitle = "Orders page";
		include 'init.php';
}

