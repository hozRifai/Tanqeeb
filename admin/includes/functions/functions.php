<?php
/*
=============================================================================================|
|            =>  Back End Function                                                           |
|            =>  Coded By Houzayaf Rifai                                                     |
|            =>  Thing Twice  Code Once !                                                    |
|============================================================================================|
*/

DEFINE('DB_HOST', 'localhost');
DEFINE('DB_USERNAME', 'root');
DEFINE('DB_PASSWORD', '');
DEFINE('DB_NAME', 'restaurant');

$connection = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
if(!$connection) {
	die("Connection Failed: ". mysqli_connect_error());
}




function display_users($connection){
	$users_query = "SELECT * FROM users WHERE group_id = 0";
	$users_results = $connection->query($users_query);
	echo "<h3>Active Users</h3><table style=\" margin-top:60px;\" class=\"table\">
		  <thead>
		    <tr>
		      <th scope=\"col\">First Name</th>
		      <th scope=\"col\">Last Name</th>
		      <th scope=\"col\">Email</th>
		      <th scope=\"col\">Phone Number</th>
		    </tr>
		  </thead>
		  <tbody>";

		if(mysqli_num_rows($users_results) > 0) {
			while ($row = mysqli_fetch_array($users_results) ) {
				echo "<tr>
					      <td>{$row["first_name"]}</td>
					      <td>{$row["last_name"]}</td>
					      <td scope=\"row\">{$row["email"]}</td>
					      <td>{$row["phone_number"]}</td>
				    </tr>";
			}
			echo "
				  	</tbody>
					</table>";
		}else{
			echo "You have no users in your DB, perhaps you want to add a new user!";
		}
}

function display_restaurants($connection){
	$users_query = "SELECT * FROM restaurant";
	$users_results = $connection->query($users_query);
	echo "<h3>Restaurant</h3><table style=\" margin-top:60px;\" class=\"table\">
		  <thead>
		    <tr>
		      <th scope=\"col\">Restaurant Name</th>
		      <th scope=\"col\">Avg_delivery_time</th>
		      <th scope=\"col\">delivery_fee</th>
		      <th scope=\"col\">location</th>
		      <th scope=\"col\">image</th>
		      <th scope=\"col\">rating</th>
		      <th scope=\"col\">phone_number</th>
		      <th scope=\"col\">opening_closing_time</th>
		    </tr>
		  </thead>
		  <tbody>";

		if(mysqli_num_rows($users_results) > 0) {
			while ($row = mysqli_fetch_array($users_results) ) {
				echo "<tr>
					      <td>{$row["restaurant_name"]}</td>
					      <td>{$row["avg_delivery_time"]}</td>
					      <td scope=\"row\">{$row["delivery_fee"]}</td>
					      <td>{$row["location"]}</td>
					      <td>{$row["image"]}</td>
					      <td>{$row["rating"]}</td>
					      <td>{$row["phone_number"]}</td>
					      <td>{$row["opening_closing_time"]}</td>
				    </tr>";
			}
			echo "
				  	</tbody>
					</table>";
		}else{
			echo "You have no users in your DB, perhaps you want to add a new user!";
		}
}