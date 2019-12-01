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
// function convert_title_to_url($connection, $restaurant_id, $category){
// 	$capture = 0; // not found
// 	$url = strtolower($_SERVER['REQUEST_URI']);
// 	if (strpos($url, $category) !== false) {
// 		foreach ($str_word_count($url, 1) as $key => $value) {
// 			if("category" == $value):
// 				$capture = 1;
// 		}
// 		if $capture == 1:
// 			$url = preg_replace('category', '', $url);
// 	    #$url = "Tanqeeb/restaurant_category.php?restaurant_id=$restaurant_id"; // poor php i cant 
// 	}
// 	return $url;
// }

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
                                <h6 class="col-item-h6"> <a 
                                	href='restaurant_category.php?restaurant_id=<?php echo $row["id"];?>'>
                                	<?php echo $row["restaurant_name"]; ?></a></h6>
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
                                <h6 class="col-item-h6"> 
                                	<a href="cuisines.php?cuisine=<?php echo $row["name"]; ?>" name="cuisine"> <?php echo $row["name"]; ?> </a>
                                </h6>
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
function get_all_restaurants_under_certain_cuisine($connection, $cuisine){
	$cuisines_query = "
					SELECT r.restaurant_name
					FROM restaurant r, restaurant_cuisines rc 
					WHERE rc.cuisines_name like '%$cuisine%'
					AND rc.restaurant_id = r.id
				";
	$results = $connection->query($cuisines_query);

	if (mysqli_num_rows($results) > 0) {
		?> 
		<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="mt-4 text-center">Restarants Serve <?php echo "$cuisine";?> Food</h3>
        </div>
    </div>

 <div class="row mb-3">
    <div class="col">
    </div>
  </div>
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
	}else{
		?>
			<div class="mt-4">
				<h3 class="mt-4 text-center">Unfortunatelly there is no restaurant serves <?php echo "$cuisine";?> Food</h3>
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
			<div class="row">
		        <div class="col-lg-4">
		            <h3 class="mt-4 text-center">Our Restaurants</h3>
		        </div>
		        <div class=" mt-4 col-lg-6">
		            <form action="" method="post">
		                <input type="text" name="search">
		                <input type="submit" name="submit" value="Search" class="btn btn-danger">
		            </form> 
		        </div>
		    </div>
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
function get_certain_cuisines($connection, $search_for_me) {
	$query = "SELECT name from cuisines where name like '%$search_for_me%'";
    $results    =   $connection->query($query);
    if (mysqli_num_rows($results) > 0) {
		?> 
		<div class="container">
    <div class="row">
        <div class="col-lg-4">
            <h3 class="mt-4 text-center">Our Cuisines</h3>
        </div>
        <div class=" mt-4 col-lg-6">
            <form action="" method="post">
                <input type="text" name="search">
                <input type="submit" name="submit" value="Search" class="btn btn-danger">
            </form> 
        </div>
    </div>

 <div class="row mb-3">
    <div class="col">
    </div>
  </div>
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
		</div>
		<?php
	}
}
function fetch_restaurant_categories($connection, $restaurant_id){
	$category_array = array(); // save restaurant name first + items later 

	$categories_query = "SELECT * FROM restaurant_category where restaurant_id ='" . $restaurant_id ."'";
	$restaurant_query = "SELECT restaurant_name from restaurant where id ='" . $restaurant_id ."'";

	$restaurant_name = $connection->query($restaurant_query);
	$categories = $connection->query($categories_query);
	if(mysqli_num_rows($restaurant_name) > 0) { // get the restaurant name
		$restaurant_row = mysqli_fetch_array($restaurant_name);
		array_push($category_array, $restaurant_row["restaurant_name"]);
	}else{
		return "No such restaurant in the database";
	}
	if (mysqli_num_rows($categories) > 0) {
		while ($row = mysqli_fetch_array($categories) ) {
			array_push($category_array, $row["category_name"]);
		}
	}
	return $category_array;
}
# this function is being called in another function fetch_all_categories()
function fetch_restaurant_category_item($connection, $restaurant_id){
	$item_query = "SELECT t.id, t.name, t.price, t.size, t.ingredients, ct.restaurant_id, ct.category_name  from category_item ct, item t
					where ct.restaurant_id = '" . $restaurant_id ."' AND ct.item_id = t.id" ;
	$returned_values = array();
	$items_results = $connection->query($item_query);
	if (mysqli_num_rows($items_results) > 0) {
		while ($row = mysqli_fetch_array($items_results) ) {
			array_push($returned_values, $row);
		}
	}
	if (!empty($returned_values)){
		return $returned_values;
	}else{
		return "No items to display";
	}
}
# this function is being called whenever the user hits the link "restaurant+id=?and category =  ?"
function fetch_certain_categoty($connection, $restaurant_id, $category) {
	$item_query = " SELECT t.id, ct.category_name, t.name, t.price, t.size, t.ingredients, t.picture
					FROM category_item ct, item t
					WHERE ct.category_name = '". $category . "'
					AND ct.restaurant_id = '". $restaurant_id . "'
					AND t.id = ct.item_id
					";
	$items_results = $connection->query($item_query);
	$categories = fetch_restaurant_category_item($connection, $restaurant_id);
	if (is_string($categories)) {
		echo $categories;
		echo "you will be redirected soon :)";
		sleep(2);
		header("Location: restaurants.php");
	}else{
		$save_my_categories = array();
		if(is_array($categories) || is_object($categories)){
			foreach ($categories as $i => $my_array) {
				foreach ($my_array as $key => $value) {
					// key of the categories
				if($key == 6) // notice that this should be changed based on the number of attribues in the sql
					array_push($save_my_categories, $value);
				}
			}
		}
		$my_categories = array_unique($save_my_categories);
	}
	
	?>
	<section class="menu_list mt-60 mb-60" style="margin-top: 5%;">
	 <div class="container">
		<div class="row">
		   <div class="col-xl-12">
			  <div class="section-title text-center mb-60">
				 <h4>our menu</h4>
			  </div>
		   </div>
		</div>

		<div class="row">
		   <div class="tab-content col-xl-12" id="myTabContent">
			  <div class="tab-pane fade active show" id="breakfast" aria-labelledby="breakfast-tab">
				<div class="col-lg-3" style="float: left;">
					<nav class="list1">
				      <h3>Categories</h3>
						<form method="get">
						   	<?php foreach ($my_categories as $value) {
								 echo "<a href='restaurant_category.php?restaurant_id=$restaurant_id&category=$value' class=\"list-group-item\" > $value</a>";
								 header("Resfresh:0");
								}
								 ?>
					   </form>
				    </nav>
				</div>

				<div class="col-lg-8" style="float: right;">
					<?php 
						if (mysqli_num_rows($items_results) > 0) {
								while ($row = mysqli_fetch_array($items_results) ) { 
									
									if(isset($_SESSION["user_email"])) { 
										?>

 								<form method="POST" action="cart.php">
									<div class="single_menu_list">
										  <img name="src" src="http://infinityflamesoft.com/html/restarunt-preview/assets/img/menu/menu-3.jpg" alt="">
										  <div class="menu_content">
											 <h4><?php echo $row["name"] ?>
											 <span><?php echo "AED{$row["price"]} / {$row["size"]}"?></span></h4>
											 <p name="ingredients"><?php echo "{$row["ingredients"]}" ?> </p>
											 <input type="submit" name="add" class="btn btn-ouline-btn" value="add item" />
											 <!-- Since i cant ruin the webpage design i will save all the data in hidden inputs-->
											 <!-- dont do that in a real product, this pasta code goes for a uni project only -->
											 <input type="hidden" name="name" value="<?php echo $row["name"] ?>" />
											 <input type="hidden" name="id" value="<?php echo $row["id"] ?>" />
											 <input type="hidden" name="price" value="<?php echo $row["price"] ?>" />
											 <input type="hidden" name="quantity" value="1" />
											 <input type="hidden" name="size" value="<?php echo $row["size"] ?>" />
										  </div>
							   		</div>
							   	</form>
						    <?php
						}else{
							?>
							<div class="single_menu_list">
										  <img name="src" src="http://infinityflamesoft.com/html/restarunt-preview/assets/img/menu/menu-3.jpg" alt="">
										  <div class="menu_content">
											 <h4><?php echo $row["name"] ?>
											 <span><?php echo "AED{$row["price"]} / {$row["size"]}"?></span></h4>
											 <p name="ingredients"><?php echo "{$row["ingredients"]}" ?> </p>
											 <a href="login.php"> add to cart </a>
										  </div>
							   		</div>
							<?php
						}
								}
							} ?>

				</div> <!-- row 6 -->

			  </div>
		   </div>
		</div> <!-- End of row -->
	 </div>
 </section>
 <?php
}

function fetch_all_categories($connection, $restaurant_id){
	$categories = fetch_restaurant_category_item($connection, $restaurant_id);
	if (is_string($categories)) {
		echo $categories;
		echo "you will be redirected soon :)";
		sleep(2);
		header("Location: restaurants.php");
	}else{
		$save_my_categories = array();
		if(is_array($categories)){
			foreach ($categories as $i => $my_array) {
				foreach ($my_array as $key => $value) {
				if($key == 6)
					array_push($save_my_categories, $value);
				}
			}
		}
		$my_categories = array_unique($save_my_categories);
	}
	?>
	<section class="menu_list mt-60 mb-60" style="margin-top: 5%;">
	 <div class="container">
		<div class="row">
		   <div class="col-xl-12">
			  <div class="section-title text-center mb-60">
				 <h4>our menu</h4>
			  </div>
		   </div>
		</div>

		<div class="row">
		   <div class="tab-content col-xl-12" id="myTabContent">
			  <div class="tab-pane fade active show" id="breakfast" aria-labelledby="breakfast-tab">
				<div class="col-lg-3" style="float: left;">
					<nav class="list1">
				      <h3>Categories</h3>
						<form method="get">
						   	<?php foreach ($my_categories as $value) {
								 echo "<a href='restaurant_category.php?restaurant_id=$restaurant_id&category=$value' class=\"list-group-item\" > $value</a>";
								 header("Resfresh:0");
								}
								 ?>
					   </form>
				    </nav>
				</div>

				<div class="col-lg-8" style="float: right;">
					<?php 
					foreach ($categories as $key => $value) { 
						if(isset($_SESSION["user_email"])) { 
										?>

 								<form method="POST" action="cart.php">
									<div class="single_menu_list">
										  <img name="src" src="http://infinityflamesoft.com/html/restarunt-preview/assets/img/menu/menu-3.jpg" alt="">
										  <div class="menu_content">
											 <h4><?php echo $value["name"] ?>
											 <span><?php echo "AED{$value["price"]} / {$value["size"]}"?></span></h4>
											 <p name="ingredients"><?php echo "{$value["ingredients"]}" ?> </p>
											 <input type="submit" name="add" class="btn btn-ouline-btn" value="add item" />
											 <!-- Since i cant ruin the webpage design i will save all the data in hidden inputs-->
											 <!-- dont do that in a real product, this pasta code goes for a uni project only -->
											 <input type="hidden" name="name" value="<?php echo $value["name"] ?>" />
											 <input type="hidden" name="id" value="<?php echo $value["id"] ?>" />
											 <input type="hidden" name="price" value="<?php echo $value["price"] ?>" />
											 <input type="hidden" name="quantity" value="1" />
											 <input type="hidden" name="size" value="<?php echo $value["size"] ?>" />
										  </div>
							   		</div>
							   	</form>
						    <?php
						}else{
							?>
							<div class="single_menu_list">
										  <img name="src" src="http://infinityflamesoft.com/html/restarunt-preview/assets/img/menu/menu-3.jpg" alt="">
										  <div class="menu_content">
											 <h4><?php echo $value["name"] ?>
											 <span><?php echo "AED{$value["price"]} / {$value["size"]}"?></span></h4>
											 <p name="ingredients"><?php echo "{$value["ingredients"]}" ?> </p>
											 <a href="login.php"> add to cart </a>
										  </div>
							   		</div>
							<?php
						}
					} ?>

				</div> <!-- row 6 -->

			  </div>
		   </div>
		</div> <!-- End of row -->
	 </div>
 </section>
<?php
}
# A list of functions to be implemented later
// function add_to_cart($connection, $item_id){
// 	// if the user is logged then add the new item to the cart, if not, then redirect him to login page
// 	$user_email = $_SESSION['user_email'];
// 	if(isset($user_email)){
// 		// get the user email
// 		$users_query = "SELECT * FROM cart WHERE user_email = '" . $user_email . "' AND group_id = 0";
// 		$user_results = $connection->query($users_query);

// 		if (mysqli_num_rows($user_results) == 0) { // if user has no cart
// 			$query = "INSERT INTO cart ( quantity, total, user_email)
//     				VALUES ('0','0', '" . $user_email . "')";
//     		$user_results    =   $connection->query($query); // create a cart
// 		}
// 		if (mysqli_num_rows($user_results) > 0 ){// the user already have a cart
// 			$cart_id = $user_results["cart_id"];
// 			$add_item = "INSERT INTO cart_item ( cart_id, item_id )
//     				VALUES ('" . $cart_id . "', '" . $item_id . "')";
//     		$cart_item_results =   $connection->query($add_item);
// 		}
// 	}else{ // if the user is not logged in, then re-direct him to the login page
// 		header("Location: login.php");
// 	}
// }

function remove_from_cart($connection, $user_id, $item_id){}
function get_total_price($connection, $user_id){}
function validate_mobile($mobile){return preg_match('/^[0-9]{10}+$/', $mobile);}