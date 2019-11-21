<?php
	include 'header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <!-- <link rel="stylesheet" type="text/css" href="css/main.css"> -->
</head>
<body>
<section class="">
	<section class="caption">
		<h2 class="caption" style="text-align: center">Find You Dream Cars For Hire</h2>
		<h3 class="properties" style="text-align: center">Range Rovers - Mercedes Benz - Landcruisers</h3>
	</section>
</section>
<!--  end hero section  -->

<!-- Filter-Form -->
<section id="filter_form" class="gray-bg" style="margin:0 100px 100px 100px" >
  <div class="container">
    <h3>Find Your Dream Car <span>(Easy search from here)</span></h3>
    <div class="row">
      <form method="post" action="">
        <!-- </div> -->
        <div class="form-group black_input">
          <!-- <div class="select"> -->
            <select class="form-control" name="brand">
              <option>Select Brand</option>
              <option>MARUTI</option>
              <option>BMW</option>
              <option>AUDI</option>
              <option>TOYOTA</option>
              <option>FERRARI</option>
              <option>TESLA</option>
              <option>LAMBORGHINI</option>
              <option>NISSAN</option>
            </select>
          <!-- </div> -->
        </div>
        <div class="form-group black_input">
          <!-- <div class="select"> -->
            <select class="form-control" name="model">
              <option>Model</option>
              <option>swift</option>
              <option>r8</option>
              <option>x3</option>
              <option>gtr</option>
              <option>458</option>
              <option>models</option>
              <option>aventador</option>
            </select>
          <!-- </div> -->
        </div>
        <div class="form-group black_input">
          <!-- <div class="select"> -->
            <select class="form-control" name="fuel_type">
              <option>Fuel Type</option>
              <option>petrol</option>
              <option>diesel</option>
              <option>electric</option>
            </select>
          <!-- </div> -->
        </div>
        <div class="form-group black_input">
          <!-- <div class="select"> -->
            <select class="form-control" name="seat_capacity">
              <option>Seat Capacity</option>
              <option>4</option>
              <option>5</option>
              <option>8</option>
            </select>
          <!-- </div> -->
        </div>
        <div class="form-group black_input">
          <!-- <div class="select"> -->
            <select class="form-control" name="air_conditioner">
              <option>Air Conditioner</option>
              <option>Yes</option>
              <option>No</option>
            </select>
          <!-- </div> -->
        </div>
        <div class="form-group black_input">
          <!-- <div class="select"> -->
            <select class="form-control" name="power_stearing">
              <option>Power Stearing</option>
              <option>Yes</option>
              <option>No</option>
            </select>
          <!-- </div> -->
        </div>
        <div class="form-group black_input">
          <!-- <div class="select"> -->
            <select class="form-control" name="brake_assist">
              <option>Brake Assist</option>
              <option>Yes</option>
              <option>No</option>
            </select>
          <!-- </div> -->
        </div>
        <div class="form-group black_input">
          <!-- <div class="select"> -->
            <select class="form-control" name="price_per_day">
              <option>Price Per day</option>
              <option>20000</option>
              <option>40000</option>
              <option>80000</option>
            </select>
          <!-- </div> -->
        </div>

        <div class="form-select">
          <button type="submit" class="btn" name="submit" value="submit">Search Car </button>
        </div>
      </form>
    </div>
  </div>
  <div align="center" style="margin-top: 30px">
    <a href="type_search.php">
      <button style="width: 160px; height: 40px; font-size: 18px">
        <h4>Search with text</h4>
      </button>
    </a>
  </div>
  
</section>
<!-- /Filter-Form --> 

<?php
if(isset($_POST["submit"])){
  $selections = array("brand","model","fuel_type","seat_capacity","air_conditioner","power_stearing","brake_assist","price_per_day");
  $sel_value = array("Select Brand","Select Model","Fuel Type","Seat Capacity","Air Conditioner","Power Stearing","Brake Assist","Price Per day");
  $val = array();
  for ($i=0; $i < 8; $i++) { 
    # code...
    $val[] = $_POST[$selections[$i]];
    // array_push($val,$_POST[$selections[$i]]);
    if($val[$i] == $sel_value[$i]){
      ?>
      <h1 style="margin-left: 200px">
      <?php echo ($selections[$i]." not selected");?>
      </h1>
      <?php
    }
  }
  if($val[4]=="Yes")
    $val[4] = 1;
  else
    $val[4] = 0;
  if($val[5]=="Yes")
    $val[5] = 1;
  else
    $val[5] = 0;
  if($val[6]=="Yes")
    $val[6] = 1;
  else
    $val[6] = 0;

  include 'includes/config.php';
  $sela = "SELECT * FROM cars WHERE brand_name='$val[0]' and model='$val[1]' and price_per_day=$val[7] and fuel_type='$val[2]' and seat_capacity='$val[3]' and air_conditioner=$val[4] and power_stearing=$val[5] and brake_assist=$val[6]";
  $rst = $conn->query($sela);

  if($rst->num_rows > 0)
  {
  while($rws = $rst->fetch_assoc())
  {
    ?>
    <section class="listings">
    <div class="wrapper">
      <ul class="properties_list">
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
    </ul>
    </div>
  </section>
    <?php
  }
  }
  else
  {
    ?>
      <h1 style="margin-left: 200px">
      <?php echo ("car with selected options not available");?>
      </h1>
      <?php
  }
  }
?>

<?php include "includes/footer.php"; ?>
