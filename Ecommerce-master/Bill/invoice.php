<?php 

session_start();
if(!isset($_SESSION['login'])==TRUE)
  {
    header("location:../../login and registration/login.php");
  }

  include('../con_inc.php');


$uid = $_SESSION['uid'];
  
?>


<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Bill</title>

		<style>
			.invoice-box {
				max-width: 800px;
				margin: auto;
				padding: 30px;
				border: 1px solid #eee;
				box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
				font-size: 16px;
				line-height: 24px;
				font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
				color: #555;
			}

			.invoice-box table {
				width: 100%;
				line-height: inherit;
				text-align: left;
			}

			.invoice-box table td {
				padding: 5px;
				vertical-align: top;
			}

			.invoice-box table tr td:nth-child(2) {
				text-align: right;
			}

			.invoice-box table tr.top table td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.top table td.title {
				font-size: 45px;
				line-height: 45px;
				color: #333;
			}

			.invoice-box table tr.information table td {
				padding-bottom: 40px;
			}

			.invoice-box table tr.heading td {
				background: #eee;
				border-bottom: 1px solid #ddd;
				font-weight: bold;
			}

			.invoice-box table tr.details td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.item td {
				border-bottom: 1px solid #eee;
			}

			.invoice-box table tr.item.last td {
				border-bottom: none;
			}

			.invoice-box table tr.total td:nth-child(2) {
				border-top: 2px solid #eee;
				font-weight: bold;
			}

			@media only screen and (max-width: 600px) {
				.invoice-box table tr.top table td {
					width: 100%;
					display: block;
					text-align: center;
				}

				.invoice-box table tr.information table td {
					width: 100%;
					display: block;
					text-align: center;
				}
			}

			/** RTL **/
			.invoice-box.rtl {
				direction: rtl;
				font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
			}

			.invoice-box.rtl table {
				text-align: right;
			}

			.invoice-box.rtl table tr td:nth-child(2) {
				text-align: left;
			}
		</style>
	</head>

	<body>
		<?php 

		$oidq = "SELECT * FROM `order` WHERE user_id = '$uid'";

		$oidp = mysql_query($oidq,$con);

		if($oidp)
		{
			while($oidr = mysql_fetch_array($oidp))
			{

				$pid = $oidr['product_id'];

			

				$qty = $oidr['quantity'];

		

				$oid = $oidr['id'];

				 $bq = "SELECT * FROM `billing` WHERE order_id = '$oid'";

				 $bp = mysql_query($bq,$con);

				 $bnr = mysql_num_rows($bp);

			
				}
			}
			

				 if($bp)
				 {
				 	while($br = mysql_fetch_array($bp))
				 	{
				 		$uidq = "SELECT * FROM `user_registration` WHERE id = '$uid'";

				 		$uidp = mysql_query($uidq,$con);

				 		if($uidp)
				 		{
				 			while($uidr = mysql_fetch_array($uidp))
				 			{
				 				$pq = "SELECT * FROM `product` WHERE id = '$pid'";

				 				$pp = mysql_query($pq,$con);

				 				while($pr = mysql_fetch_array($pp))
				 				{




				?>

		<div class="invoice-box">
			<table cellpadding="0" cellspacing="0">
				<tr class="top">
					<td colspan="2">
						<table>
							<tr>
								<td class="title">
									<img src="Bill img/logo.png" style="width: 100%; max-width: 300px" />
								</td>


								<td>
									Bill Id:<?php echo $br['id'] ?> <br />
									Created:<?php echo  $br['billing_date'] ?><br />
									
								</td>
							</tr>
						</table>
					</td>
				</tr>

				<tr class="information">
					<td colspan="2">
						<table>
							<tr>
								<td>
									<?php 
									echo "Address : ".$uidr['address']."<br>";
									echo "Area : ".$uidr['area']."<br>";
									echo "Pincode : ".$uidr['pincode'];
									?>
								</td>

								<td>
									<?php echo "Name : ".$uidr['user_name'] ?><br />
									<?php echo "Phone Number : ".$uidr['phone_number'] ?><br/>
									<?php echo "Email : ".$uidr['email_id'] ?>
								</td>
							</tr>
						</table>
					</td>
				</tr>

				<tr class="heading">
					<td>Payment Method</td>
					<td></td>

					<td>Cash On Delivery</td>
				</tr>
				<?php 
			}
		}
	}
}
}



				?>

				

				<tr class="heading">
					<td>Item</td>
					<td><center>Invoice Number</center></td>

					<td>Price</td>
				</tr>  <?php 

        $uid = $_SESSION['uid'];

        

         $q = "SELECT * FROM `order` WHERE user_id = '$uid'";

         $p = mysql_query($q,$con);

         $t = 0;

    

         
          while($r = mysql_fetch_array($p))
          {

             $p_id = $r['product_id'];

             $oid = $r['id'];

             $qty = $r['quantity'];

             $rn = mysql_num_rows($p);



             
                          

              $pq = "SELECT * FROM product WHERE id = '$p_id'";

          $pp = mysql_query($pq,$con);
                 
             
                
                 if($pp)
                 {
                     while($pr = mysql_fetch_array($pp))
                     {
                        $rn = mysql_num_rows($pp);


                        $amount = $r['quantity'] * $pr['product_price'];

                        $t = $t + $amount; 
                        


           

         


                        ?>

				<tr class="item">
					<?php

	                 $inq = "SELECT * FROM `billing` WHERE order_id = '$oid'";

	                 $inp = mysql_query($inq,$con);

	                 while($inr = mysql_fetch_array($inp))
	                 {


					 ?>
					<td><?php echo $pr['product_name']?></td>
					<td><center><?php echo $inr['invoice_number'] ?></center></td>
					<?php
					} 

					?>

					

					<td><?php echo $qty*$pr['product_price'];
?></td>

				</tr>

				<?php 
			}
		}
	}
	



				?>
      <tr class="total">
					<td></td>
					<td>Total :</td>


					<td><b><?php echo $t; ?></b></td>
				</tr>

				

				

				
			</table>
			<h3><center><a href="../customer_order.php">Back To Site</a> </center></h3>
	
		</div>
	</body>
</html>
<script type="text/javascript">
	window.print();

	
	
</script>
