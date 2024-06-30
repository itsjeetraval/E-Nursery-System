<?php 

session_start();
if(!isset($_SESSION['login'])==TRUE)
  {
    header("location:../login and registration/login.php");
  }

  include('con_inc.php');

?>


<?php 

$uid = $_SESSION['uid'];
$cartq = "SELECT * FROM cart WHERE user_id = '$uid'";

$cartp = mysql_query($cartq,$con);

if($cartp)
{
	 while($cartr = mysql_fetch_array($cartp))
	 {
	 	$cid = $cartr['id'];
	 	$u_id = $cartr['user_id'];

	 	 $pid = $cartr['product_id'];

	 	 $qty = $cartr['product_quantity'];


	 	 $date = date('Y-m-d');

	 	 

	 
	 		$orderq = "INSERT INTO `order`(`user_id`, `product_id`, `quantity`, `order_date`) VALUES ($u_id,$pid,$qty,'$date')";

	 	$orderp = mysql_query($orderq,$con);

	 	if($orderp)
	 	{
	 		$stock = $cartr['product_stock'];
	        
	        $upstock = $stock - $qty;

	        $proq = "UPDATE product SET product_stock='$upstock' WHERE id = '$pid'";

	        $prop = mysql_query($proq,$con);

	        if($prop)
	        {

	        	
	        	  $oidq = "SELECT * FROM `order` WHERE user_id='$uid' AND product_id = '$pid'";

	        	  $oidp = mysql_query($oidq,$con);

	        	  $dcq = "DELETE FROM cart WHERE id = '$cid'";

	        	$dcp = mysql_query($dcq,$con);

	        	  while($oidr = mysql_fetch_array($oidp))
	        	  {
	        	  	$oid = $oidr['id'];
	        	  	

	        	  	$invoice = rand(1000000000,9999999999);

	        	  	$date = date('Y-m-d');



	        	 $bq = "INSERT INTO `billing`(`order_id`, `invoice_number`, `billing_date`) VALUES ($oid,$invoice,'$date')";

	        	 $bp = mysql_query($bq,$con);

	        	 $dcq = "DELETE FROM cart WHERE id = '$cid'";

	        	$dcp = mysql_query($dcq,$con);
             
             if($bp)
	        	{
	        		 echo '<script type="text/javascript"> 
                 alert("Order placed successfully !!"); 
                 window.location.href = "Bill/invoice.php";
                </script>;';
	        	}



	        	}
	        	

	        }
	        

	 	}
	 	



	 	 
	 
	
    

     }



}





?>