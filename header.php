<?php
	session_start();
	error_reporting("E-NOTICE");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Car Rental</title>
	<meta charset="utf-8">
	<meta name="author" content="pixelhint.com">
	<meta name="description" content="La casa free real state fully responsive html5/css3 home page website template"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0" />
	
	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="stylesheet" type="text/css" href="css/responsive.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">


	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/main.js"></script>
</head>

<header>
			<div class="wrapper">
					<h1 class="logo" style="color: #2ecc91"> Car Company</h1>
					<a href="#" class="hamburger"></a>
					<nav>
						<?php
							if(!$_SESSION['email'] && (!$_SESSION['pass'])){
						?>
						<ul>
							<li><a href="index.php">Home</a></li>
							<li><a href="search_car.php">Search Cars</a></li>
							<li><a href="#">About</a></li>
							<li><a href="#">Contact</a></li>
						</ul>
						<a href="account.php">Client Login</a>
						<a href="login.php">Admin Login</a>
						<?php
							} else{
						?>
								<ul>
									<li><a href="index.php">Home</a></li>
									<li><a href="search_car.php">Search Cars</a></li>
									<li><a href="status.php">View Status</a></li>
									<li><a href="message_admin.php">Give Feed Back</a></li>
								</ul>
						<a href="admin/logout.php">Logout</a>
						<?php
							}
						?>
					</nav>
			</div>
</header>

</html>