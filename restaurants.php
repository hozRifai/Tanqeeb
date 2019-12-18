<?php
    session_start();

    $pageTitle = "Restaurants Page";
    include 'init.php';
    $connection = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
    if(!$connection) 
        die("Connection Failed: ". mysqli_connect_error());
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $search_for_me = $_POST["search"];
        get_certain_restaurants($connection, $search_for_me);
        exit();
    }
    if ($_SERVER['REQUEST_METHOD'] == 'GET'  && isset($_GET["city"]) ) {
        $location = $_GET["city"];
        get_restaurant_of_this_city($connection, $location);
        exit();
    }
?>

<section class="mt-4">
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
 <div class="row mb-3">
    <div class="col">
    </div>
  </div>

<?php    get_all_restaurants($connection); ?>
</div>
</section>