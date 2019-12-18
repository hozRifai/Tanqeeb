<?php
$pageTitle = "address form";
include 'init.php';
$connection = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

?>


<script>
    if ( window.history.replaceState )
        window.history.replaceState( null, null, window.location.href );
</script>

<?php 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$street = $_POST["street_address"] ;
	$appartment = $_POST["apartment_number"];
	// get user phone number
	$get_user_phone = "SELECT phone_number from users WHERE email = '".  $_SESSION["user_email"] . "' ";
	$results = $connection->query($get_user_phone);
	if (mysqli_num_rows($results) > 0) {
		while ($row = mysqli_fetch_array($results)){
			$user_phone_number = $row["phone_number"];
			$user_phone_number = str_replace(array("\r","\n"), '', $user_phone_number);
		}
	}
	if (isset($user_phone_number)) {

		// get user card id 
		$user_cart_id_query = "SELECT cart_id from cart WHERE user_email = '".  $_SESSION["user_email"] . "' ";
		$cart_id_result = $connection->query($user_cart_id_query); 

		if (mysqli_num_rows($cart_id_result) > 0) {
			while ($row = mysqli_fetch_array($cart_id_result)){
				$cart_id = $row["cart_id"];
			}
		}

		$query = "INSERT INTO address ( user_phone_numer, street_address, apartment_number)
    				VALUES ('" . $user_phone_number . "',  '" . $street . "'  , '" . $appartment . "')";
    	$user_results    =   $connection->query($query);


    	foreach ($_SESSION["cart"] as $key => $value) {
    		$query = "INSERT INTO cart_item ( cart_id, item_id)
    				VALUES ('" . $cart_id . "',  '" . $value["item_id"] . "' )";
    		$user_results    =   $connection->query($query);
    	}
    	// get the user address for the last entry 
    	// notice how number is being written here! this has taken 15 mins debugging 
    	// dont change it now it has been used in other places
    	// if it works, then dont touch it!
    	$user_last_address = "SELECT MAX(id) AS \"id\" FROM address WHERE user_phone_numer = '".$user_phone_number."'";
    	$user_last_address_result    =   $connection->query($user_last_address);
    	if (mysqli_num_rows($user_last_address_result) > 0) {
			while ($row = mysqli_fetch_array($user_last_address_result)){
				$user_address_id = $row["id"];
			}
		}
		// order query
    	$order_query =  "INSERT INTO `orders` ( `user_email`, `user_address`, `total_price`, `order_date`, `status`) 
    					VALUES ('" . $_SESSION["user_email"] . "', '" . $user_address_id . "' , '" . $_SESSION["total_price"] . "', curdate(), 'not confirmed')";
    	$order_results    =   $connection->query($order_query);


    	$user_last_order = "SELECT MAX(order_id) AS \"id\" FROM orders WHERE user_email = '".$_SESSION["user_email"]."'";
    	$user_last_order_result    =   $connection->query($user_last_order);
    	if (mysqli_num_rows($user_last_order_result) > 0) {
			while ($row = mysqli_fetch_array($user_last_order_result)){
				$user_order_id = $row["id"];
			}
		}

    	// order_items query 
    	foreach ($_SESSION["cart"] as $key => $value) { 
    		$order_items_query = "INSERT INTO order_items (order_id, item_id, quantity, status) 
    						  VALUES ('". $user_order_id ."', '".  $value["item_id"] ."', '". $value["item_quantity"] ."', 'not_delivered') ";
			$results  =   $connection->query($order_items_query);
    	}
    	$_SESSION["cart"] = [];
    	$_SESSION["total_price"] = 0;
    	$_SESSION["number_of_items"] = 0;
    	header('Location: restaurants.php');
	}
}

