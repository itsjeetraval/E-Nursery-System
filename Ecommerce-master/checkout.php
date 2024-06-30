<?php 

session_start();
if(!isset($_SESSION['login'])==TRUE)
  {
    header("location:../login and registration/login.php");
  }

  include('con_inc.php');


  $uid = $_SESSION['uid'];

   

?>
<?php 


$q = "SELECT * FROM cart WHERE user_id = '$uid'";

$p = mysql_query($q,$con);


if($p)
{
	while($r = mysql_fetch_array($p))
	{
		 $pid = $r['product_id'];
		 $pqty = $r['product_quantity'];
		 $priceq = "SELECT * FROM product WHERE id='$pid'";

		 $pricep = mysql_query($priceq,$con);

		 if($pricep)
		 {

        while($pricer = mysql_fetch_array($pricep))
        {
        	  $price = $pricer['product_price'];
        	  $ttl = $pqty * $price;
        	  echo $ttl.",";
        }
		 }
	}
}















?>