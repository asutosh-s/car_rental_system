<?php
	include '../includes/config.php';
	$id = $_REQUEST['id'];
	
	$query = "DELETE from bookings WHERE booking_id = '$id' ";
	$result = $conn->query($query);
	if($result === TRUE){
		// echo 'Request has Successfully been Approved';
	?>
		<script type="text/javascript">
			alert("Request has been deleted");
			window.location= ('client_requests.php');
		</script>
	<?php
	}
?>
