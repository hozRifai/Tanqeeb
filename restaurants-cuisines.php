<?php
    session_start();
    $pageTitle = "Restaurants Cuisines";
    include 'init.php';
    $connection = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
	get_all_restaurants_under_certain_cuisine($connection, $_POST["cuisine"]);