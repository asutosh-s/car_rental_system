<?php
	session_start();
	include 'header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>


	<section class="listings">
		<div class="wrapper">
			<ul class="properties_list">
				<h3 style="text-decoration: underline">Make Payments Here</h3>
				<h5>Paybill Number: 00000</h5>
				<h6>Business Number: ID Number Registered with.</h6>
				<form method="post">
					<table>
						<tr>
							<td>Transaction ID:</td>
							<td><input type="text" name="t_id" required></td>
						</tr>
						
						<tr>
							<td colspan="2" style="margin: 10px; text-align:right;"><input type="submit" name="pay" value="PAY"></td>
						</tr>
					</table>
				</form>

				<?php
					include 'includes/config.php';
                    $mail = $_SESSION['email'];
                    $v_id = $_SESSION['v_id'];
                    $uid = $_SESSION['u_id'];
                    $fdate = $_SESSION['fdate'];
                    $tdate = $_SESSION['tdate'];
                  
                    $se = "SELECT MAX(booking_id) as bid from bookings";
                    $re = $conn->query($se);
                    if($re->num_rows>0)
                    {
                    	$ro = $re->fetch_assoc();
                    	$str1 = $ro['bid'];
                    	// echo $str1;
                    	$str1 = $str1+1;
                    }
                    else
                    {
                    	$str1 = 1;
                    }
                    $sele = "SELECT price_per_day from cars where vehicle_id=$v_id";

                    $rese = $conn->query($sele);
                    $rowe = $rese->fetch_assoc();

                    $dif = "SELECT datediff('$tdate','$fdate') as ddd";
                    $re = $conn->query($dif);
                    $ou = $re->fetch_assoc();
        //             $arrf = explode('-',$fdate);
    				// $arrt = explode('-',$tdate);

    				//insert into booked_dates 
        			//notes from which date the car is Not Available

        			if(!($ou['ddd']>0))
                    {
                    	?>
                    	<script type="text/javascript">
                    		alert("Invalid dates given!!!");
                    		window.location =("book_car.php?id=<?php echo $v_id?>");
                    	</script>
                    	<?php
                    	// header("Location:book_car.php?id=$v_id");
                    }
					$ins = "INSERT into booked_dates values ($str1,$v_id,'$fdate','$tdate',0)";
        			$conn->query($ins);
                    ?>
                    <h2>Your Booking ID is : <?php echo $str1?></h2><br>
                    <h2>Total Payment to be paid : <?php echo $ou['ddd']*$rowe[price_per_day]?></h2><br>
                    <h3>Note it for further Reference</h3>
                    <?php
                    $sel = "INSERT INTO bookings (booking_id,vehicle_id,u_id,from_date,to_date,posting_date,status,payment_status) values ($str1,$v_id,$uid,'$fdate','$tdate',curdate(),0,0)";
                    $res = $conn->query($sel);

						if(isset($_POST['pay'])){
							include 'includes/config.php';
							$t_id = $_POST['t_id'];
							// echo $t_id;
							if($_SESSION['email'])
							{
								$var = $_SESSION['email'];
								// echo $var;
								$sel = "SELECT * FROM users WHERE email_id='$var'";

								$res = $conn->query($sel);
								$row = $res->fetch_assoc();

								// echo $row[u_id];
								$sel2 = "INSERT INTO payment (payment_id,u_id,trasaction_details,trasaction_date,payment_status) VALUES (NULL,$row[u_id],'$t_id',curdate(),1)";
								$conn->query($sel2);

								?>	
								<script type="text/javascript">
									alert("payment successfull");
									window.location.href = ("wait.php?id=<?php echo $str1?>");
								</script>
								<?php
							}
							else
							{
								?>	
								<script type="text/javascript">
									alert("No login id");
									window.location = ("pay.php");
								</script>
								<?php
							}
						}
					  ?>
			</ul>
		</div>
	</section>	<!--  end listing section  -->


<?php include_once "includes/footer.php" ?>