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
    <title>Cart</title>
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
                                <div class="card-header"><center>Cart</center></div>
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
                                                    <th>Product stock</th>
                                                    <th>Product quantity</th>
                                                    <th>Product Subtotal</th>
                                                    
                                                    <th> Actions</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                 <?php 

        $uid = $_SESSION['uid'];

         $q = "SELECT * FROM cart WHERE user_id = '$uid'";

         $p = mysql_query($q,$con);

         if(!$nrc = mysql_num_rows($p))
         {
             echo '<script type="text/javascript"> 
                 alert("Cart is empty ! so kindly add product into your cart "); 
              window.location.href = "products.php";
              </script>;';
    
         }
         $t = 0 ;


         
          while($r = mysql_fetch_array($p))
          {

             $p_id = $r['product_id'];

             $cid = $r['id'];

             $quantity = $r['product_quantity'];

             $rn = mysql_num_rows($p);

             
                          

              $pq = "SELECT * FROM product WHERE id = '$p_id'";

          $pp = mysql_query($pq,$con);
                 
             
                
                 if($pp)
                 {
                     while($pr = mysql_fetch_array($pp))
                     {
                        $rn = mysql_num_rows($pp);


                        $amount = $r['product_quantity'] * $pr['product_price'];

                        $t = $t + $amount; 
                        


           

         


                        ?>

                                                
                                                
                                                    <tr>
                                                      
                                                          
                                                    <input type="hidden" name="pid" value="<?php echo $pr['id'] ?>">
                                                    <td><?php echo $pr['product_name']?></td>
                                                    <td><?php echo $pr['product_desc']?></td>
                                                    <td><?php echo '<img src="../Admin panel/assets/img/Product images/'.$pr['product_img1'].'" width="100px;" height="100px" alt="error">'?></td>
                                                    <td><?php echo '<img src="../Admin panel/assets/img/Product images/'.$pr['product_img2'].'" width="200px;" height="100px" alt="error">'?></td>
                                                    <td ><?php echo $pr['product_price']?><input type="hidden" class="price" name="price" value="<?php echo $pr['product_price'] ?>"></td>
                                                    <td><?php echo $pr['product_stock']?></td>
                                                        <form action="manage_cart.php" method="POST">
                                                            <input type="hidden" name="pid" value="<?php echo $pr['id'] ?>">
                                                       <td><input type="number" class="quantity" name="mod_qty" min="1" max="<?php echo $pr['product_stock'] ?>" style="width:60px;" value="<?php echo $r['product_quantity'] ?>" onchange='this.form.submit();'></td>
                                                       <input type="hidden" name="cart_id" value="<?php echo $r['id'] ?>">
                                                     </form>

                                                    <td><?php $price = $pr['product_price']; $qty = $r['product_quantity']; echo $qty*$price; ?></td>



                                                    
                                                  
                                                    <td class="text-end">
                                        
                                                <input type=hidden name="product_id" value="<?php echo $pr['id']?>" readonly="readonly"> 
                                                 <a href="delete cart record.php?cart_id=<?php echo $r['id']?>" class=".btn .btn-outline-{type}" onclick=" return deleteProfile();"><i class="fas fa-trash"></i></a>
                                                <!--<a href="Edit/product_edit.php?product_id=<?php echo $pr['id']?>&&cid=<?php// echo $pr['category_id']?>&&scid=<?php //echo $pr['sub_category_id'] ?>" class="btn btn-outline-info btn-rounded"><i class="fas fa-pen"></i></a>!-->
                                            
                                        </td>
                    
                                                    <?php
                                                }

                                                      }
                                                  }
                                              
                                           
                                       
                                                  ?>
                                                </tr>
                                        
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
        <div class="total-price">
            <table>
                <!--<tr>
                    <td>Subtotal</td>
                    <td>$200.00</td>
                </tr>
                <tr>
                    <td>Tax</td>
                    <td id="tax">50</td>
                </tr>-->
                 <tr>
                    <td>Total</td>
                    <td ><?php echo $t ?></td>
                <tr>
                    
                    <td rowspan="1"><a href="place order.php" class="btn" style="display: inline-block;
    background: #ff523b;
    color: white;
    padding: 8px 30px;
    margin: 30px 0;
    border-radius: 30px;
    transition: background 0.5s;">Place Order →</a></td>
                   
                </tr>
    
            </table>
        </div>
    </div>

     <!--
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="footer-col-1">
                    <h3>Download Our App</h3>
                    <p>Download App for Android and ios mobile phone.</p>
                    <div class="app-logo">
                        <img src="images/play-store.png">
                        <img src="images/app-store.png">
                    </div>
                </div>
                <div class="footer-col-2">
                    <img src="images/logo-white.png">
                    <p>Our Purpose Is To Sustainably Make the Pleasure and Benefits of Sports Accessible to the Many.
                    </p>
                </div>
                <div class="footer-col-3">
                    <h3>Useful Links</h3>
                    <ul>
                        <li>Coupons</li>
                        <li>Blog Post</li>
                        <li>Return Policy</li>
                        <li>Join Affiliate</li>
                    </ul>
                </div>
                <div class="footer-col-4">
                    <h3>Follow Us</h3>
                    <ul>
                        <li>Facebook</li>
                        <li>Twitter</li>
                        <li>Instagram</li>
                        <li>Youtube</li>
                    </ul>
                </div>
            </div>
            <hr>
            <p class="copyright">Copyright 2020 - Samwit Adhikary</p>
        </div>
    </div>-->


    <script>

       

    

function deleteProfile() {
    
    return confirm("Do you really want to remove this product from the cart ?");
    if(ans) 
    {
       window.location.href = "delete cart record.php";
    }
    else
    {
        window.location.href = "cart.php";
    }
   
}
</script>


</body>

</html>