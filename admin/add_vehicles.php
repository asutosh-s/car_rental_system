<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title>Admin Home</title>
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
	<!-- <script type="text/javascript">
		function sureToApprove(id){
			if(confirm("Are you sure you want to delete this car?")){
				window.location.href ='delete_car.php?id='+id;
			}
		}
	</script> -->
</head>
<body>
<!-- Header -->
<div id="header">
	<div class="shell">
		
		<?php
			include 'menu.php';
		?>
		</div>
		<!-- End Main Nav -->
	</div>
</div>

<div id="container">
	<div class="shell">
		
		<br />
		
		<div id="main">
			<div class="cl">&nbsp;</div>
			
			<div id="content">
				
				<div class="box">
					<!-- Box Head -->
					<div class="box-head">
						<h2 class="left">Our Vehicles</h2>
						<div class="right">
							<label>search vehicles</label>
							<input type="text" class="field small-field" />
							<input type="submit" class="button" value="search" />
						</div>
					</div>
					
					<div class="table">
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<th width="13"><input type="checkbox" class="checkbox" /></th>
								<th>Vehicle ID</th>
								<th>Brand Name</th>
								<th>Model</th>
								<th>Price Per day</th>
								<th>Fuel Type</th>
								<th>Seat Capacity</th>
								<th>Air Conditioner</th> 
								<th>Power Stearing</th> 
								<th>Brake Assist</th>
								<th width="110" class="ac">Content Control</th>
							</tr>
							<?php
								include '../includes/config.php';
								$select = "SELECT * FROM cars WHERE status = 'Available'";
								$result = $conn->query($select);
								while($row = $result->fetch_assoc()){
							?>
							<tr>
								<td><input type="checkbox" class="checkbox" /></td>
								<td><h3><a href="#"><?php echo $row['vehicle_id'] ?></a></h3></td>
								<td><?php echo $row['brand_name'] ?></td>
								<td><a href="#"><?php echo $row['model'] ?></a></td>
								<td><a href="#"><?php echo $row['price_per_day'] ?></a></td>
								<td><a href="#"><?php echo $row['fuel_capacity'] ?></a></td>
								<td><a href="#"><?php echo $row['seat_capacity'] ?></a></td>
								<td><a href="#"><?php echo $row['air_conditioner'] ?></a></td>
								<td><a href="#"><?php echo $row['power_stearing'] ?></a></td>
								<td><a href="#"><?php echo $row['brake_assist'] ?></a></td>
								<td><a href="delete_car.php?id=<?php echo $row['vehicle_id']?>" class="ico del">Delete</a></td>
							</tr>
							<?php
								}
							?>
						</table>
						
					</div>
				
					
				</div>
				<!-- End Box -->

			</div>
			<!-- End Content -->
			
			<!-- Sidebar -->
			<div id="sidebar">
				
				<!-- Box -->
				<div class="box">
					
					<!-- Box Head -->
					<div class="box-head">
						<h2>Management</h2>
					</div>
					<!-- End Box Head-->
					
					<div class="box-content">
						<a href="add_cars.php" class="add-button"><span>Add new Vehicles</span></a>
						<div class="cl">&nbsp;</div>
						
					</div>
				</div>
				<!-- End Box -->
			</div>
			<!-- End Sidebar -->
			
			<div class="cl">&nbsp;</div>			
		</div>
		<!-- Main -->
	</div>
</div>
<!-- End Container -->

<!-- Footer -->
<div id="footer">
	<div class="shell">
		<span class="left">&copy; <?php echo date("Y");?> - Get_Set_go</span>
	</div>
</div>
<!-- End Footer -->
	
</body>
</html>