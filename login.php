 <?php
 	session_start();
	if (isset($_SESSION['user_email'])) {
		header('Location: dashboard.php');
	} else {
		$pageTitle = "Login page";
		include 'init.php';

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			// show me all the errors!
			// ini_set("display_errors",1);
	  		// error_reporting(E_ALL);

	  		// The user is trying to sign in!
			if(isset($_POST["login"])){
				$user_email = $_POST['user_email'];
				$user_password = $_POST['user_password'];
				$group_id = '0';
				$check_email = "";
				$user_password = md5($user_password);

				$connection = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
				if (!$connection) {
				    die("Connection failed: " . mysqli_connect_error());
				}

				$query = "SELECT email from users where 
						email = '" . $user_email . "' AND 
						password = '" . $user_password . "' AND 
						group_id = '" . $group_id . "'";

				$results	=	$connection->query($query);
				if (mysqli_num_rows($results) > 0) {
					$row = mysqli_fetch_array($results);
					$check_email =  $row["email"];
					if(isset($check_email)){
						$_SESSION['user_email'] = $check_email;
						header('Location: dashboard.php');
					}else{
						echo "Incorrect Credentials";
					}
				}else{
					echo "Incorrect Credentials";
				} // end user login form

			}else {// A poor man is trying to register!
				$first_name = $_POST["first_name"];
				$last_name = $_POST["last_name"];
				$reg_email = $_POST["reg_email"];
				$reg_password = $_POST["reg_password"];
				$phone_number = $_POST["phone_number"];
				$group_id = 0;
				
				// validation part
				$formErrors = array(); 
				if(isset($first_name)) {
					$filterUser = filter_var(trim($first_name) , FILTER_SANITIZE_STRING) ;
					if(strlen($filterUser) < 3 ) {
						$formErrors[] = "username can not be less than 3 characters";
					}
				}else{
					$formErrors[] = "I asked for your first name you ***************!";
				}

				if(isset($last_name)) {
					$filterLastName = filter_var(trim($last_name), FILTER_SANITIZE_STRING) ;
					if(strlen($filterLastName) < 3 ) {
						$formErrors[] = "last name can not be less than 3 characters";
					}
				}else{
					$formErrors[] = "I asked for your last name you ***************!";
				}

				if(isset($reg_email)){
					$filterEmail = filter_var(trim($reg_email) , FILTER_SANITIZE_EMAIL) ;
					 if(filter_var($filterEmail, FILTER_VALIDATE_EMAIL) != true ) {
					 	$formErrors[] = "can you write a proper email you a**h*le!" ; 
					 }
					 if (check_email_in_db($connection, $reg_email)) {
					 	$formErrors[] = "This email belongs to another user";
					 }
				}else{
					$formErrors[] = "I asked for your email you ***************!" ; 
				}

				if(isset($reg_password)) {
					if(empty($reg_password) ) { 
						$formErrors[] = "Clever Man! dont write your password again and you will get banned :)";
					}
					$reg_password = md5($reg_password) ;
				}
				if(isset($phone_number)) {
					if(empty($phone_number) ) { 
						$formErrors[] = "Clever Man! dont write your phone number again and you will get banned :)";
					}
					if(!validate_mobile(trim($phone_number))){
						$formErrors[] = "Not a valid phone number :(";
					}
					if (check_phone_number_in_db($connection, $phone_number)) {
						$formErrors[] = "This phone number belongs to another user :(";
					}
				}
				// polite user ? haram let him in :  behave you little boy ;)
				if (empty($formErrors)) {
					$insert_query = "
					INSERT INTO users ( phone_number, first_name, last_name, email, password, group_id)";
					$insert_query .= "VALUES ( 
					'$phone_number', '$first_name', '$last_name', '$reg_email', '$reg_password', '$group_id')";

					if ($connection->query($insert_query) === TRUE) {
					    $success_message = "Thank you for your registeration, you will be redirected 
					    to your dashboard soon" ;
					    // sleep(8);
					    $_SESSION["user_email"] = $reg_email; // add the new user to the session
					    // create a cart for the user so the user can add items to his card
						if(isset($reg_email)){
							// get the user email
							$users_query = "SELECT * FROM cart WHERE user_email = '" . $reg_email . "' AND group_id = 0";
							$user_results = $connection->query($users_query);

							if (mysqli_num_rows($user_results) == 0) { // if user has no cart
								$query = "INSERT INTO cart ( quantity, total, user_email)
					    				VALUES ('0','0', '" . $reg_email . "')";
					    		$user_results    =   $connection->query($query); // create a cart
							}
						}
					    header("Location: dashboard.php");
					} else {
					    echo "Error: " . $insert_query . "<br>" . $connection->error;
					}
				}


			}
		}
	}
	
