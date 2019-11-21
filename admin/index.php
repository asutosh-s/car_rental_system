<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title>Admin Home</title>
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
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
						<h2 class="left">Users Registered</h2>
						<div class="right">
							<label>search user</label>
							<input type="text" class="field small-field" />
							<input type="submit" class="button" value="search" />
						</div>
					</div>
					
					<div class="table">
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<th width="13"><input type="checkbox" class="checkbox" /></th>
								<th>U ID</th>
								<th>Email ID</th>
								<th>User Name</th>
								<th>Contact No</th>
								<th>Address</th>
								<th>Date Of Birth</th>
								<th width="110" class="ac">Content Control</th>
							</tr>
							<?php
								include '../includes/config.php';
								$select = "SELECT * FROM users";
								$result = $conn->query($select);
								while($row = $result->fetch_assoc()){
							?>
							<tr>
								<td><input type="checkbox" class="checkbox" /></td>
								<td><h3><a href="#"><?php echo $row['u_id'] ?></a></h3></td>
								<td><a href="#"><?php echo $row['email_id'] ?></a></td>
								<td><a href="#"><?php echo $row['u_name'] ?></a></td>
								<td><a href="#"><?php echo $row['contact_no'] ?></a></td>
								<td><a href="#"><?php echo $row['address'] ?></a></td>
								<td><a href="#"><?php echo $row['dob'] ?></a></td>
								<td><a href="delete_user.php?id=<?php echo $row['u_id']?>" class="ico del">Delete</a></td>
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
						<a href="#" class="add-button"><span>Send Messages</span></a>
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
		<span class="left">&copy; <?php echo date("Y");?> - Get_Set_Go</span>
	</div>
</div>
<!-- End Footer -->
	
</body>
</html>