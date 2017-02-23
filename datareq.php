<?php  
	include 'config/config.php';
	$query = mysql_query("select * from students");
	echo "[";
	while ($data = mysql_fetch_array($query)) {
		echo json_encode($data); 
	}
	echo "]";
	
?>