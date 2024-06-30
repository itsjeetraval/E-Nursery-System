<?php 
session_start();
if(!isset($_SESSION['login'])==TRUE)
  {
    header("location:../login and registration/login.php");
  }

  include('con_inc.php');


  $uid = $_SESSION['uid'];

  $cid = $_GET['order_id'];

  $pid = $_GET['pid'];

  $pstk = $_GET['pstk'];

  $qty = $_GET['pqty'];

 $upstk = $pstk + $qty ; 
 
 $upstkq = "UPDATE `product` SET `product_stock`= $upstk WHERE id = '$pid'";

 $upstkp = mysql_query($upstkq,$con);   

?>
<?php 

$q = "DELETE FROM `order` WHERE id = '$cid'";

$p = mysql_query($q,$con);


if($upstkp)
{

if($p)
{
    
      


      echo '<script type="text/javascript"> 
                 
              window.location.href = "customer_order.php";
              </script>;';


    
    
  

              
}
}
else
{
   echo mysql_error();
}


?>