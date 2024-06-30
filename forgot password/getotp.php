<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="../assets/css/getotp_style.css">
  </head>
  <body>
    <div class="center">
      <h1>Enter Verification Code</h1>
      <form method="post" action="../validation/otp_validation.php">
        <div class="txt_field">
          <input type="text" name="pin_otp" required>
          <span></span>
          <label>Verification Code</label>
        </div>
        <!--<div class="txt_field">
          <input type="password" name="password" required>
          <span></span>
          <label>Password</label>
        </div>
        <div class="pass">Forgot Password?<a href=""></div>-->
        <input type="submit" value="Enter Code">
        <!--<div class="signup_link">
          Not a member? <a href="registration.php">Signup</a>
        </div>-->
      </form>
    </div>

  </body>
</html>
