<?php 
session_start();
if(!isset($_SESSION['login'])==TRUE)
  {
    header("location:../login and registration/login.php");
  }

  include('con_inc.php');


  $uid = $_SESSION['uid'];

  

?>


<!DOCTYPE html>
<html lang="en">

<head>
   
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Orders</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <link href="assets/vendor/fontawesome/css/fontawesome.min.css" rel="stylesheet">
    <link href="assets/vendor/fontawesome/css/solid.min.css" rel="stylesheet">
    <link href="assets/vendor/fontawesome/css/brands.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/datatables/datatables.min.css" rel="stylesheet">
    <link href="assets/css/master.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="navbar">
            <div class="logo">
                <a href="index.php"><img src="images/nursery_logo.png" alt="logo" height="100px" width="125px"></a>
            </div>
            <nav>
                <ul id="MenuItems">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="products.php">Products</a></li>
                    <li><a href="">About</a></li>
                    <li><a href="">Contact</a></li>
                    <li><a href="account.php">Account</a></li>
                   <li><a href="../login and registration/logout.php">Logout</a></li>
                </ul>
            </nav>
            <a href="cart.php"><img src="images/cart.png" width="30px" height="30px"></a>
            <img src="images/menu.png" class="menu-icon" onclick="menutoggle()">
            <a href="customer_order.php" style="margin-left:20px;">Your Order</a>
        </div>
    </div>

    <!-- Cart items details -->
    <div class="small-container cart-page">
       
                         


                         <div class="row">
                        <div class="col-md-12 col-lg-12">
                            <div class="card">
                                <div class="card-header" style="color:firebrick;"><center>Your Order</center></div>
                                <div class="card-body">
                                    <!--<p class="card-title">Add class <code>.table</code> inside table element</p>-->
                                    <div class="table-responsive">
                                        <table class="table" style="color: #17202A;">
                                            <thead>
                                                <tr style="background-color:#566573 ;">
                                                
                                                    <th>Product name</th>
                                                    <th>Product description</th>
                                                    <th>Product image-1</th>
                                                     <th>Product image-2</th>
                                                    <th>Product Price</th>
                                                   
                                                    <th>Product quantity</th>
                                                    <th>Product Subtotal</th>
                                                    
                                                    
                                                    <th> Order Cancel</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                 <?php 

        $uid = $_SESSION['uid'];

         $q = "SELECT * FROM `order` WHERE user_id = '$uid'";

         $p = mysql_query($q,$con);

         $nr = mysql_num_rows($p);

         if(!$nr)
         {
            echo '<script type="text/javascript"> 
                 alert("You have not ordered anything !!"); 
              window.location.href = "products.php";
              </script>;';
         }

         $t = 0;

    

         
          while($r = mysql_fetch_array($p))
          {

             $p_id = $r['product_id'];

             $oid = $r['id'];

             $quantity = $r['quantity'];

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

                                                
                                                
                                                    <tr>
                                                      
                                                          
                                                    <input type="hidden" name="pid" value="<?php echo $pr['id'] ?>">
                                                    <td><?php echo $pr['product_name']?></td>
                                                    <td><?php echo $pr['product_desc']?></td>
                                                    <td><?php echo '<img src="../Admin panel/assets/img/Product images/'.$pr['product_img1'].'" width="100px;" height="100px" alt="error">'?></td>
                                                    <td><?php echo '<img src="../Admin panel/assets/img/Product images/'.$pr['product_img2'].'" width="200px;" height="100px" alt="error">'?></td>
                                                    <td ><?php echo $pr['product_price']?><input type="hidden" class="price" name="price" value="<?php echo $pr['product_price'] ?>"></td>
                                                    <td><?php echo $r['quantity']?></td>
                                                        

                                                    <td><?php $price = $pr['product_price']; $qty = $r['quantity']; echo $qty*$price; ?></td>
                                                    <?php 

                                                     $bq = "SELECT * FROM `billing` WHERE order_id = '$oid'";

                                                     $bp = mysql_query($bq,$con);

                                                     while($br = mysql_fetch_array($bp))
                                                     {

                                                        $bid = $br['id'];

                                                    $dq = "SELECT * FROM `delivery` WHERE billing_id = '$bid'";

                                                    $dp = mysql_query($dq,$con);

                                                    $dnr = mysql_num_rows($dp);


                                                    while($dr = mysql_fetch_array($dp)) 
                                                    {
                                                                                                            
                                                        $ds = $dr['delivery_status'];

                                                        $dd = $dr['delivery_details'];

                                                        $sd = $dr['date_shipped'];



                                                         }
                                                }

                                                    

                                                    ?>



                                                    
                                                  
                                                  <?php 
                                                   
                                              
                                          




                                                  ?>
                                                    <td class="text-end">
                                        
                                                <input type=hidden name="product_id" value="<?php echo $pr['id']?>" readonly="readonly"> 
                                                 <a href="delete customer_order record.php?order_id=<?php echo $r['id']?>&&pid=<?php echo $p_id; ?>&&pqty=<?php echo $r['quantity']?>&&pstk=<?php echo $pr['product_stock'] ?>" class=".btn .btn-outline-{type}" onclick=" return deleteProfile();"><i class="fas fa-trash"></i></a>
                                                <!--<a href="Edit/product_edit.php?product_id=<?php echo $pr['id']?>&&cid=<?php// echo $pr['category_id']?>&&scid=<?php //echo $pr['sub_category_id'] ?>" class="btn btn-outline-info btn-rounded"><i class="fas fa-pen"></i></a>!-->
                                            
                                        </td>
                    
                                                    <?php
                                                }

                                                      }
                                                  }
                                              
                                           
                                       
                                                  ?>
                                                </td>
                                                </tr>
                                        
                                            </tbody>
                                        </table>
                                         <h4><center> Tracking Details</center></h4>
                                        <table>
                                            <?php if(@$dnr)
                                             { ?>
                                            <tr>
                                            <th>Shipping Date</th>
                                            <th>Delivery Status</th>
                                            <th>Delivery Details</th>
                                        </tr>
                                         <tr>
                                             <td><?php?><?php echo $sd ?></td>
                                             <td><?php if($ds==0){ echo "Not Delivered";} else{echo "Delivered";} ?></td>
                                             <td><?php echo $dd ?></td> 
                                         </tr>
                                     <?php } ?>
                                        </table>

                                    </div>
                                </div>
                            </div>
                        </div>

        <div class="total-price">

            <table>
               
                 <tr>
                    <td>Total</td>
                    <td ><?php echo $t ?></td>
                <tr>
                    
                    <td rowspan="1"><a href="Bill/invoice.php?uid=<?php echo  $uid; ?>" class="btn" style="display: inline-block;
    background: #ff523b;
    color: white;
    padding: 8px 30px;
    margin: 30px 0;
    border-radius: 30px;
    transition: background 0.5s;">Get Bill→</a></td>
    <td rowspan="1"><a href="products.php" class="btn" style="display: inline-block;
    background: #ff523b;
    color: white;
    padding: 8px 30px;
    margin: 30px 0;
    border-radius: 30px;
    transition: background 0.5s;">Explore Other Product →</a></td>
                   
                </tr>
    
            </table>
        </div>
    </div>


    <script>

       

    

function deleteProfile() {
    
    return confirm("Do you really want to cancel this order ?");
    if(ans) 
    {
       window.location.href = "delete customer_order record.php";
    }
    else
    {
        window.location.href = "customer_order.php";
    }
   
}
</script>


</body>

</html>