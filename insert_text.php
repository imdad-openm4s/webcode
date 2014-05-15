<?php
	// define variables and set to empty values
	$name = $status  = "";
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$name = test_input($_POST["name"]);
		$status = test_input($_POST["status"]);
	}

	function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	include('db_login.php');

	//connect
	$connection = mysql_connect($db_host, $db_username, $db_password);

	//checking
	if (!$connection) {
		die("Could not connect to the database: <br />". mysql_error());
	}
	else
		echo "Your connection was successful! <br /><br />";
	
	//selecting the database
	$db_select = mysql_select_db($db_database);
	if (!$db_select) {
		die ("Could not select the database: <br />". mysql_error());
	}
	else
		echo "You selected the database successully! <br /><br />";
		
	mysql_query("SET NAMES UTF8");
		
	//assign the query to insert the values into "books".
	$query = "INSERT INTO user_profile VALUES (NULL,'$name','$status')";
		
	//inserting the values now
	$result = mysql_query($query);
	if (!$result) {
		die ("Could not query the database:<br />". mysql_error());
	}
	else
		echo "Query was successful! <br /><br />";

	echo "<button onclick=\"location.href = './show_text.php';\" id=\"myButton\">Show Profile</button>";
	
	//close the connection
	mysql_close($connection);
?>