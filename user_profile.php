<?php
	session_start();
	if(!isset($_SESSION['user_email'])){ // no seesion? go back home kid!
		header('Location: index.php');
	}else{ // Nice to see you back!
		$pageTitle = "Profile Page";
		// $dont_show_navbar = "";
		include 'init.php';
		// get user's data
		$connection = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
		if(!$connection) {
			die("Connection Failed: ". mysqli_connect_error());
		}
		$user_email = $_SESSION['user_email'];
		$user_query = "SELECT * FROM users WHERE email = '" . $user_email . "'";
		$user_data = $connection->query($user_query);	
		if (mysqli_num_rows($user_data) > 0) {
			$row = mysqli_fetch_array($user_data);
		}

		// user wants to change data? We are here to serve you baby :) 
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			// can the new data
			$first_name = $_POST["first_name"];
			$last_name = $_POST["last_name"];
			$email = $_POST["email"];
			$phone_number = $_POST["phone_number"];
			// if new_pass == old_pass then dont change it, otherwise please do!
			$pass = "";
			$new_pass = md5($_POST["new_password"]);
			if($row["password"] != $new_pass){
				$pass = $new_pass;
			}else{
				$pass = $row["password"];
			}
			// if the user wanted to use an already used email then stop him!
			if ($row["email"] != $email){
				$email_check = "SELECT email from users where email = '" . $email . "'";
				$is_email_found = $connection->query($email_check);
				if (mysqli_num_rows($is_email_found) > 0) {
	            	?>
	            	<script type="text/JavaScript">  
				     alert("The email you wanted to used belongs to another user, Notice that your changes will not be saved"); 
				     </script>
				     <?php
				     header("Refresh:0");
	            	
	        	}
			}
        	// if the user wanted to use an already used phone number then stop him!
        	if ($row["phone_number"] != $phone_number){
        		$phone_check = "SELECT email from users where phone_number = '" . $phone_number . "'";
				$is_phone_found = $connection->query($phone_check);
				if (mysqli_num_rows($is_phone_found) > 0) {
	            	?>
	            	<script type="text/JavaScript">  
				     alert("The phone number you wanted to used belongs to another user, Notice that your changes will not be saved"); 
				     </script>
				     <?php
				     header("Refresh:0");
	            	
	        	}
        	}


			$sql = "UPDATE users SET first_name = '" . $first_name . "', last_name = '" . $last_name . "',
					phone_number = '" . $phone_number . "', password = '" . $pass . "' , email = '" . $email . "'
					WHERE email = '" . $row["email"] . "'";
			$connection->query($sql);
			if ($connection->query($sql) === TRUE) {
				$_SESSION['user_email'] = $email;
				header("Refresh:0");
			    echo "Record updated successfully";
			} else {
			    echo "Error updating record: " . $connection->error;
			}


		} // end of post form
	}
?>
<h1 class="text-center" style="margin-top: 6%; margin-bottom: 3%; color: #dc3545;">My Profile</h1>
<section>
	<div class="container">
		<div class="row">
			<div class="col-lg-3"></div>
			<div class="col-lg-6">
			<form class="signup" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">

					<div class="form-group input-group">
				    	<div class="input-group-prepend">
						    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
						</div>
							<input class="form-control" type="text" name="first_name" value='<?php echo $row["first_name"];?>' pattern=".{4,}" title="username must be more than 4 characters" required="required">
				    </div>


					<div class="form-group input-group">
				    	<div class="input-group-prepend">
						    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
						</div>
							<input class="form-control" type="text" name="last_name" value='<?php echo $row["last_name"];?>' pattern=".{4,}" title="username must be more than 4 characters" required="required">
				    </div>

					<div class="form-group input-group">
				    	<div class="input-group-prepend">
						    <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
						</div>
						<input class="form-control" type="email" name="email" value='<?php echo $row["email"];?>' required="required">
				    </div>


					<div class="form-group input-group">
				    	<div class="input-group-prepend">
						    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
						</div>
						<input class="form-control" type="password" name="new_password"   minlength="8" >
				    </div>

					<div class="form-group input-group">
				    	<div class="input-group-prepend">
						    <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
						</div>
						<input class="form-control" type="text" name="phone_number" value='<?php echo $row["phone_number"];?>' required="required">
				    </div>


					<input id="submit" class="btn btn-danger btn-block" name="signup" type="submit" value="Save">

<!-- 					<div class="alert alert-success" id="success-alert">
					  <button type="button" class="close" data-dismiss="alert">x</button>
					  <strong>Success! </strong> Changes have been sumbitted.
					</div> -->

				</form>
		</div>
		</div>
	</div>
</section>
<script>
	$("#submit").click(function(e){
		$('#success-alert').toggle('slow', function() {
			$("#success-alert").fadeTo(2000, 500).slideUp(500, function(){
			    $("#success-alert").slideUp(500);
			});
  		});
	});
</script>
</body>

</html>
