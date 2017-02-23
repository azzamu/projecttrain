<?php  
		include 'config/config.php';
		config("localhost", "root", "", "cmlite");

	$query = mysql_query("select * from class");
	if (!$query) {
		die(mysql_error());
	}
	$sort = 1;
	while ($cdata = mysql_fetch_array($query)) {
		echo "<tr>";
		echo "<td>".$sort."</td>";
		echo "<td>".$cdata["class"]." ".$cdata["alphabeth"]."</td>";
		echo "<td>".$cdata["dept"]."</td>";
		echo "<td>".$cdata["years"]."</td>";
		echo "<td>".$cdata["member"]."</td>";
		echo "<td><a href=''>edit</a> | <a href='response.php?removeclass=".$cdata['id']."'>delete</a> | <a href='#'>view</a></td>";
		echo "</tr>";
		$sort++;
	}

	echo "string";

?>