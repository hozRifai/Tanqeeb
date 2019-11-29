<?php
/*
=============================================================================================|
|            =>  Back End Function                                                           |
|            =>  Coded By Houzayaf Rifai                                                     |
|            =>  Thing Twice  Code Once !                                                    |
|============================================================================================|
*/

/*
1- get_restaurants(): a function to return all the restaurants in the db
2- user_get_orders(): a function which returns all the orders of a certain user
3- edit_user_info(): a function to let the user edit his info
 */
include 'connection.inc';
$connection = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
if(!$connection) {
	die("Connection Failed: ". mysqli_connect_error());
}

# A function to programitically set the title of the page
function set_title() {
 	global $pageTitle;
 	if (isset($pageTitle))
 		echo 'Tanqeeb | ' . $pageTitle;
 	else
 		echo 'Tanqeeb';
}
function convert_title_to_url($connection, $title){
	$title = strtolower($title);
	$title = str_replace(" ","-",$title);
	return $title;
}
function check_email_in_db($connection, $email){
	$query = "SELECT email from users where email = '" . $email . "'";
	$results	=	$connection->query($query);
	$retVal = (mysqli_num_rows($results) > 0) ? 1 : 0 ;
	return $retVal;
}

function check_phone_number_in_db($connection, $phone_number){
	$query = "SELECT phone_number from users where phone_number = '" . $phone_number . "'";
	$results	=	$connection->query($query);
	$retVal = (mysqli_num_rows($results) > 0) ? 1 : 0 ;
	return $retVal;
}

function get_all_restaurants($connection){
	$restaurants_query = "SELECT * FROM restaurant";
	$restaurants = $connection->query($restaurants_query);	
	if (mysqli_num_rows($restaurants) > 0) {
		?> 
		<div class="row mt-4">
		<?php 
		while ($row = mysqli_fetch_array($restaurants) ) {?>
			<div class="col-sm-3">
                <article class="col-item">
                    <div class="photo">
                        <a href="#"> <img src="layouts/images/reserve-slide1.jpg" class="img-responsive" alt="Restaurant Image" width="150"  height="150"/> </a>
                    </div>
                    <div class="info">
                            <div class="price-details">
                                <h6 class="col-item-h6"> <a href="#"><?php echo $row["restaurant_name"]; ?></a></h6>
                            </div>
                        <div class="clearfix"></div>
                    </div>
                </article>
            </div>
            <?php
		}
		?>
		</div>
		<?php
	}
}
function get_certain_restaurants($connection, $search_for_me){
	$query = "SELECT restaurant_name from restaurant where restaurant_name like '%$search_for_me%'";
    $results    =   $connection->query($query);
    if (mysqli_num_rows($results) > 0) {
		?> 
		<div class="container">
			<div class="row mt-4">
			<?php 
			while ($row = mysqli_fetch_array($results) ) {?>
				<div class="col-sm-3">
	                <article class="col-item">
	                    <div class="photo">
	                        <a href="#"> <img src="layouts/images/reserve-slide1.jpg" class="img-responsive" alt="Restaurant Image" width="150"  height="150"/> </a>
	                    </div>
	                    <div class="info">
	                            <div class="price-details">
	                                <h6 class="col-item-h6"> <a href="#"><?php echo $row["restaurant_name"]; ?></a></h6>
	                            </div>
	                        <div class="clearfix"></div>
	                    </div>
	                </article>
	            </div>
	            <?php
			}
			?>
			</div>
		</div>
		<?php
	}
}
function get_all_cuisines($connection){
	$cuisines_query = "SELECT * FROM cuisines";
	$cuisines = $connection->query($cuisines_query);	
	if (mysqli_num_rows($cuisines) > 0) {
		?> 
		<div class="row mt-4">
		<?php 
		while ($row = mysqli_fetch_array($cuisines) ) {?>
			<div class="col-sm-3">
                <article class="col-item">
                    <div class="photo">
                        <a href="#"> <img src="layouts/images/reserve-slide1.jpg" class="img-responsive" alt="Product Image" width="150"  height="150"/> </a>
                    </div>
                    <div class="info">
                            <div class="price-details">
                                <h6 class="col-item-h6"> <a href="#"><?php echo $row["name"]; ?></a></h6>
                            </div>
                       
                        <div class="clearfix"></div>
                    </div>
                </article>
            </div>
            <?php
		}
		?>
		</div>
		<?php
	}
}
function get_certain_cuisines($connection, $search_for_me) {
	$query = "SELECT name from cuisines where name like '%$search_for_me%'";
    $results    =   $connection->query($query);
    if (mysqli_num_rows($results) > 0) {
		?> 
		<div class="row mt-4">
		<?php 
		while ($row = mysqli_fetch_array($results) ) {?>
			<div class="col-sm-3">
                <article class="col-item">
                    <div class="photo">
                        <a href="#"> <img src="layouts/images/reserve-slide1.jpg" class="img-responsive" alt="Product Image" width="150"  height="150"/> </a>
                    </div>
                    <div class="info">
                            <div class="price-details">
                                <h6 class="col-item-h6"> <a href="#"><?php echo $row["name"]; ?></a></h6>
                            </div>
                       
                        <div class="clearfix"></div>
                    </div>
                </article>
            </div>
            <?php
		}
		?>
		</div>
		<?php
	}
}
# A list of functions to be implemented later
function add_to_cart($connection, $item_id){
	// if the user is logged then add it to the cart, if the user has no card then create a new cart
	$user_email = $_SESSION['user_email'];
	if(isset($user_email)){
		// get the user email
		$users_query = "SELECT * FROM cart WHERE user_email = '" . $user_email . "' AND group_id = 0";
		$user_results = $connection->query($users_query);
		# ToDo: create a cart object for each user in the registration form
		if (mysqli_num_rows($users_results) == 0) {
			$query = "INSERT INTO cart ( quantity, total, user_email)
    				VALUES ('0','0', '" . $user_email . "')";
    		$user_results    =   $connection->query($query);
		}else{// the user already have a cart
			$cart_id = $user_results["cart_id"];
			$add_item = "INSERT INTO cart_item ( cart_id, item_id )
    				VALUES ('" . $cart_id . "', '" . $item_id . "')";
    		$cart_item_results =   $connection->query($add_item);
		}
	}else{ // if the user is not logged in, then re-direct him to the login page
		header("Location: login.php");
	}
}
function remove_from_cart($connection, $user_id, $item_id){}
function get_total_price($connection, $user_id){}
function validate_mobile($mobile){return preg_match('/^[0-9]{10}+$/', $mobile);}