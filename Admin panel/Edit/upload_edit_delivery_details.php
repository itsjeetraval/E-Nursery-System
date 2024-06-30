<?php 
session_start();
if(!isset($_SESSION['admin'])==TRUE)
  {
    header("location:../../login and registration/login.php");
  }

  include('../config.php');

 $bid = $_POST['oid'];

echo $bid;
 

 $sdate = $_POST['shipping_date'];

 $delivery_status = $_POST['delivery_status'];

 $dd = $_POST['delivery_detials'];


     $q = "UPDATE `delivery` SET `date_shipped`= '$sdate',`delivery_status`='$delivery_status',`delivery_details`='$dd' WHERE id = '$bid'";

     $p = mysql_query($q,$con);

     if($p)
     {
       echo '<script type="text/javascript"> 
                 alert("Delivery Details Updated Successfully"); 
              window.location.href = "../orders.php";
              </script>;';
     }
  

?>