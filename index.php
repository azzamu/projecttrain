<!DOCTYPE html>
<html>
<head>

	<?php  
		include 'config/config.php';

		if (!empty($_GET["location"])) {
			$location = $_GET["location"];
		}else{
			$location = 'dashboard';
		}
	?>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="css/animate.css"/>
	<link rel="stylesheet" type="text/css" href="css/font-awesome.css"/>
	<link rel="stylesheet" type="text/css" href="css/main.css"/>
	<script type="text/javascript" src="http://localhost/res/js/jquery.min.js"></script>
	<script type="text/javascript" src="http://localhost/res/js/bootstrap.js"></script>
	<script type="text/javascript" src="http://localhost/res/js/chart.min.js"></script>
	<title></title>
</head>
<body>

<div class="alert-wrap">
	<div class="alert alert-success alert-dismissible">
	  	<span><strong>Warning!</strong> Better check yourself, you're not looking too good.</span>
	</div>
</div>

<div class="header-wrap">
	<div class="sidebar-header">
		<img src="img/logo.png">
	</div>

	<div class="header">
		<div class="navbar"></div>
		<div class="statbar">
			<span class="path"> Cmlite <i class='fa fa-caret-right'></i> Dasboard <i class='fa fa-caret-right'></i></span>
		</div>
	</div>
</div>

<div class="main-wrap">
	
	<div class="sidebar">
		<div class="sidebar-body">
			<div class="colapse-menu">

				<ul>
					<li data-name="dashboard"><a class="menu" href="#dashboard">
						<i class="fa fa-tachometer"></i>
						<span class="hide-on-mobile">dashboard</span>
					</a></li>
					<li data-name="statistics"><a class="menu" href="#statistics">
						<i class="fa fa-line-chart"></i>
						<span class="hide-on-mobile">statistik</span>
					</a></li>
					<li data-name="class"><a class="menu" href="#class">
						<i class="fa fa-university"></i>
						<span class="hide-on-mobile">kelas</span>
					</a></li>
					<li data-name="student"><a class="menu" href="#student">
						<i class="fa fa-user-circle-o"></i>
						<span class="hide-on-mobile">siswa</span>
					</a></li>
					<li data-name="message"><a class="menu" href="#message">
						<i class="fa fa-envelope"></i>
						<span class="hide-on-mobile">pesan</span>
					</a></li>
					<li data-name="billboard"><a class="menu" href="#billboard">
						<i class="fa fa-list-alt"></i>
						<span class="hide-on-mobile">pengumuman</span>
					</a></li>
				</ul>

			</div>
		</div>
		<div class="sidebar-footer">
			<ul>
				<li class="footer-menu" title="Chat"><a href="#"><i class="fa fa-comment"></i></a></li>
				<li class="footer-menu" title="Total Data : 0"><a href="#"><i class="fa fa-database"></i></a></li>
				<li class="footer-menu" title="Logout"><a href="#"><i class="fa fa-power-off"></i></a></li>
				<li class="footer-menu" title="Info"><a href="#"><i class="fa fa-info-circle"></i></a></li>
				<li class="footer-menu" title="Active User : 0"><a href="#"><i class="fa fa-circle"></i></a></li>
			</ul>
		</div>
	</div>

	<div class="main">
		<div class="content">
			<div class="page" id="dashboard"><?php include 'dashboard.php'; ?></div>
			<div class="page" id="statistics"><?php include 'statistics.php'; ?></div>
			<div class="page" id="class"><?php include 'class.php'; ?></div>
			<div class="page" id="student"><?php include 'student.php'; ?></div>
			<div class="page" id="message"><?php include 'message.php'; ?></div>
			<div class="page" id="billboard"><?php include 'billboard.php'; ?></div>
			<div class="page active" id="dashboard"></div>
		</div>
	</div>

</div>



</body>

<script type="text/javascript" src="js/main.js"></script>

</html>
