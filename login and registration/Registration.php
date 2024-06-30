<?php 

@$con = mysql_connect("localhost","root","");

mysql_select_db('e-nursery system');

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Registration Form</title>
    <link rel="stylesheet" href="../assets/css/registration_style.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="container">
    <div class="title"><center>Registration</center></div>
    <div class="content">
      <form method="post" action="../validation/registration_validation.php">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Username</span>
            <input type="text" placeholder="Enter your username" name="user_name" required>
          </div>
          <div class="input-box">
            <span class="details">Email</span>
            <input type="text" placeholder="Enter your email" name="email_id" required>
          </div>
          <div class="input-box">
            <span class="details">Password</span>
            <input type="password" placeholder="Enter your password" name="password" required>
          </div>
          <div class="input-box">
            <span class="details">Confirm Password</span>
            <input type="password" placeholder="Confirm your password" name="confirm_password" required>
          </div>
          <div class="input-box">
            <span class="details">Phone Number</span>
            <input type="text" placeholder="Enter your number" name="phone_number" required>
          </div>
          <div class="input-box">
            <span class="details">Area</span>
            <select name="area" id="areas-list" style="height: 45px;
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

              $anq = "SELECT * FROM area";

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
            <textarea name="address" class="text_area"  rows="2" cols="43" placeholder="Enter your Address" style="width: 100%;
              outline: none;
              font-size: 16px;
               border-radius: 5px;
               padding-left: 15px;
                border: 1px solid #ccc;
              border-bottom-width: 2px;
              transition: all 0.3s ease;"></textarea>
          </div>
          
          
          
        </div>
        <div class="gender-details">
          <input type="radio" name="user_gender" value="Male" id="dot-1">
          <input type="radio" name="user_gender" value="Female" id="dot-2">
          <span class="user-title">User Gender</span>
          <div class="category">
            <label for="dot-1">
            <span class="dot one"></span>
            <span class="user role">Male</span>
          </label>
          <label for="dot-2">
            <span class="dot two"></span>
            <span class="user role">Female</span>
          </label>
          </div>
        </div>

        <div class="button">
          <input type="submit" value="Register">
        </div>
      </form>
    </div>
  </div>

</body>


