<?php
	function arr2str($arr, $start, $interval) {
		$string = "";
		for ($i=$start; $i < $interval; $i++) { 
			# code...
			$string .= $arr[$i];
		}
		return $string;
	};
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Script</title>
</head>
<body>
	<?php
		$file = "brainstorming.txt";
		$handle = fopen("./brainstorming.txt", "r");
		$content = fread($handle, filesize($file));
		$substring1 = explode("-> ", $content);
		$string = arr2str($substring1, 1, 28);
		$substring1 = explode("	", $string);
		$string = arr2str($substring1, 0, sizeof($substring1));
		$substring1 = preg_split("/[\n,]+/", "$string");
		// $substring1 = explode("[\n]", $string);
		for ($i=0; $i < sizeof($substring1); $i++) { 
			# code...
			echo $substring1[$i]."<br />";
		}
		
	?>
	<br />
	<!-- <pre>
		<?php print_r($substring1); ?>
	</pre> -->
</body>
</html>