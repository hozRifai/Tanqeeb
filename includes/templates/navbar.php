<?php 
    session_start();
    $connection = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
    if(!$connection) {
      die("Connection Failed: ". mysqli_connect_error());
    }
    if (isset($_SESSION['user_email'])) {
      $user_email = $_SESSION['user_email'];
      $user_query = "SELECT * FROM users WHERE email = '" . $user_email . "'";
      $user_data = $connection->query($user_query); 
      if (mysqli_num_rows($user_data) > 0) {
        $row = mysqli_fetch_array($user_data);
      }
    }
?>
<header>
  <!-- Start Navbar  -->
  <nav class="navbar navbar-expand-sm  navbar-dark bg-danger box-shadow fixed-top">
      <a class="navbar-brand" href="index.php">
      <span>Tanqeeb | تنقيب    </span></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#houzayfa" 
          aria-controls="houzayfa" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
      </button>

      <?php
      if(isset($_SESSION["user_email"])) {   ?>
                <div class="collapse navbar-collapse" id="houzayfa">
                  <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link" href="restaurants.php">Restaurants</a></li>
                    <li class="nav-item"><a class="nav-link" href="cuisines.php">Cuisines</a></li>
                    <div class="dropdown" >
                        <li class="btn btn-danger dropdown-toggle" data-toggle="dropdown"> <i class="fas fa-graduation-cap"></i> <?php echo $row["first_name"] . $row["last_name"] ; ?> 
                        </li>
                        <li class="nav-item dropdown-menu"> 
                          <a class="dropdown-item" href="user_profile.php">Profile</a>
                          <a class="dropdown-item" href="cart.php">Cart</a>
                          <a class="dropdown-item" href="orders.php">Orders</a>
                          <a class="dropdown-item" href="logout.php">Logout</a>
                        </li>
                    </div>
                  </ul>
                </div>
            <?php
          }else{ ?>
                <div class="collapse navbar-collapse" id="houzayfa">
                  <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link active" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="restaurants.php">Restaurants</a></li>
                    <li class="nav-item"><a class="nav-link" href="cuisines.php">Cuisines</a></li>
                    <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
                    <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
                  </ul>
                </div>
       <?php } ?>
  </nav>
</header>