?>

<section> 
	<div class="container login-page"> 
		<h1 class="center-h1-login"> Let's Login first! </h1>
		<h1 class="text-center">
			<span class="selected" data-class="login">Login </span>
			<span data-class="switch">| </span>
			<span data-class="signup"> Signup</span>
		</h1>
		<!-- start login form -->
	<form class="login" method="POST" >	
		<div class="form-group input-group">
			<div class="input-group-prepend">
			    <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
			 </div>
	        <input class="form-control" type="text" name="user_email" id="email" placeholder="Email" required> 
	    </div>	
		
		<div class="form-group input-group">
	    	<div class="input-group-prepend">
			    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
			</div>
        	<input class="form-control" type="password" name="user_password" id="password" placeholder="Password"  required>
    	</div>

 		
		<input class="btn btn-danger btn-block" name="login" type="submit" onclick="validate_login_form()" value="Login">

	</form>
	<!-- start signup form -->
	<form class="signup" method="POST">

		<div class="form-group input-group">
	    	<div class="input-group-prepend">
			    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
			</div>
				<input class="form-control" type="text" name="first_name" placeholder="First Name" required>
				<span class="asterisk">*</span>
	    </div>


		<div class="form-group input-group">
	    	<div class="input-group-prepend">
			    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
			</div>
				<input class="form-control" type="text" name="last_name" placeholder="Last Name" pattern=".{4,}"  required>
				<span class="asterisk">*</span>
	    </div>



		<div class="form-group input-group">
	    	<div class="input-group-prepend">
			    <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
			</div>
			<input class="form-control" type="email" name="reg_email" placeholder="Your Email" required>
			<span class="asterisk">*</span>
	    </div>



		<div class="form-group input-group">
	    	<div class="input-group-prepend">
			    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
			</div>
			<input class="form-control" type="password" name="reg_password"  placeholder="Create password" minlength="8" required>
			<span class="asterisk">*</span>
	    </div>


		<div class="form-group input-group">
	    	<div class="input-group-prepend">
			    <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
			</div>
			<input class="form-control" type="text" name="phone_number" placeholder="050 123 456 7" required>
			<span class="asterisk">*</span>
	    </div>


		<input class="btn btn-danger btn-block" name="signup" type="submit"  value="Signup">
	</form>
		<div class="row">
			<div class="col-lg-4"></div>
			<div class="text-center msg  col-lg-4" >
				<?php 
				if(!empty($formErrors)){
					foreach($formErrors as $error) {
						echo "<div class='alert alert-danger' >" . $error . " </div>" ;	
					}
				}
				if (isset($success_message)) {
					echo '<div class="msg success"> '. $success_message . '</div>' ;
				}
				 ?> 
			</div>
		</div>
	</section>

<script>
	// switch to swatch between login form and signup form
	'use strict' ; 
	$(".login-page h1 span").click(function(){
		$(this).addClass("selected").siblings().removeClass("selected");
		$(".login-page form").hide();
		$("." +$(this).data("class")).fadeIn(100);
	});
</script>

<script>
	// Login Form Validation Input
    function validate_login_form() {
    	var email = document.getElementById("email").value ; 
		var password = document.getElementById("password").value ; 
		if (!email || !password ) // this is javascript okay !
			alert("please fill up the form");
    }
</script>

</body>

</html>
