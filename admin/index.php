<?php
	session_start();
	if (isset($_SESSION['admin_email'])) {
		header('Location: dashboard.php');
	} else {
		$dont_show_navbar = "";
		$pageTitle = "Admin Page";
		include 'init.php';
		include $templates . 'connection.php';

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			// show me all the errors!
			// ini_set("display_errors",1);
	  		// error_reporting(E_ALL);

			$admin_email = $_POST['admin_email'];
			$admin_password = $_POST['admin_password'];
			$group_id = '1';
			$check_email = "";
			$admin_password = md5($admin_password);

			$connection = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
			if (!$connection) {
			    die("Connection failed: " . mysqli_connect_error());
			}

			$query = "SELECT email from users where 
					email = '" . $admin_email . "' AND 
					password = '" . $admin_password . "' AND 
					group_id = '" . $group_id . "'";

			$results	=	$connection->query($query);
			if (mysqli_num_rows($results) > 0) {
				$row = mysqli_fetch_array($results);
				$check_email =  $row["email"];
				if(isset($check_email)){
					$_SESSION['admin_email'] = $check_email;
					header('Location: dashboard.php');
				}else{
					echo "Incorrect Credentials";
				}
			}else{
				echo "Incorrect Credentials";
			}
		}
	}
	
?>
	<form class="login" action="<?php echo $_SERVER['PHP_SELF']; ?>" method='POST'>
		<h4 class="text-center"> Admin Login</h4>
		<input class="form-control " type="email" name="admin_email" placeholder="email" autocomplete="off">
		<input class="form-control" type="password" name="admin_password" placeholder="password" autocomplete="new-password">
		<input class="btn btn-primary btn-block" type="submit" value="submit">
	</form>
