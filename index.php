<?php
	include 'header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<!-- <title>Car Rental</title> -->
</head>
<body>

<section class="">
		<section class="caption">
			<h2 class="caption" style="text-align: center">Find You Dream Cars For Hire</h2>
			<h3 class="properties" style="text-align: center">Range Rovers - Mercedes Benz - Landcruisers</h3>
		</section>
</section>
<!--  end hero section  -->

	<section class="listings">
		<div class="wrapper">
			<ul class="properties_list">
			<?php
				include 'includes/config.php';
				$sel = "SELECT * FROM cars WHERE status = 'Available'";
				$rs = $conn->query($sel);
				while($rws = $rs->fetch_assoc()){
			?>
				<li >
					<a href="book_car.php?id=<?php echo $rws['vehicle_id'] ?>">
						<img class="thumb" src="cars/<?php echo $rws['image'];?>" width="280" height="190">
					</a>
					<span class="price"><?php echo 'Rs.'.$rws['price_per_day'];?></span>
					<div class="property_details">
						<h1>
							<a href="book_car.php?id=<?php echo $rws['vehicle_id'] ?>"><?php echo 'Car Make>'.$rws['brand_name'];?></a>
						</h1>
						<h2>Car Name/Model: <span class="property_size"><?php echo $rws['model'];?></span></h2>
					</div>
				</li>
			<?php
				}
			?>
			</ul>
		</div>
	</section>	<!--  end listing section  -->
<?php include_once "includes/footer.php"; ?>