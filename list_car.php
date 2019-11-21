<?php
if(isset($_POST["submit"])){
  $selections = array("brand","model","fuel_type","seat_capacity","air_conditioner","power_stearing","brake_assist","price_range");
  $sel_value = array("Select Brand","Select Model","Fuel Type","Seat Capacity","Air Conditioner","Power Stearing","Brake Assist","Price Range");
  $val = array();
  for ($i=0; $i < 1; $i++) { 
    # code...
    $val[] = $_POST[$selections[$i]];
    // array_push($val,$_POST[$selections[$i]]);
    if($val[$i] == $sel_value[$i]){
      echo ($selections[$i]."not selected");
    }
  }
  // if($val[4]=="Yes")
  //   $val[4] = 1;
  // else
  //   $val[4] = 0;
  // if($val[5]="Yes")
  //   $val[5] = 1;
  // else
  //   $val[5] = 0;
  // if($val[6]=="Yes")
  //   $val[6] = 1;
  // else
  //   $val[6] = 0;
  include 'includes/config.php';
  $sela = "SELECT * FROM cars WHERE brand_name='$val[0]'";
  $rst = $conn->query($sela);
  while($rws = $rst->fetch_assoc())
  {
    ?>
      <li >
          <a href="book_car.php?id=<?php echo $rws['vehicle_id'] ?>">
            <img class="thumb" src="cars/<?php echo $rws['image'];?>" width="280" height="190">
          </a>
          <span class="price"><?php echo 'Rs.'.$rws['price_per_day'];?></span>
          <div class="property_details">
            <h1>
              <a href="book_car.php?id=<?php echo $rws['vehicle_id'] ?>"><?php echo 'Car Make>'.$rws['brand_name'];?></a>
            </h1>
            <h2>Car Name/Model: <span class="property_size"><?php echo $rws['model'];?></span></h2>
          </div>
      </li>
    <?php
  }
  }
?>