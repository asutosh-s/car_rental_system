<?php
	include '../includes/config.php';
	$id = $_REQUEST['id'];
	
	$query = "DELETE from feed_back WHERE f_id = $id ";
	$result = $conn->query($query);
	if($result === TRUE){
		// echo 'Request has Successfully been Approved';
	?>
		<script type="text/javascript">
			alert("Message has been deleted");
			window.location= ('add_messages.php');
		</script>
	<?php
	}
?>
