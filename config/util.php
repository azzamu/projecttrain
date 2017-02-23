<?php  

	include 'config.php';

//Request JSON Data

	function request_data($query){
		$query = mysql_query($query);
		$json_data = "[";
		while ($data = mysql_fetch_array($query)) {
			$json_data .= json_encode($data).","; 
		}
		$json_data = rtrim($json_data, ",");
		$json_data .= "]";
		echo $json_data;
	}

	function insert_data($table, $values){
		$query = mysql_query("insert into ".$table." values (".$values.")");
		if (!$query) {
			echo "Failed to Input data : ".mysql_error();
		}else{
			echo "Data Inserted";
		}
	}


//Catch sended GET data

	if (!empty($_GET)) {
		//catch run function
		if (!empty($_GET['run'])){
			//catch function type
			if ($_GET['run'] == "request_data") {
				$_GET['run']($_GET['query']);
			}
		}
	}

?>