<!doctype html>
<html lang="en">
<head>
	<?php header('Content-type: text/html; charset=utf-8'); ?>
	<title>Show Profile</title>
	<link rel="stylesheet" type="text/css" href="./urdufont.css" media="all" />
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

	<h1>میٹنگ نمبر 1</h1>
	<br />

	<table id="utext" cellspacing="1" cellpadding="2" align="right"><tr id="header"><td align="right" width="auto" height="auto">حیثیت</td><td align="right" width="auto" height="auto">نام</td></tr>

	<?php

		//fetch and find the latest entry no.
		$i = 1; // for separtating each individual record (row-wise)
		while($row = mysql_fetch_array($result)) {
			if($i>='2' && $i%2=='0') {
				$oddrow = " id=\"oddrow\"";
			} else {
				$oddrow = "id=\"evenrow\"";
			}
		  	echo "<tr ".$oddrow.">";
		  	echo "<td align=\"right\">" . $row['status'] . "</td>";
		  	echo "<td align=\"right\">" . $row['name'] . "</td>";
		  	echo "</tr>";
		  	$i = $i+1;
		}

		echo "</table>";
		
		//close the connection
		mysql_close($connection);
	?>
</body>
</html>