<!doctype html>
<html lang="en">
<head>
	<?php header('Content-type: text/html; charset=utf-8'); ?>
	<title>Show Profile</title>
</head>
<body>
	<?php
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

		//assign the query
		$query = "SELECT * FROM user_profile";
			
		//execute the query
		$result = mysql_query($query);
		if (!$result) {
			die ("Could not query the database:<br />". mysql_error());
		}
		else
			echo "Query was successful! <br /><br />";
	?>

		<table border="1px" cellspacing="3" cellpadding="5" align="right"><tr><td align="right" width="auto" height="auto">حیثیت</td><td align="right" width="auto" height="auto">نام</td></tr>

	<?php

		//fetch and find the latest entry no.
		while($row = mysql_fetch_array($result)) {
	  	echo "<tr>";
	  	echo "<td align=\"right\">" . $row['Status'] . "</td>";
	  	echo "<td align=\"right\">" . $row['Name'] . "</td>";
	  	echo "</tr>";
		}

		echo "</table>";
		
		//close the connection
		mysql_close($connection);
	?>
</body>
</html>