<?php 
session_start();
if(!isset($_SESSION['login'])==TRUE)
  {
    header("location:../login and registration/login.php");
  }

  include('con_inc.php');


  $q = "SELECT * FROM product";

  $p = mysql_query($q,$con);

  $uid = $_SESSION['uid'];

 


  

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Products</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="container">
        <div class="navbar">
            <div class="logo">
                <a href="index.php"><img src="images/nursery_logo.png" height="100px" alt="logo" width="125px"></a>
            </div>
            <nav>
                <ul id="MenuItems">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="products.php">Products</a></li>
                    <li><a href="">About</a></li>
                    <li><a href="">Contact</a></li>
                    <li><a href="" style="pointer-events: none;color:firebrick;"><?php  $qun= "SELECT user_name FROM user_registration WHERE id = '$uid'";

                   $pun = mysql_query($qun,$con);

                   $punr = mysql_fetch_array($pun);

                   echo "".$punr['user_name']."";
             ?></a></li>
                    <li><a href="account.php">Account</a></li>
                    <li><a href="../login and registration/logout.php">Logout</a></li>
                </ul>
            </nav>
            <a href="cart.php"><img src="images/cart.png" width="30px" height="30px"></a>
            <img src="images/menu.png" class="menu-icon" onclick="menutoggle()">
            <a href="customer_order.php" style="margin-left:20px;">Your Order</a>
        </div>
    </div>

    <!-- All Products -->
                <form method="POST" action="Products.php">
                    
    <div class="small-container">

        <div class="row row-2">

         
            
            <h3>
                <table>
                     <tr>
                        <td><h2>All Products</h2></td>
                        <td><input type="text" placeholder="search products here" name="search" style="width:400px;height:40px;font-family:'Poppins', sans-serif; border-radius:20px;border-color: red;margin-left:100px;"> </td>
                        <td><input type="submit" name="submit" class="btn" style="width:100px;height:40px;font-family:'Poppins', sans-serif; margin-right:200px" value="Search"></td>
                         
                     </tr>
                </table>

                </form></h3>
                <form method="POST" action="products.php">
                    <table>
                        <tr>
                            <td>
            <select name="sort_by" style="border-radius:20px;height:40px;cursor:pointer; ">
                <option value="0">Default Sort</option>
                <option value="1">Sort By Price</option>
                <?php
                   $q = "SELECT * FROM category";

                   $p = mysql_query($q,$con);

                   if($p)
                   {
                    while($r = mysql_fetch_array($p))
                    {

                 
                 ?>
                <option value="<?php echo $r['id'] ?>"><?php echo $r['category_name'] ?></option>
                 <?php
         }
     }?>
                <!--<option value="3">Sort By Rating</option>
                <option>Sort By Sale</option>-->
                 </select>
            </td>
            <td><input type="submit" name="sort" class="btn" style="width:155px;height:40px;font-family:'Poppins', sans-serif;margin-right:250px;" value="Sort And Search"></td>
            
            </form>
            <form method="POST" action="products.php">
           
            <td><input type="number" placeholder="Enter minimum price" name='min_price' min="1" style="width:180px;height:40px;font-family:'Poppins', sans-serif; border-radius:20px;border-color: red; " required></td>
            <td><input type="number" placeholder="Enter maximum price" name='max_price' min="1" style="width:180px;height:40px;font-family:'Poppins', sans-serif; border-radius:20px;border-color: red;" required></td>
             <td><input type="submit" name="sort_by_price" class="btn" style="width:200px;height:40px;font-family:'Poppins', sans-serif;margin-right:250px;" value="Sort by Entered Price"></td>
            </tr>
            </form>
           
            
            
        </table>
        

        </div>
         <?php 
            

               if(isset($_POST['submit']))
               {
                 $str = $_POST['search'];

                  if($str == '')
                  {
                     @header('location:products.php');
                  }

                 $sq = "SELECT * FROM product WHERE product_name LIKE '%$str%' OR product_desc LIKE '%$str%'";

                 $sp = mysql_query($sq,$con);

                 $snr = mysql_num_rows($sp);

                  if($snr == 0)
                  { ?>

                   <center><h3 style="color: firebrick;">Nothing Found</h3></center>
                  <?php } 

                  if($sp)
                  {
                    ?>

                     <div class="row">
                        <?php 
                      while($sr = mysql_fetch_array($sp))
                      {
                        

                        ?>


                  <div class="col-4">

        
                <a href="product_details.php?pid=<?php echo $sr['id'] ?>"><img src="../Admin panel/assets/img/Product images/<?php echo $sr['product_img1']?>"></a>
                <h4><?php echo $sr['product_name'] ?></h4>
                <?php 

                 $pid = $sr['id'];

                 $rsq = "SELECT SUM(rating) AS rating_sum FROM rating WHERE product_id = '$pid'";

                 $rsp = mysql_query($rsq,$con);

                 if($rsp)
                 {
                     while($rsr = mysql_fetch_array($rsp))
                     {
                          $stars_number = $rsr['rating_sum']/5;

                          $stars = ceil($stars_number);

                          $remaining = 5 - $stars;
                      
                        //    $val = $stars + $remaining;

                          //echo $val;




                          ?>
                           <div class="rating">
                            <?php for($i=1;$i<=$stars;$i++) 
                            { ?>
                    <i class="fa fa-star"></i>
                    <?php } 
                    for($i=1;$i<=$remaining;$i++)
                    { 
                        ?>
                        <i class="fa fa-star-o"></i>
                    <?php } ?>


                </div>

                <p><?php echo "₹ ".$sr['product_price']?></p>



            
            </div>

                <?php 
            }

                      }
                  }
             }   
               }

            else if(isset($_POST['sort']))
            {
                $sort_by = $_POST['sort_by'];

                if($_POST['sort_by']==0)
                {
                     $q = "SELECT * FROM product";

            $p = mysql_query($q,$con);

            if($p)
            { ?>
                
                <div class="row">
            
                <?php 
                 while($r = mysql_fetch_array($p))
                             {

                                ?>
    
                  <div class="col-4">
        
                <a href="product_details.php?pid=<?php echo $r['id'] ?>"><img src="../Admin panel/assets/img/Product images/<?php echo $r['product_img1']?>"></a>
                <h4><?php echo $r['product_name'] ?></h4>
                <?php 

                $pid = $r['id'];

                 $rq = "SELECT SUM(rating) AS rating_sum FROM rating WHERE product_id = '$pid'";

                 $rp = mysql_query($rq,$con);

                 if($rp)
                 {
                     while($rr = mysql_fetch_array($rp))
                     {
                          $stars_number = $rr['rating_sum']/5;

                          $stars = ceil($stars_number);

                          $remaining = 5 - $stars;
                      
                        //    $val = $stars + $remaining;

                          //echo $val;




                          ?>

                          <div class="rating">
                            <?php for($i=1;$i<=$stars;$i++) 
                            { ?>
                    <i class="fa fa-star"></i>
                    <?php } 
                    for($i=1;$i<=$remaining;$i++)
                    { 
                        ?>
                        <i class="fa fa-star-o"></i>
                    <?php } ?>


                </div>
                <p><?php echo "₹ ".$r['product_price']?></p>
            </div>
                <?php 
         

                     }
                 }
                     
                }
            }
        }


                

                else if($_POST['sort_by']==1)
                {
                     $psq = "SELECT * FROM product ORDER BY product_price";

                     $psp = mysql_query($psq,$con);

                     if($psp)
                     {
                        ?>
                        <div class="row">
                        
                        <?php 
                         while($psr = mysql_fetch_array($psp))
                         {
                            ?>
                            <div class="col-4">

        
                <a href="product_details.php?pid=<?php echo $psr['id'] ?>"><img src="../Admin panel/assets/img/Product images/<?php echo $psr['product_img1']?>"></a>
                <h4><?php echo $psr['product_name'] ?></h4>

                <?php 

                 $pid = $psr['id'];

                 $rsq = "SELECT SUM(rating) AS rating_sum FROM rating WHERE product_id = '$pid'";

                 $rsp = mysql_query($rsq,$con);

                 if($rsp)
                 {
                     while($rsr = mysql_fetch_array($rsp))
                     {
                          $stars_number = $rsr['rating_sum']/5;

                          $stars = ceil($stars_number);

                          $remaining = 5 - $stars;
                      
                        //    $val = $stars + $remaining;

                          //echo $val;




                          ?>
                           <div class="rating">
                            <?php for($i=1;$i<=$stars;$i++) 
                            { ?>
                    <i class="fa fa-star"></i>
                    <?php } 
                    for($i=1;$i<=$remaining;$i++)
                    { 
                        ?>
                        <i class="fa fa-star-o"></i>
                    <?php } ?>


                </div>
                <p><?php echo "₹ ".$psr['product_price']?></p>



            
            </div>
            <?php 

                         }
                     }
                }

            }
        }
        

        else if(isset($_POST['sort_by']))
        {
              $q = "SELECT * FROM product WHERE category_id = '$sort_by' OR sub_category_id = '$sort_by'";

              $p = mysql_query($q,$con);

              $nr = mysql_num_rows($p);

              if(!$nr)
              {
                ?>

                <center><h3 style="color: firebrick;">Nothing Found</h3></center>

                <?php 

              }

              if($p)
              {
                ?>

                        <center><h3 style="color: firebrick;"><?php $cid = $sort_by; 
                        $cnameq = "SELECT * FROM `category` WHERE id = '$sort_by'";
                        $canmep = mysql_query($cnameq,$con);
                        while($cr = mysql_fetch_array($canmep)){ echo $cr['category_name'].""; } ?></h3></center>

                        <div class="row">
                            <?php 
                  while($r = mysql_fetch_array($p))
                  {
                    ?>
                    <div class="col-4">



        
                <a href="product_details.php?pid=<?php echo $r['id'] ?>"><img src="../Admin panel/assets/img/Product images/<?php echo $r['product_img1']?>"></a>
                <h4><?php echo $r['product_name'] ?></h4>

                <?php 

                 $pid = $r['id'];

                 $rsq = "SELECT SUM(rating) AS rating_sum FROM rating WHERE product_id = '$pid'";

                 $rsp = mysql_query($rsq,$con);

                 if($rsp)
                 {
                     while($rsr = mysql_fetch_array($rsp))
                     {
                          $stars_number = $rsr['rating_sum']/5;

                          $stars = ceil($stars_number);

                          $remaining = 5 - $stars;
                      
                        //    $val = $stars + $remaining;

                          //echo $val;




                          ?>
                           <div class="rating">
                            <?php for($i=1;$i<=$stars;$i++) 
                            { ?>
                    <i class="fa fa-star"></i>
                    <?php } 
                    for($i=1;$i<=$remaining;$i++)
                    { 
                        ?>
                        <i class="fa fa-star-o"></i>
                    <?php } ?>


                </div>
                <p><?php echo "₹ ".$r['product_price']?></p>

            </div>
<?php 



                  }
              }
        }
    }
    
}
 
       
       ?>
<?php
    }
       else if(isset($_POST['sort_by_price']))
       {
          $minp = $_POST['min_price'];
          $maxp =  $_POST['max_price'];
          

           $sbpq = "SELECT * FROM product WHERE product_price BETWEEN '$minp' AND '$maxp'";

                 $sbpp = mysql_query($sbpq,$con);

                 $sbpnr = mysql_num_rows($sbpp);



                  if($sbpnr == 0)
                  { ?>

                   <center><h3 style="color: firebrick;">Nothing Found</h3></center>
                  <?php } 

                  if($sbpp)
                  {
                    ?>

                     <div class="row">
                        <?php 
                      while($sbpr = mysql_fetch_array($sbpp))
                      {
                        

                        ?>


                  <div class="col-4">

        
                <a href="product_details.php?pid=<?php echo $sbpr['id'] ?>"><img src="../Admin panel/assets/img/Product images/<?php echo $sbpr['product_img1']?>"></a>
                <h4><?php echo $sbpr['product_name'] ?></h4>
                <?php 

                 $pid = $sbpr['id'];

                 $rsq = "SELECT SUM(rating) AS rating_sum FROM rating WHERE product_id = '$pid'";

                 $rsp = mysql_query($rsq,$con);

                 if($rsp)
                 {
                     while($rsr = mysql_fetch_array($rsp))
                     {
                          $stars_number = $rsr['rating_sum']/5;

                          $stars = ceil($stars_number);

                          $remaining = 5 - $stars;
                      
                        //    $val = $stars + $remaining;

                          //echo $val;




                          ?>
                           <div class="rating">
                            <?php for($i=1;$i<=$stars;$i++) 
                            { ?>
                    <i class="fa fa-star"></i>
                    <?php } 
                    for($i=1;$i<=$remaining;$i++)
                    { 
                        ?>
                        <i class="fa fa-star-o"></i>
                    <?php } ?>


                </div>

                <p><?php echo "₹ ".$sbpr['product_price']?></p>
                </div>
          <?php

              }
          }
      }
  








          ?>


            
            
            <?php 
        }
       }

         else 
         { 
            $q = "SELECT * FROM product";

            $p = mysql_query($q,$con);

            if($p)
            { ?>
                
                <div class="row">
            
                <?php 
                 while($r = mysql_fetch_array($p))
                             {

                                ?>
    
                  <div class="col-4">
        
                <a href="product_details.php?pid=<?php echo $r['id'] ?>"><img src="../Admin panel/assets/img/Product images/<?php echo $r['product_img1']?>"></a>
                <h4><?php echo $r['product_name'] ?></h4>
                <?php 

                $pid = $r['id'];

                 $rq = "SELECT SUM(rating) AS rating_sum FROM rating WHERE product_id = '$pid'";

                 $rp = mysql_query($rq,$con);

                 if($rp)
                 {
                     while($rr = mysql_fetch_array($rp))
                     {
                          $stars_number = $rr['rating_sum']/5;

                          $stars = ceil($stars_number);

                          $remaining = 5 - $stars;
                      
                        //    $val = $stars + $remaining;

                          //echo $val;




                          ?>

                          <div class="rating">
                            <?php for($i=1;$i<=$stars;$i++) 
                            { ?>
                    <i class="fa fa-star"></i>
                    <?php } 
                    for($i=1;$i<=$remaining;$i++)
                    { 
                        ?>
                        <i class="fa fa-star-o"></i>
                    <?php } ?>


                </div>
                <?php 
         

                     }
                 }
                 else
                 {
                     echo mysql_error();
                 }



                ?>
                
                <p><?php echo "₹ ".$r['product_price']?></p>
        
            </div>

           <?php 
       }
       }

   
 }




        ?>

        
        <!--<div class="page-btn">
            <span>1</span>
            <span>2</span>
            <span>3</span>
            <span>4</span>
            <span>&#8594;</span>
        </div>
    </div>-->

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
    </div>

    javascript -->

    <script>
        var MenuItems = document.getElementById("MenuItems");
        MenuItems.style.maxHeight = "0px";
        function menutoggle() {
            if (MenuItems.style.maxHeight == "0px") {
                MenuItems.style.maxHeight = "200px"
            }
            else {
                MenuItems.style.maxHeight = "0px"
            }
        }
    </script>

</body>

</html>