<?php 
session_start();
if(!isset($_SESSION['admin'])==TRUE)
  {
    header("location:../login and registration/login.php");
  }

  include('config.php');

 $oid = $_POST['oid'];



 $sdate = $_POST['shipping_date'];

 $delivery_status = $_POST['delivery_status'];

 $dd = $_POST['delivery_detials'];

 $tn = rand(1000000000,9999999999);

  $bq = "SELECT * FROM `billing` WHERE order_id = '$oid'";

  $bp = mysql_query($bq,$con);

  while($br = mysql_fetch_array($bp))
  {
     $bid = $br['id'];

     $ddq = "DELETE FROM `delivery` WHERE billing_id = '$bid'";

     $ddp = mysql_query($ddq,$con);
     
     $q = "INSERT INTO `delivery`(`billing_id`, `tracking_number`, `date_shipped`, `delivery_status`, `delivery_details`) VALUES ($bid,'$tn','$sdate','$delivery_status','$dd')";

     $p = mysql_query($q,$con);

     if($p)
     {
       echo '<script type="text/javascript"> 
                 alert("Delivery Details Added Successfully"); 
              window.location.href = "orders.php";
              </script>;';
     }
  }

?>