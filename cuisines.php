<?php
    session_start();
    $pageTitle = "Cuisines Page";
    include 'init.php';
    $connection = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
    if(!$connection) 
        die("Connection Failed: ". mysqli_connect_error());
    if (isset($_GET["cuisine"])) {
        get_all_restaurants_under_certain_cuisine($connection, $_GET["cuisine"]);
        exit();
    }elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $search_for_me = $_POST["search"];
        get_certain_cuisines($connection, $search_for_me);
        exit();
    }?>
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

        <?php    get_all_cuisines($connection); ?>
    </div>