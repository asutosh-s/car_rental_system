<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title>Admin Home</title>
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
	<script type="text/javascript">
		function sureToApprove(id){
			if(confirm("Are you sure you want to Approve this request?")){
				window.location.href ='approve.php?id='+id;
			}
		}
	</script>
</head>
<body>
<!-- Header -->
<div id="header">
	<div class="shell">
		
		<?php
			include 'menu.php';
		?>
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
						<h2 class="left">Client Requests</h2>
						<div class="right">
							<label>search requests</label>
							<input type="text" class="field small-field" />
							<input type="submit" class="button" value="search" />
						</div>
					</div>
					
					<div class="table">
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<th width="13"><input type="checkbox" class="checkbox" /></th>
								<th>Booking ID</th>
								<th>Vehicle Booked</th>
								<th>User Name</th>
								<th>From Date</th>
								<th>To Date</th>
								<th>Posting Date</th>
								<th>Status</th>
								<th>payment status</th>
								<th width="110" class="ac">Content Control</th>
							</tr>
							<?php
								include '../includes/config.php';
								$select = "SELECT bookings.booking_id,cars.brand_name,cars.model,bookings.from_date,bookings.to_date,bookings.posting_date,bookings.status,bookings.payment_status FROM bookings JOIN cars ON bookings.vehicle_id=cars.vehicle_id";
								$result = $conn->query($select);
								while($row = $result->fetch_assoc()){
									$sel2 = "SELECT users.u_name from bookings join users on bookings.booking_id='$row[booking_id]'";
									$res2 = $conn->query($sel2);
									$row2 = $res2->fetch_assoc();
							?>
							<tr>
								<td><input type="checkbox" class="checkbox" /></td>
								<td><h3><a href="#"><?php echo $row['booking_id'] ?></a></h3></td>
								<td><h3><a href="#"><?php echo $row['brand_name']." ".$row['model']; ?></a></h3></td>
								<td><?php echo $row2['u_name'] ?></td>
								<td><a href="#"><?php echo $row['from_date'] ?></a></td>
								<td><a href="#"><?php echo $row['to_date'] ?></a></td>
								<td><a href="#"><?php echo $row['posting_date'] ?></a></td>
								<td><a href="#"><?php echo $row['status'] ?></a></td>
								<td><a href="#"><?php echo $row['payment_status'] ?></a></td>
								<td><a href="approve.php?id=<?php echo "".$row['booking_id']?>" class="ico del">Approve</a><a href="delete_req.php?id=<?php echo "".$row['booking_id']?>" class="ico edit">Delete</a></td>
							</tr>
							<?php
								}
							?>
						</table>
						
					
					</div>
					<!-- <h2><input type="submit" onclick="window.print()" value="Print Here" /></h2> -->
					
				</div>
				<!-- End Box -->

			</div>
			<!-- End Content -->
			
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