<?php
	session_start();
	include 'header.php';
	include 'includes/config.php';
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

<?php
$sel3 = "UPDATE bookings SET payment_status=1 WHERE booking_id=($_GET[id]-1)";
$conn->query($sel3);

$sel2 = "SELECT vehicle_id from bookings where booking_id=($_GET[id]-1)";
$result = $conn->query($sel2);
$row = $result->fetch_assoc();

// $sel1 = "UPDATE cars set status='Not Available' where vehicle_id=$row[vehicle_id]";
// $conn->query($sel1);

$sel = "UPDATE booked_dates set status=1 where booking_id=($_GET[id]-1)";
$conn->query($sel);

$sela = "DELETE from booked_dates where status=0";
$conn->query($sela);
?>

<section class="listings">
	<div class="wrapper">
		<ul class="properties_list">
			<h2 style="text-align:center; color:#FF0000; font-family: 'Courier New', Courier, monospace">Thank you for sending a request to us. 
			We will get back to you once we verify your payment.<br>
			You can view the processing status of your request in view status.</h2>
		</ul>
		
	</div>
</section>	<!--  end listing section  -->
<?php include_once "includes/footer.php" ?>