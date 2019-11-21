<?php
	session_start();
	include 'header.php';
	include 'includes/config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<!-- <title>Car Rental</title>
	<meta charset="utf-8">
	<meta name="author" content="pixelhint.com">
	<meta name="description" content="La casa free real state fully responsive html5/css3 home page website template"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0" />
	
	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="stylesheet" type="text/css" href="css/responsive.css">

	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/main.js"></script> -->
</head>
<body>
<section class="">
	<section class="caption">
		<h2 class="caption" style="text-align: center">Find You Dream Cars For Hire</h2>
		<h3 class="properties" style="text-align: center">Range Rovers - Mercedes Benz - Landcruisers</h3>
	</section>
</section><!--  end hero section  -->

	<section class="listings">
		<div class="wrapper">
			<ul class="properties_list">
			<?php
				include 'includes/config.php';
				$sel = "SELECT * FROM cars WHERE vehicle_id = '$_GET[id]'";
				$rs = $conn->query($sel);
				$rws = $rs->fetch_assoc();
			?>
				<li>
					<a href="book_car.php?id=<?php echo 
					$rws['vehicle_id'] ?>">
						<img class="thumb" src="cars/<?php echo $rws['image'];?>" width="300" height="200">
					</a>
					<span class="price"><?php echo 'Rs.'.$rws['price_per_day'];?></span>
					<div class="property_details">
						<h1>
							<a href="book_car.php?id=<?php echo $rws['vehicle_id'] ?>"><?php echo 'Car Make>'.$rws['brand_name'];?></a>
						</h1>
						<h2>Car Name/Model: <span class="property_size"><?php echo $rws['model'];?></span></h2>
					</div>
				</li>
				<h3>Details of <?php echo $rws['brand_name']." ".$rws['model'];?>. </h3>
				<div class="show_details">
					<li>
						<ol>Brand : <?php echo $rws['brand_name'];?> </ol>
						<ol>Model : <?php echo $rws['model'];?></ol>
						<ol>Model Year: <?php echo $rws['model_year'];?></ol>
						<ol>Fuel Type : <?php echo $rws['fuel_type'];?></ol>
						<ol>Seat Capacity : <?php echo $rws['seat_capacity'];?></ol>
						<ol>Air Conditioner : <?php 
									if($rws['air_conditioner'])
										echo "Available";
									else
										echo "Not Available";
												?></ol>
						<ol>Power Stearing : <?php 
									if($rws['power_stearing'])
										echo "Available";
									else
										echo "Not Available";
												?></ol>
						<ol>Brake Assists : <?php 
									if($rws['brake_assist'])
										echo "Available";
									else
										echo "Not Available";
												?></ol>
					</li>
						<?php
							if(!$_SESSION['email'] && (!$_SESSION['pass']))
							{
								?>
								<a href="account.php?id=<?php echo $rws['vehicle_id']?>">Login ! To book this car</a>
								<!-- <form method="post">
									<input type="hidden" name="form" value="A">
									<input type="submit" name="process" value="Login ! For book this car"> 
								</form> -->
								<?php
							} 
							else
							{
								$_SESSION['v_id'] = $rws['vehicle_id'];
								?>
									<form method="post">
										From Date: <input type="date" name="from_date" required><br>
										To Date: <input type="date" name="to_date" required><br>
										<input type="submit" name="click" value="Click to Book">
									</form>
								<?php
								if(isset($_POST['click']))
								{
									$_SESSION['fdate'] = $_POST['from_date'];
									$_SESSION['tdate'] = $_POST['to_date'];
									?>
									<script type="text/javascript">
										window.location.href = ('pay.php');
									</script>
									<?php
								}
							}
						?>
				</div>
			</ul>
		</div>
	</section>	<!--  end listing section  -->

<?php include_once "includes/footer.php" ?>