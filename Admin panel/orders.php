<?php 
session_start();
if(!isset($_SESSION['admin'])==TRUE)
  {
    header("location:../login and registration/login.php");
  }

  include('config.php');



?>

<!doctype html>
<!-- 
* Bootstrap Simple Admin Template
* Version: 2.1
* Author: Alexis Luna
* Website: https://github.com/alexis-luna/bootstrap-simple-admin-template
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Dashboard</title>
    <link href="assets/vendor/fontawesome/css/fontawesome.min.css" rel="stylesheet">
    <link href="assets/vendor/fontawesome/css/solid.min.css" rel="stylesheet">
    <link href="assets/vendor/fontawesome/css/brands.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/datatables/datatables.min.css" rel="stylesheet">
    <link href="assets/css/master.css" rel="stylesheet">
</head>

<body>
    <table>
         <tr><center><a href="Dashboard.php" style="color:red;">Go To Dashboard</a></center></tr>
    </table>
   

            <div class="content">
                <div class="container">
                    <div class="page-title">
                        <center><h3>Orders</h3></center>
                    </div>
                    <div class="row">




                        <div class="col-md-12 col-lg-12">
                            <div class="card">
                               
                                <div class="card-body">
                                    <!--<p class="card-title">Add class <code>.table</code> inside table element</p>-->
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>User Name</th>
                                                    <th>Product Name</th>
                                            
                                                    <th>Product Quantity</th>
                                                    
                                                    
                                        
                                                     
                                                    <th>Initial Price</th>
                                                    <th>Subtotal</th>
                                                    
                                                    <th>Order Date</th>
                                                    <th>Delivery</th>
                                                    <th>Edit Delivery Details</th>
                                                    <th>Bill</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php

                                                
                                                        $q = "SELECT DISTINCT user_id FROM `order`";

                                                        $p = mysql_query($q,$con);

                                                        $nr = mysql_num_rows($p);


                                                             while($r = mysql_fetch_array($p))
                                                             {
                                                                $uid = $r['user_id'];

                                                                $pdq = "SELECT * FROM `order` WHERE  user_id = '$uid'";


                                                         $t = 0;

                                                                $pdp = mysql_query($pdq,$con);

                                                                $pdnr = mysql_num_rows($pdp);


                                                                
                                                        
                                                        

                                                 ?>                                                
                                                    
                                                    <tr>
                                                    <td rowspan="<?php echo $pdnr+1  ?>"><?php

                                                    $uq = "SELECT * FROM `user_registration` WHERE id = '$uid'";

                                                    $up = mysql_query($uq,$con);

                                                    while($ur = mysql_fetch_array($up))
                                                    {
                                                        echo $ur['user_name'];
                                                    }




                                                ?></td>
                                                    <?php 

                                                   

                                                        

                                                        if($pdp)
                                                        {
                                                            while($pdr = mysql_fetch_array($pdp))
                                                            {
                                                                $oid = $pdr['id'];

                                                                $pid = $pdr['product_id'];

                                                                $qty = $pdr['quantity'];

                                                                $date = $pdr['order_date'];
                                                        ?>
                                                    
                                                    <td>
                                                        <?php
                                                        



                                                                $pnameq = "SELECT * FROM `product` WHERE id = '$pid'";



                                                                $pnamep = mysql_query($pnameq,$con);

                                                                $pnamenr = mysql_num_rows($pnamep);

                                                                
                                                                if($pnamep)
                                                                {
                                                                    while($pnamer = mysql_fetch_array($pnamep))
                                                                    {
                                                                         $amount = $pdr['quantity'] * $pnamer['product_price'];

                                                                        $t = $t + $amount; 
                                                                        echo $pnamer['product_name'];

                                                                        $subtotal =  $pdr['quantity']*$pnamer['product_price'];

                                                                        $price = $pnamer['product_price'];
                                                                    }
                                                                }

                                                                


                                                                         

                                                        
                                                        


                                                      ?>
                                                    </td>


                                                    <td><?php echo $qty ?></td>

                                                    
                
                                        <td><?php echo $price  ?></td>
                                        <td ><?php echo $subtotal?></td>
                                   
                                        <td><?php echo $date ?></td>
                                        

                                           </tr>
                                           <?php 
                                         }
                                   

                                        ?>
                                           <tr>
                                              <center><td colspan="5"><?php echo "Grand Total : ".$t ?></td></center>
                                              <td><a href="delivery_form.php?oid=<?php echo $oid ?>"><span class="fa-fw select-all fas"></span></a></td>
                                              <td><a href="Edit/edit_delivery_form.php?oid=<?php echo $oid ?>"><span class="fa-fw select-all fas"></span></a></td>
                                              <td><a href="bill.php?uid=<?php echo $uid ?>"><span class="fa-fw select-all fas"></span></a></td>

                                           </tr>

    
                                           <?php 
                                      
 }
}

                                           ?>
                                           
                                        
                                       
                                       
                                        
                                        


                                                
                                               
                                                

                               

                          
                                        
                                     
                                

                                      


                                             
                                        
                                            </tbody>
                                            
                                           
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>


