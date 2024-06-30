<?php 
session_start();
if(!isset($_SESSION['admin'])==TRUE)
  {
    header("location:../login and registration/login.php");
  }

  include('con_inc.php');


  $uid = $_SESSION['uid'];

  $cid = $_POST['cart_id'];

  $qty = $_POST['qty'];

  $q = "UPDATE cart SET product_quantity='$qty' WHERE id='$cid'";

  $p = mysql_query($q,$con);

  

?>