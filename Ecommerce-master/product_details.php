<?php  

session_start();
if(!isset($_SESSION['login'])==TRUE)
  {
    header("location:../login and registration/login.php");
  }

  include('con_inc.php');
 
 $id = $_GET['pid'];

 $q = "SELECT * FROM product WHERE id='$id'";

 $p = mysql_query($q,$con);

 $uid = $_SESSION['uid'];






?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
  <style>
@import url(https://fonts.googleapis.com/css?family=Roboto:500,100,300,700,400);
div.stars{
  width: 270px;
  display: inline-block;
}
 
input.star{
  display: none;
}
 
label.star {
  float: right;
  padding: 10px;
  font-size: 26px;
  color: #444;
  transition: all .2s;
}
 
input.star:checked ~ label.star:before {
  content:'\f005';
  color: #FD4;
  transition: all .25s;
}
 
 
input.star-5:checked ~ label.star:before {
  color:#FE7;
  text-shadow: 0 0 20px #952;
}
 
input.star-1:checked ~ label.star:before {
  color: #F62;
}
 
label.star:hover{
  transform: rotate(-15deg) scale(1.3);
}
 
label.star:before{
  content:'\f006';
  font-family: FontAwesome;
}
 
.rev-box{
  overflow: hidden;
  height: 0;
  width: 100%;
  transition: all .25s;
}
 
textarea.review{
  background: #222;
  border: none;
  width: 100%;
  max-width: 100%;
  height: 100px;
  padding: 10px;
  box-sizing: border-box;
  color: #EEE;
}
 
label.review{
  display: block;
  transition:opacity .25s;
}
 
input.star:checked ~ .rev-box{
  height: 125px;
  overflow: visible;
}
</style>


    <title>Product Details</title>
    <link rel="stylesheet" href="style.css">
    
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="container">
        <div class="navbar">
            <div class="logo">
                <a href="index.php"><img src="images/nursery_logo.png" alt="logo" width="125px"></a>
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

    <!-- Single Products -->
    <div class="small-container single-product">
        <?php 
            
            if($p)
            {
                while($r = mysql_fetch_array($p))

                {
                    ?>

        <div class="row">
            <div class="col-2">
                <img src="../Admin panel/assets/img/Product images/<?php echo $r['product_img1']?>" width="100%" id="ProductImg">

                <div class="small-img-row">
                    <div class="small-img-col">Other Image
                        <table>
                            <tr>
                                <td>
                        <img src="../Admin panel/assets/img/Product images/<?php echo $r['product_img1']?>" width="100%" class="small-img" style="width:900px;">
                              </td>
                              <td>
                                  <img src="../Admin panel/assets/img/Product images/<?php echo $r['product_img2']?>" width="100%" class="small-img" style="width:500px;">
                              </td>
                    </tr>
                    </table>
                    </div>
                    
                </div>

            </div>
            <div class="col-2">
                <form action="before_cart.php" method="POST" >
                <p>Home / Plants</p>
                <h1><?php echo $r['product_name'] ?></h1>
                <h4><?php echo "₹ ".$r['product_price']?></h4>
                <!--<select>
                    <option>Select Size</option>
                    <option>XXL</option>
                    <option>XL</option>
                    <option>L</option>
                    <option>M</option>
                    <option>S</option>
                </select>!-->
                <h3> Total Stock : <font color="red"><?php  if($r['product_stock']==0 OR $r['product_stock']<0){ echo "Out Of stock";} else { echo $r['product_stock'];  }?></font></h3>
                <?php 

                                    if($r['product_stock']>0)
                                    {



                                     ?>
                <h3> Select Quantity To Cart : </h3>
                                    
                                        <select name="quantity" id="a">
                                                        <?php $nofstock = $r['product_stock'];

                                                        for($i=1;$i<=$nofstock;$i++)

                                                         {

                                                         ?>
                                                         <option  value="<?php echo $i ?>"><?php echo $i?></option>
                                                        <?php } } ?>





                 </select>
                 <h3>Customer's Rating On This Product :</h3>
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

                          <div class="rating" style="font-size: 25px;">
                            <?php for($i=1;$i<=$stars;$i++) 
                            { ?>
                    <i class="fa fa-star"></i>
                    <?php } 
                    for($i=1;$i<=$remaining;$i++)
                    { 
                        ?>
                        <i class="fa fa-star-o"></i>
                    <?php } } }  ?>


                </div>


                 <input type="hidden" name="pid" value="<?php echo $id ?>" readonly>
                 <?php
                          if($r['product_stock']>0)
                          {

                 ?> 

                <input type="submit" name="submit" class="btn" style="width:200px; cursor: pointer;" value="<?php echo 'Add to Cart' ?>">
               <?php 
                       }

               ?>

            </form>

                <h3>Product Details <i class="fa fa-indent"></i></h3>
                <br>
                <p><?php echo $r['product_desc']?></p>
    
                    <?php 
                    $pid = $r['id'];
                $cid = $r['category_id'];
             $scid = $r['sub_category_id'];
            $fid = $r['featured_id'];
        ?>
    

            <h3>Give Your Rating <i class="fa fa-indent"></i></h3>
             <div class="stars">
<form action="rating.php" method="POST">
    <input type="hidden" name="pid" value="<?php echo $r['id'] ?>" readonly>
  <input class="star star-5" id="star-5" type="radio" name="star" value="5" required />
  <label class="star star-5" for="star-5"></label>
  <input class="star star-4" id="star-4" type="radio" name="star" value="4" />
  <label class="star star-4" for="star-4"></label>
  <input class="star star-3" id="star-3" type="radio" name="star" value="3" />
  <label class="star star-3" for="star-3"></label>
  <input class="star star-2" id="star-2" type="radio" name="star" value="2" />
  <label class="star star-2" for="star-2"></label>
  <input class="star star-1" id="star-1" type="radio" name="star" value="1" />
  <label class="star star-1" for="star-1"></label>
  <input type="submit" name="submit" class="btn" style="width:200px; cursor: pointer;" value="<?php echo 'Give Rating' ?>">
</form>
</div>








        

      
                
                
            </div>
        </div>
    </div>
    <?php 

               }
            }
             $q = "SELECT id,product_name,product_img1,product_desc,product_price FROM product WHERE sub_category_id='$scid' AND id != '$pid'";

    $p = mysql_query($q,$con);

    $nr = mysql_num_rows($p);

     if($nr)
     {
    ?>
    <!-- title -->
    <div class="small-container">
        <div class="row row-2">
            <h2>Related Products</h2>
            
        </div>
    </div>
    <!-- Products -->
    <div class="small-container">
        <?php 

  

       if($p)
       {

        ?>
        <div class="row">
            <?php 

                 while($r = mysql_fetch_array($p))
                 {
            ?>
            <div class="col-4">
                <a href="product_details.php?pid=<?php echo $r['id'] ?>"><img src="../Admin panel/assets/img/Product images/<?php echo $r['product_img1']?>"></a>
                <h4><?php echo $r['product_name']?></h4>
        
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
            
    </div>

    <!-- Footer
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

    <!-- product gallery -->
    <script>
        var ProductImg = document.getElementById("ProductImg");
        var SmallImg = document.getElementsByClassName("small-img");

        SmallImg[0].onclick = function () {
            ProductImg.src = SmallImg[0].src;
        }
        SmallImg[1].onclick = function () {
            ProductImg.src = SmallImg[1].src;
        }
        SmallImg[2].onclick = function () {
            ProductImg.src = SmallImg[2].src;
        }
        SmallImg[3].onclick = function () {
            ProductImg.src = SmallImg[3].src;
        }

    </script>
</body>

</html>