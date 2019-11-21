<?php
	session_start();
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



	<section class="search">
		<div class="wrapper">
		<div id="fom">
			<form method="post">
			<h3 style="text-align:center; color: #000099; font-weight:bold; text-decoration:underline">Client Login Area</h3>
				<table height="100" align="center">
					<tr>
						<td>Email Address:</td>
						<td><input type="email" name="email" placeholder="Enter Email Address" required></td>
					</tr>
					<tr>
						<td>Password:</td>
						<td><input type="password" name="pass" placeholder="Enter ID Number" required></td>
					</tr>
					<tr>
						<td><input type="submit" name="log" value="Login Here"></td>
						<td style="text-align:right;">
							<?php
							if($_GET[id]){
							?>
								<a href="signup.php?id=<?php echo $_GET[id]?>">Signup Here</a>
							<?php
							}
							else
							{
							?>
								<a href="signup.php">Sigup Here</a>
							<?php
							}
							?>
						</td>
					</tr>
				</table>
			</form>
			<?php
				if(isset($_POST['log'])){
					include 'includes/config.php';
					
					$uname = $_POST['email'];
					$pass = $_POST['pass'];
					
					$qy = "SELECT * FROM users WHERE email_id = '$uname' AND pass = '$pass'";
					$selid = "SELECT * FROM cars WHERE vehicle_id= '$_GET[id]'";

					$log = $conn->query($qy);
					$num = $log->num_rows;
					$row = $log->fetch_assoc();

					$rsid = $conn->query($selid);
					$numid = $rsid->num_rows;
					$rowid = $rsid->fetch_assoc();

					if($num > 0){
						$_SESSION['email'] = $row['email_id'];
						$_SESSION['pass'] = $row['pass'];
						$_SESSION['u_id'] = $row['u_id'];
						if($_GET[id])
						{
							$var = $rowid['vehicle_id'];
							?>
							<script type = "text/javascript">
											alert("Login Successful.................");
											window.location.href = ("book_car.php?id=<?php echo $var?>");
											</script>
							<?php
							//header("Location:book_car.php?id=".$var);
						}
						else
						{
							echo "<script type = \"text/javascript\">
										alert(\"Login Successful.................\");
										window.location = (\"index.php\")
										</script>";
						}
					} else{
						echo "<script type = \"text/javascript\">
									alert(\"Login Failed. Try Again................\");
									window.location = (\"account.php\")
									</script>";
					}
				}
			?>
			</div>
			<a href="#" class="advanced_search_icon" id="advanced_search_btn"></a>
		</div>

	</section><!--  end search section  -->

<?php include_once "includes/footer.php"; ?>