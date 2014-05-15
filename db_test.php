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
		
	//assign the query
	$query = "SELECT * FROM books NATURAL JOIN authors";
	
	//execute the query
	$result = mysql_query($query);
	if (!$result) {
		die ("Could not query the database:<br />". mysql_error());
	}
	else
		echo "Query was successful! <br /><br />";
		
	//fetch and display the results
	while($result_row = mysql_fetch_row(($result))){
		echo 'TITLE: '.$result_row[1]. '<br />';
		echo 'Author: '.$result_row[4]. '<br />';
		echo 'Author_id: '.$result_row[3]. '<br />';
		echo 'Pages: '.$result_row[2]. '<br /><br />';
		echo 'Title ID: '.$result_row[0]. '<br /><br />';
	}
	
	//close the connection
	mysql_close($connection);
?>