<?php
	include '../includes/config.php';
	$id = $_REQUEST['id'];
	$query = "UPDATE bookings SET status = 1 WHERE booking_id = '$id'";
	$result = $conn->query($query);
	if($result === TRUE){
		// echo 'Request has Successfully been Approved';
	?>
		<script type="text/javascript">
			alert("request has been Approved");
			window.location= ('client_requests.php');
		</script>
	<?php
	}
?>
