<?php
	session_start();
	if(!isset($_SESSION['admin_email'])){
		header('Location: index.php');
	}else{
		$pageTitle = "Admin Dashboard";
		include 'init.php';
		include $templates . 'connection.php';

		$connection = mysqli_connect(DB_HOST,
			DB_USERNAME, DB_PASSWORD, DB_NAME);
		if(!$connection) {
			die("Cconnection Failed: ". mysqli_connect_error());
		}
		$users_query = "SELECT * FROM users WHERE group_id = 0";
		$users_results = $connection->query($users_query);
		display_users($users_results);
	}

function display_users($users_results){
	echo "<table style=\" margin-top:60px;\" class=\"table\">
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
?>