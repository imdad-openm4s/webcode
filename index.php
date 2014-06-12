<!doctype html>
<html lang="en">
<head>
	<?php header('Content-type: text/html; charset=utf-8'); ?>
	<title>Urdu Insertion MySQL</title>
</head>
<body>
	<form method="post" action="insert_text.php">
		<input type="text" name="name" value="" />
		<input type="text" name="status" value="" />
		<input type="submit" name="submit_btn" value="Go!" />
	</form>
	<button onclick="location.href = './show_text.php';" id="myButton">Show Profile</button>
	<br /><br /><br />
	<?php
		echo "Today is :".date('Y-m-d');
		echo "<br>";
	?>
</body>
</html>