<?php 

session_start();
if(!isset($_SESSION['login'])==TRUE)
  {
    header("location:../login and registration/login.php");
  }

  include('con_inc.php');


  $uid = $_SESSION['uid'];

  $pid = $_POST['pid'];

  $pstkq = "SELECT * FROM `product` WHERE id = '$pid'";

  $pstkp = mysql_query($pstkq,$con);
 
  while($pstkr = mysql_fetch_array($pstkp))
  {
      $pstk = $pstkr['product_stock'];
  }

  $qty = $_POST['mod_qty'];

  if($qty>$pstk)
  {
    echo '<script type="text/javascript"> 
                 alert("Invalid quantity !"); 
                 window.location.href = "cart.php";
                </script>;';
  }
  else
  {

 $cid = $_POST['cart_id'];

$q = "UPDATE cart SET product_quantity = $qty WHERE id = '$cid' ";

$p = mysql_query($q,$con);

if($p)
{
	 header('location:cart.php');
}
else
{
	 echo "".mysql_error();
}
}


?>