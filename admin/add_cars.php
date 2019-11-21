<?php
	include '../includes/config.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title>Admin Home</title>
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
</head>
<body>
<div id="header">
	<div class="shell">
		
		<?php
			include 'menu.php';
		?>
		</div>
	</div>
</div>

<div id="container">
	<div class="shell">
		
		<br />
		
		<div id="main">
			<div class="cl">&nbsp;</div>
			
			<div id="content">
				
				<div class="box">
					<div class="box-head">
						<h2>Add New Vehicles</h2>
					</div>
					
					<form method="post" enctype="multipart/form-data">
						
						<div class="form">
								<p>
									<span class="req">max 100 symbols</span>
									<label>Brand Name <span>(Required Field)</span></label>
									<input type="text" class="field size1" name="brand_name" required />
								</p>	
								<p>
									<span class="req">max 20 symbols</span>
									<label>Model <span>(Required Field)</span></label>
									<input type="text" class="field size1" name="model" required />
								</p>
								<p>
									<span class="req">max 20 symbols</span>
									<label>Price Per day <span>(Required Field)</span></label>
									<input type="text" class="field size1" name="price_per_day" required />
								</p>
								<p>
									<span class="req">Current Images</span>
									<label>Vehicle Image <span>(Required Field)</span></label>
									<input type="file" class="field size1" name="image" required />
								</p>
								<p>
									<span class="req">In Terms of fuel type</span>
									<label>Fuel type<span>(Required Field)</span></label>
									<input type="text" class="field size1" name="fuel_type" required />
								</p>
								<p>
									<span class="req">In Terms of Passenger Seats</span>
									<label>Seat capacity<span>(Required Field)</span></label>
									<input type="number" class="field size1" name="seat_capacity" required />
								</p>
								<p>
									<div class="form-group"><h2>Air Conditioner</h2>
							            <select name="air_conditioner" required>
							              <!-- <option>Air Conditioner</option> -->
							              <option>Yes</option>
							              <option>No</option>
							            </select>
							        </div>
								</p>
								<p>
									<div class="form-group"><h2>Power Stearing :</h2>
							            <select name="power_stearing" required>
							              <!-- <option>Power Stearing</option> -->
							              <option>Yes</option>
							              <option>No</option>
							            </select>
							        </div>
								</p>
								<p>
									<div class="form-group"><h2>Brake Assist :</h2>
							            <select name="brake_assist" required>
							              <!-- <option>Brake Assist</option> -->
							              <option>Yes</option>
							              <option>No</option>
							            </select>
							        </div>
								</p>	
								<p>
									<span class="req">In Terms of origin</span>
									<label>Model year<span>(Required Field)</span></label>
									<input type="number" class="field size1" name="model_year" required />
								</p>	
						</div>
						
						<div class="buttons">
							<input type="submit" class="button" value="submit" name="send" />
						</div>
						
					</form>
					<?php
							if(isset($_POST['send'])){
								
								$target_path = "../cars/";
								$target_path = $target_path . basename ($_FILES['image']['name']);
								if(move_uploaded_file($_FILES['image']['tmp_name'], $target_path)){
								
								$image = basename($_FILES['image']['name']);
								$brand = $_POST['brand_name'];
								$model = $_POST['model'];
								$ppd = $_POST['price_per_day'];
								$ftype = $_POST['fuel_type'];
								$capacity = $_POST['seat_capacity'];
								$acnd = $_POST['air_conditioner'];
								$brke = $_POST['brake_assist'];
								$powr = $_POST['power_stearing'];
								$mdl = $_POST['model_year'];

								if($acnd=="Yes")
								    $acnd = 1;
								  else
								    $acnd = 0;
								  if($brke=="Yes")
								    $brke = 1;
								  else
								    $brke = 0;
								  if($powr=="Yes")
								    $powr = 1;
								  else
								    $powr = 0;
								
								$qr = "INSERT INTO cars (vehicle_id,brand_name,model,price_per_day,image,fuel_type,seat_capacity,air_conditioner,power_stearing,brake_assist,model_year,status) 
													VALUES (NULL,'$brand','$model',$ppd,'$image','$ftype',$capacity,$acnd,$powr,$brke,$mdl,'Available')";
								$res = $conn->query($qr);
								if($res === TRUE){
									?>
									<script type = "text/javascript">
											alert("Vehicle Succesfully Added");
											window.location = ("add_vehicles.php")
									</script>
									<?php
									}
								else
								{
									?>
									<script type = "text/javascript">
											alert("Vehicle cannot be Added");
											window.location = ("add_vehicles.php")
									</script>
									<?php
								}
							}
						}
						?>
				</div>

			</div>
			
			<div id="sidebar">
				
				<div class="box">
					
					<div class="box-head">
						<h2>Management</h2>
					</div>
					
					<div class="box-content">
						<a href="add_vehicles.php" class="add-button"><span>View Our Vehicles</span></a>
						<div class="cl">&nbsp;</div>
						
					</div>
				</div>
			</div>
			
			<div class="cl">&nbsp;</div>			
		</div>
	</div>
</div>

<div id="footer">
	<div class="shell">
		<span class="left">&copy; <?php echo date("Y");?> - Get_Set_go</span>
	</div>
</div>
	
</body>
</html>