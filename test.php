<?php 

include 'init.php';
$connection = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
define('MYSQL_NUM',MYSQLI_NUM);
$my_query = "SELECT * FROM item";

$results = $connection->query($my_query);	
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
if (mysqli_num_rows($results) > 0) {
	while ($row = mysqli_fetch_array($results)) {
		// echo $row["name"] . "      " . $row["price"] . "      " .  $row["size"]. "<br>";
		print_r($row);
		echo "<br>";
echo "<br>";
	}
	echo "<br>";
echo "<br>"; 
}

// if (mysqli_num_rows($results) > 0) {
// 	// while ($row = mysqli_fetch_array($results)) {
// 	// 	echo $row["name"] . "      " . $row["price"] . "      " .  $row["size"]. "<br>";
// 	// }
// 	while($row = mysqli_fetch_row($results)){
// 		// for ($i=0; $i < mysqli_num_fields($results); $i++) { 
// 		// 	 echo $row[$i];
// 		// }
// 		foreach ($row as $attribute) {
// 			echo $attribute;
// 		}
// 		echo "<br>";
// 	}
// }
mysqli_close($connection);