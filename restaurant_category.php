<?php

$pageTitle = "Restaurant Category";
include 'init.php';
$connection = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
if(!$connection) 
    die("Connection Failed: ". mysqli_connect_error());

	if (isset($_GET["restaurant_id"]) && !isset($_GET["category"])) {
		$restaurant_id = $_GET["restaurant_id"];
		fetch_all_categories($connection, $restaurant_id);
	}elseif(isset($_GET["restaurant_id"]) && isset($_GET["category"])){
		$restaurant_id = $_GET["restaurant_id"];
		$category = $_GET["category"];
		fetch_certain_categoty($connection, $restaurant_id, $category);
	}
?>