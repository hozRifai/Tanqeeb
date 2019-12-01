<?php
$pageTitle = "Cart";
include 'init.php';
$connection = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
// keep tracking the number of items in the cart page 
if (!isset($_SESSION["number_of_items"])) {
	$_SESSION["number_of_items"] = 0; 
}
if (!isset($_SESSION["total_price"])) {
	$_SESSION["total_price"] = 0; 
}
?>


<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	if (isset($_POST["add"])) {
		if(isset($_SESSION["cart"])){ // if user has cart 
			$item_array = array(
				"item_id" => $_POST["id"],
				"item_name" => $_POST["name"],
				"item_quantity" => $_POST["quantity"],
				"item_price" => $_POST["price"],
				"item_size" => $_POST["size"]
			); 
			$_SESSION["cart"][] = $item_array;
			$_SESSION["total_price"] += $_POST["price"]; 
			$_SESSION["number_of_items"] += 1;
		}else{ // create cart session for user 
			$item_array = array(
					"item_id" => $_POST["id"],
					"item_name" => $_POST["name"],
					"item_quantity" => $_POST["quantity"],
					"item_price" => $_POST["price"],
					"item_size" => $_POST["size"]
				); 
			$_SESSION["cart"][0] = $item_array;
			$_SESSION["total_price"] += $_POST["price"]; 
			$_SESSION["number_of_items"] += 1;
		}
	}
	if (isset($_POST["delete"])) {
			foreach ($_SESSION["cart"] as $key => $value) {
				if($value["item_id"] == $_POST["id"]){
					unset($_SESSION["cart"][$key]);
					echo '<script> alert("item has been removed")</script>';
					$_SESSION["number_of_items"] -= 1; 
					$_SESSION["total_price"] -= $value["item_price"]; 
					// header("Refresh:0");
				}
			}
	}
}

// if (isset($_SESSION["user_email"]) && isset($_SESSION["cart"])) {
// 	foreach ($_SESSION["cart"] as $key => $value) {
// 		echo $value["item_name"] . $value["item_price"] . $value["item_size"] . "<br>";
// 	}
// }

?>
<section style="margin-top: 8%;">
<div class="container mb-4">
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
            <?php if (isset($_SESSION["user_email"]) && isset($_SESSION["cart"]) ) { ?>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col"> </th>
                            <th scope="col">Item</th>
                            <th scope="col" class="text-center">Quantity</th>
                            <th scope="col" class="text-right">Price</th>
                            <th scope="col" class="text-right">size</th>
                            <th> </th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($_SESSION["cart"] as $key => $value) { ?>
                        <tr>
                            <td><img src="http://infinityflamesoft.com/html/restarunt-preview/assets/img/menu/menu-3.jpg" width="40" height="35" /> </td>
                            <td><?php echo "{$value["item_name"]}";?></td>

                            <td style="text-align: center;">
                                <?php echo "{$value["item_quantity"]}";?>
                            </td>
                            <td class="price text-right"><?php echo "{$value["item_price"]}";?></td>
                            <td class="price text-right"><?php echo "{$value["item_size"]}";?></td>
                            <td class="text-right">
                            	<form method="POST" action="">
                            		<input type="hidden" name="id" value="<?php echo "{$value["item_id"]}";?>">
                            		<button name="delete" class="btn btn-sm btn-danger">
	                                	<a >
	                                		<i class="fa fa-trash"></i>
	                                	</a>
                                	</button>
                            	</form>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            <?php }else{ ?>
                <h3 class="col-sm-12 mt-5 mb-2">You Have No Products In Your Cart Yet!</h3>
            <?php }?>
            </div>
        </div>
        <div class="col mb-2">
            <div class="row">
                <div class="col-sm-12  col-md-6">
                    <a href="restaurants.php" style="text-decoration: none;"> <button class="btn btn-lg btn-block btn-light text-uppercase">Continue Shopping</button></a>
                </div>
                <?php if ($_SESSION["number_of_items"] > 0 ) {?>
                <div class="col-sm-12 col-md-6 text-right">
                    <a href="checkout.php" class="btn btn-lg btn-block btn-info text-uppercase" style="text-decoration: none; color: #fff;">Check Out <?php echo $_SESSION["total_price"] ?> </a>
                </div>
                <?php } ?>
            </div>
        </div>

    </div>
    </div>
</section>