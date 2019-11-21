<?php
	include 'header.php';
  include 'includes/config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <!-- <link rel="stylesheet" type="text/css" href="css/main.css"> -->
  <link rel="stylesheet" type="text/css" href="css/new_style.css">
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
<section id="filter_form" class="gray-bg" style="margin:0 100px 100px 20px" >
  <div class="container">
    <h3>Find Your Dream Car <span>(Easy search from here)</span></h3>
    <div class="row">
      <form method="post" action="">
        <div align="center" class="search_box" style="">
          <textarea placeholder="Write youer keywords here" name="search_text" cols="50" rows="10"></textarea>
        </div>
        <h4 style="background-color: #ff5413; color: #2e1212; position: relative; margin:10px auto; text-align: center; width: 300px;">Note : Use ',' to separate keywords</h4>
        <div class="form-select">
          <button type="submit" class="btn" name="submit" value="submit">Search Car </button>
        </div>
      </form>
    </div>
  </div>
</section>
<!-- /Filter-Form --> 

<?php
if(isset($_POST["submit"])){
    $var = $_POST['search_text'];
    if($var)
    {
      $arr = array();
      $arr = explode(',',$var);
      $si = sizeof($arr);
      $sel = "SELECT type,value,sel_type from mappings where input=replace(trim('$arr[0]'),'\r\n','')";
      $res = $conn->query($sel);
      if($row = $res->fetch_assoc())
      {
        if($row['sel_type']==1)
          $tmp = "".$row['type']."=".$row['value'];
        else if($row['sel_type']==2)
          $tmp2 = "".$row['type']." ".$row['value'];
      }
      for ($i=1; $i < $si; $i++) { 
        # code...
        // echo $arr[$i];
        $sel = "SELECT type,value,sel_type from mappings where input=replace(trim('$arr[$i]'),'\r\n','')";
        $res = $conn->query($sel);
        if($row = $res->fetch_assoc())
        {
          if($row['sel_type']==1)
            $tmp = $tmp." and ".$row['type']."=".$row['value'];
          else if($row['sel_type']==2)
            $tmp2 = "".$row['type']." ".$row['value'];
        }
      }
      // echo $tmp;
      // echo $row['type']." ".$row['value'];
      if($tmp)
      {
        if($tmp2)
        {
          $tmp = "where status='Available' and ".$tmp." order by ".$tmp2;
        }
        else
        {
          $tmp = "where status='Available' and ".$tmp;
        } 
      }
      else
      {
        if($tmp2)
        {
          $tmp = "where status='Available' order by ".$tmp2;
        }
        else
        {
          $tmp = "where status='Available'";
        }
      }
      // echo $tmp;
      if(($tmp=="where status='Available'"))
      {
        ?>
        <h1 style="margin-left: 200px">
        <?php echo ("please give valid specifications");?>
        </h1>
        <?php
      }
      else
      {
            $sel2 = "SELECT *from cars $tmp";
            // echo $sel2;
            $res2 = $conn->query($sel2);
            if($res2->num_rows>0)
            {?>
              <section class="show">
              <?php
              while($rws = $res2->fetch_assoc())
              {
                // echo $row2['brand_name'];
                ?>
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
                <?php
              }
              ?>
              </section>
              <?php
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
    }
    else
    {
       ?>
        <h1 style="margin-left: 200px">
        <?php echo ("please give some specifications");?>
        </h1>
        <?php
       }
  }
?>

<?php include "includes/footer.php"; ?>
