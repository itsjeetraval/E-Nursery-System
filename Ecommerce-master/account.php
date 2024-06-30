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
    <title>Account</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

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
                    <li><a href="" style="pointer-events: none;color:firebrick;"><?php  $q = "SELECT user_name FROM user_registration WHERE id = '$uid'";

                   $p = mysql_query($q,$con);

                   $row = mysql_fetch_array($p);

                   echo "".$row['user_name']."";
             ?></a></li>
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


    <div class="container">
    <div class="title"><center>Your Account Details</center></div>
    <div class="content">
        <?php 

        $q = "SELECT * FROM user_registration WHERE id='$uid'";

        $p = mysql_query($q,$con);

        if($p)
        {

           while($r = mysql_fetch_array($p) )
           {


        ?>
      <form method="post" action="acount_update.php">
        <div class="user-details">
    
            
            <input type="hidden" placeholder="Enter your username" name="user_id" value="<?php echo $r['id'] ?>"  >
          </div>
          <div class="input-box">
            <span class="details">Username</span>
            <input type="text" placeholder="Enter your username" name="user_name" value="<?php echo $r['user_name'] ?>"  >
          </div>
          <div class="input-box">
            <span class="details">Email</span>
            <input type="text" placeholder="Enter your email" name="email_id"  value="<?php echo $r['email_id'] ?>"  >
          </div>
          <div class="input-box">
            <span class="details">Password</span>
            <input type="password" placeholder="Enter your password" name="old_password" required>
          </div>
          <div class="input-box">
            <span class="details">New Password</span>
            <input type="password" placeholder="Enter your new  password" name="new_password" >
          </div>
          <div class="input-box">
            <span class="details">Confirm New Password</span>
            <input type="password" placeholder="Enter your confirm new  password" name="confirm_new_password"  >
          </div>
          <div class="input-box">
            <span class="details">Phone Number</span>
            <input type="text" placeholder="Enter your number" name="phone_number"value="<?php echo $r['phone_number'] ?>"  >
          </div>
          <div class="input-box">
            <span class="details">Your Area</span>
            <input type="text" placeholder="" name="your_area" value="<?php if($r['area'] == ''){ echo "None"; } else {echo $r['area']; } ?>" readonly>
          </div>
          <div class="input-box">
            <span class="details"> Change Area</span>
            <select name="area" style="height: 45px;
              width: 100%;
              outline: none;
              font-size: 16px;
               border-radius: 5px;
               padding-left: 15px;
                border: 1px solid #ccc;
              border-bottom-width: 2px;
              transition: all 0.3s ease;">
               <option value="<?php echo 0 ?>">Select Area</option>
              <?php 

              $old_area = $r['area'];

              $anq = "SELECT * FROM area WHERE area_name != '$old_area'";

              $anp = mysql_query($anq,$con);

              if($anp)
              {
                 while($anr = mysql_fetch_array($anp))
                 { ?>
                 

                 <option value="<?php echo $anr['id'] ?>"><?php echo $anr['area_name'] ?></option>


                  <?php

                 }
              }

              ?>


            </select>
          </div>
           <div class="input-box">
            <span class="details">Address</span>
            <textarea value="<?php echo $r['address'] ?>" name="address" class="text_area"  rows="2" cols="43" placeholder="Enter your Address" style="width: 100%;
              outline: none;
              font-size: 16px;
               border-radius: 5px;
               padding-left: 15px;
                border: 1px solid #ccc;
              border-bottom-width: 2px;
              transition: all 0.3s ease;"><?php echo $r['address'] ?></textarea>
          </div>
          
          
          
        </div>
        

        <div class="button">
          <center><input type="submit" value="Change Details" class="btn" style="height:50px; width:200px; cursor:pointer; border-radius:25px; background-color:#ff523b; color: white; " ></center>
        </div>
      </form>
      <?php 
  }
}
      ?>
    </div>
  </div>

</body>
</html>
