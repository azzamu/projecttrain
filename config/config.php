<?php  

function config($servername, $username, $password, $databasename){
	$connect = mysql_connect($servername, $username, $password);
	$dbselect = mysql_select_db($databasename);
	if (!$connect) {
		die("Could not Connect to Server : ".mysql_error());
	}else{
		if (!$dbselect) {
			die("Cannot Select Database : ".mysql_error()."<br /> Pastikan anda telah membuat databasenya");
		}else{
			
		}
	}
}

config("localhost", "root", "", "cmlite");

function newclass($class, $alphabeth, $dept, $year){
	$query = mysql_query("insert into class values('', '$class', '$alphabeth', '$dept', '$year')");
	if ($query) {
		return 1;
	}else{
		return 0;
	}
}


function newstudent($fullname, $email, $class_id, $nisn){
	$query = mysql_query("insert into student values('', '$fullname', '$email', '$class_id', '$nisn')");
	if ($query) {
		return 1;
	}else{
		return 0;
	}
}	

function removedata($table, $id){
	$query = mysql_query("delete from ".$table." where id=".$id);
		echo mysql_error();
	if (!$query) {
		echo mysql_error();
	}else{
		if ($table == "class") {
			update_class_table("id");
		}else if($table == "student"){
			update_comunity_table("id");
		}
	}
}

function find_class($id){
	$query = mysql_query("SELECT * FROM class WHERE id = $id");
	if(mysql_num_rows($query) == 1){
		while($cdata = mysql_fetch_array($query)){
			return $cdata["class"]." ".$cdata["dept"]." ".$cdata["alphabeth"];
		}
	}else{
		return "no such class";
	}
		
	
}

function update_class_table($shortby){
	$query =  mysql_query("select class.id, class.class, class.alphabeth,class.dept, class.years, (SELECT count(*) from student where student.class_id = class.id) as member from class ORDER BY ".$shortby." ASC");
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
		echo "<td class='tools' data-table=\"class\" data-id=\"".$cdata["id"]."\"><a onClick='javascript:dbTools(\"edit\")'>edit</a> | <a onClick='javascript:dbTools(\"delete\")'>delete</a>";
		echo "</tr>";
		$sort++;
	}
}

function update_comunity_table($shortby){
	$query = mysql_query("select * from student ORDER BY ".$shortby." ASC");
	if (!$query) {
		die(mysql_error());
	}
	$sort = 1;
	while ($cdata = mysql_fetch_array($query)) {
		echo "<tr>";
		echo "<td>".$sort."</td>";
		echo "<td>".$cdata["fullname"]."</td>";
		echo "<td>".find_class($cdata["class_id"])."</td>";
		echo "<td>".$cdata["nisn"]."</td>";
		echo "<td class='tools' data-table=\"student\" data-id=\"".$cdata["id"]."\"><a onClick='javascript:dbTools(\"edit\")'>edit</a> | <a onClick='javascript:dbTools(\"delete\")'>delete</a>";
		echo "</tr>";
		$sort++;
	}
}

function listing_available_class(){
	$query = mysql_query("SELECT * from class ORDER BY concat(class, dept, alphabeth) ASC");
	if (!$query) { echo "<option>".mysql_error()."</option>"; }
	echo "<option disabled selected>Kelas</option>";
	while ($cdata = mysql_fetch_array($query)) {
		echo "<option value='".$cdata['id']."'>".$cdata['class']." ".$cdata['dept']." ".$cdata['alphabeth']." &nbsp;@&nbsp; ".$cdata['years']."</option>"; 	
	}
}



?>