<?php
	include 'header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
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
			
				<h3>Signup Here</h3>
				<form method="post">
					<table>
						<tr>
							<td>Full Name:</td>
							<td><input type="text" name="fname" required></td>
						</tr>
						<tr>
							<td>Phone Number:</td>
							<td><input type="text" name="phone" required></td>
						</tr>
						<tr>
							<td>Email Address:</td>
							<td><input type="email" name="email" required></td>
						</tr>
						<tr>
							<td>Password :</td>
							<td><input type="password" name="pass" required></td>
						</tr>
						<tr>
							<td>Dob:</td>
							<td><input type="Date" name="dob" required></td>
						</tr>
						<tr>
							<td>Address:</td>
							<td><input type="text" name="address" required></td>
						</tr>
						<tr>
							<td colspan="2" style="text-align:right"><input type="submit" name="save" value="Submit Details"></td>
						</tr>
					</table>
				</form>
				<?php
						if(isset($_POST['save'])){
							include 'includes/config.php';
							$fname = $_POST['fname'];
							$pass = $_POST['pass'];
							$email = $_POST['email'];
							$phone = $_POST['phone'];
							$address = $_POST['address'];
							$dob =$_POST['dob'];
							
							echo $fname.$pass.$email.$phone.$address.$dob;
							$qry = "INSERT INTO users VALUES(NULL,'$email','$fname','$pass','$phone','$address','$dob')";
							$result = $conn->query($qry);
							if($result === TRUE){
								if($_GET[id])
								{
									?>
									<script type = "text/javascript">
													alert("Signin Successful.................");
													window.location.href = ("account.php?id=<?php echo $_GET[id]?>");
													</script>
									<?php
								}
								else
								{
								echo "<script type = \"text/javascript\">
											alert(\"Successfully Registered.\");
											window.location = (\"account.php\")
											</script>";
								}
							} 
							else{
								if($_GET[id])
								{
									?>
									<script type = "text/javascript">
													alert("Registration Failed.. Try again.................");
													window.location.href = ("signup.php?id=<?php echo $_GET[id]?>");
													</script>
									<?php
								}
								else
								{
									echo "<script type = \"text/javascript\">
											alert(\"Registration Failed. Try Again\");
											window.location = (\"signup.php\")
											</script>";
								}
							}
						}
						
					  ?>
			</ul>
		</div>
	</section>	<!--  end listing section  -->

<?php include_once "includes/footer.php" ?>