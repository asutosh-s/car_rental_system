<?php
	include '../includes/config.php';
	$id = $_REQUEST['id'];
	
	$query = "DELETE from cars WHERE vehicle_id = $id ";
	$result = $conn->query($query);
	if($result === TRUE){
		// echo 'Request has Successfully been Approved';
	?>
		<script type="text/javascript">
			alert("Car has been deleted");
			window.location= ('add_vehicles.php');
		</script>
	<?php
	}
?>
