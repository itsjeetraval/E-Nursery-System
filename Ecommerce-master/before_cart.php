<?php 

session_start();
if(!isset($_SESSION['login'])==TRUE)
  {
    header("location:../login and registration/login.php");
  }

  include('con_inc.php');

  $uid = $_SESSION['uid'];

  $pid = $_POST['pid'];

  $quantity = $_POST['quantity'];

 
//fetching product details by id

 
 
 $pq = "SELECT * FROM product WHERE id = '$pid'";

 $pp = mysql_query($pq,$con);

  if($pp)
  {
      while($pr = mysql_fetch_array($pp))
      {
          $p_stock = $pr['product_stock'];

       

      }
  }

  $cuq = "SELECT * FROM cart WHERE user_id = '$uid' AND product_id = '$pid' ";

  $cup = mysql_query($cuq,$con);

 
if($cup)
  {
      $rn = mysql_num_rows($cup);


     if($rn>=1)
      {

      echo '<script type="text/javascript"> 
                 alert("Product was already carted"); 
              window.location.href = "product_details.php?pid='.$pid.'";
              </script>;';

            

      }
      else
      {
         $icq = "INSERT INTO cart(user_id,product_id,product_stock,product_quantity) VALUES ($uid,$pid,$p_stock,$quantity)";
    $icp = mysql_query($icq,$con);

    if($icp)
   {
   echo '<script type="text/javascript"> 
                 alert("Product Carted Successfully"); 
              window.location.href = "cart.php";
              </script>;';
    }
    else
      {
         echo mysql_error();
      }

    
  }
  
  // make cart unique and saperate for each user 
  
  $usq = "SELECT product_id FROM cart WHERE user_id = '$uid'";

  $usp = mysql_query($usq,$con);

    }

      // insert user_id , product_id , product_stock in cart table

  
?>

