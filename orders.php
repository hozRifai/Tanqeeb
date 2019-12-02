 <?php
 	session_start();
	if (!isset($_SESSION['user_email'])) {
		header('Location: restaurants.php');
	} else {
		$pageTitle = "Orders page";
		include 'init.php';
}
	$user_order = "SELECT * FROM orders WHERE user_email = '" . $_SESSION["user_email"] . "'";
	$user_results = $connection->query($user_order);
	if (mysqli_num_rows($user_results) > 0 ) {
		$has_orders = true;
	}
?>

<section class="orders" style="margin-top: 7%;">
	<div class="container">
		<div class="row">
			<div class="col-lg-3">
				<h6 class="text-muted text-center">Your Orders</h6> 
			      <ul class="list-group">
			        <li class="list-group-item"><i class="fas fa-male text-info mx-2"></i>
			        	<a href="orders.php?orders=new_olders" style=" color: inherit;">New Orders </a>
			        </li>
			        <li class="list-group-item"><i class="fas fa-venus text-warning mx-2"></i>
			        	<a href="orders.php?orders=old_olders" style=" color: inherit;">Old Orders </a>
			    	</li>
			      </ul>
			</div>
			<div class="col-lg-8">
				<?php 
						if (strpos($_SERVER['REQUEST_URI'], 'new_olders') !== false) {
						    if ($has_orders) {
						    		$orders = "SELECT * FROM orders WHERE user_email = '" . $_SESSION["user_email"] . "' AND status = \"not confirmed\"";
									$orders_results = $connection->query($orders);
									if (mysqli_num_rows($orders_results) > 0 ) {
										while ($row = mysqli_fetch_array($orders_results)) {
											$inner_query = "SELECT * FROM order_items , item WHERE order_id = '" . $row["order_id"] . "' AND
															item.id = order_items.item_id";
											$inner_query_results = $connection->query($inner_query);
											if (mysqli_num_rows($inner_query_results) > 0) {
											  	while ($inner_row = mysqli_fetch_array($inner_query_results)) {
											  		?>
														<div class="single_menu_list">
															  <img name="src" src="http://infinityflamesoft.com/html/restarunt-preview/assets/img/menu/menu-3.jpg" alt="">
															  <div class="menu_content">
																 <h4><?php echo $inner_row["name"] ?> 
																 <span>AED<?php echo "{$inner_row["price"]} / {$inner_row["size"]}";?></span></h4>
																 <p name="ingredients"><?php echo $inner_row["ingredients"] ?>   </p>
															  </div>
												   		</div>
											  		<?php
											  	}
											  }  
										}
									}
						    }else{
						    	echo "You have no orders yet!";
						    }
						}elseif (strpos($_SERVER['REQUEST_URI'], 'old_olders') !== false) {
							if ($has_orders) {
						    		$orders = "SELECT * FROM orders WHERE user_email = '" . $_SESSION["user_email"] . "' AND status = \"confirmed\"";
									$orders_results = $connection->query($orders);
									if (mysqli_num_rows($orders_results) > 0 ) {
										while ($row = mysqli_fetch_array($orders_results)) {
											$inner_query = "SELECT * FROM order_items , item WHERE order_id = '" . $row["order_id"] . "' AND
															item.id = order_items.item_id";
											$inner_query_results = $connection->query($inner_query);
											if (mysqli_num_rows($inner_query_results) > 0) {
											  	while ($inner_row = mysqli_fetch_array($inner_query_results)) {
											  		?>
														<div class="single_menu_list">
															  <img name="src" src="http://infinityflamesoft.com/html/restarunt-preview/assets/img/menu/menu-3.jpg" alt="">
															  <div class="menu_content">
																 <h4><?php echo $inner_row["name"] ?> 
																 <span>AED<?php echo "{$inner_row["price"]} / {$inner_row["size"]}";?></span></h4>
																 <p name="ingredients"><?php echo $inner_row["ingredients"] ?>   </p>
															  </div>
												   		</div>
											  		<?php
											  	}
											  }  
										}
									}
							}else{
								echo "You have no orders yet!";
							}
						}
				?>

			</div>
		</div>
	</div>
</section>