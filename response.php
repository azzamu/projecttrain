<?php  
include 'config/config.php';

if (!empty($_POST['class'])) {
	$class = $_POST['class'];
	$dept = $_POST['dept'];
	$alph = $_POST['alph'];
	$year = "20".$_POST['year1']." / 20".$_POST['year2'];
	if (newclass($class, $alph, $dept, $year) == 1) {
		header("location:index.php#class?classregistered=true");
	}else{
		echo mysql_error();
	}
}

if (!empty($_POST['fullname'])) {
	$fullname = $_POST['fullname'];
	$email = $_POST['email'];
	$nisn = $_POST['nisn'];
	$class_id = $_POST['class_id'];
	if (newstudent($fullname, $email, $class_id, $nisn) == 1) {
		header("location:index.php#class?studentregistered=true");
	}else{
		echo mysql_error();
		echo $fullname." ".$email." ".$nisn." ".$class_id;
	}
}

if (!empty($_GET['removedataid'])){
	removedata($_GET['table'], $_GET['removedataid']);
}



if (!empty($_GET['runfunc'])) {
	if (!empty($_GET["param"])) {
		$param = $_GET["param"];
		$_GET["runfunc"]($param);
	}else{
		$_GET["runfunc"]("id");
	}
}

//Response Function


?>
