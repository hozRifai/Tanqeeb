<?php
$pageTitle = "Check Out Page";
include 'init.php';
$connection = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
?>

<div class="container">
	<?php 
       if (isset($_SESSION["user_email"]) && isset($_SESSION["cart"])) {?>

	      <div class="row " style="margin-top: 7%;">
	        <div class="col-md-4 order-md-2 ">
	          <h4 class="d-flex justify-content-between align-items-center ">
	            <span class="text-muted mt-4" style="margin-bottom: 8%;">Your cart</span>
	            <span class="badge badge-secondary badge-pill"><?php echo $_SESSION["number_of_items"] ; ?></span>
	          </h4>

	          <ul class="list-group">
	          	<?php 
				foreach ($_SESSION["cart"] as $key => $value) {?>

		            <li class="list-group-item d-flex justify-content-between lh-condensed">
		              <div>
		                <h6 class="my-0" style="color: #212529 !important;"><?php echo $value["item_name"] ;?></h6>
		              </div>
		              <span class="text-muted"><?php echo $value["item_price"];?> AED</span>
		            </li>
	            	<?php  } ?>
		              <li class="list-group-item d-flex justify-content-between lh-condensed">
		                  <div>
		                    <h6 class="my-0" style="color: #212529 !important;">Shippment</h6>
		                  </div>
		                  <span class="text-muted">7 AED</span>
		                </li>
		            <li class="list-group-item d-flex justify-content-between">
		              <span>Total (AED)</span>
		              <strong><?php echo $_SESSION["total_price"] + 7;?> AED</strong>
		            </li>
		          </ul>

		        </div>

        <div class="col-md-8 order-md-1">
          <h4 style="color: black; margin-top: 3%; margin-left: -67%;">Billing address</h4>
          <form method="POST" action="add_address.php">
            <div class="mb-3">
              <label for="address">Street</label>
              <input type="text" class="form-control" name="street_address" placeholder="1234 Main St" required>
            </div>

            <div class="mb-3">
              <label for="address2">Apartment Number<span class="text-muted"></span></label>
              <input type="text" class="form-control" name="apartment_number" placeholder="k5" required >
            </div>


            <input class="btn btn-danger btn-lg btn-block mb-4" type="submit" name="address_form" value="Order Now">
          </form>
        </div>
      </div> <?php } ?>
    </div>