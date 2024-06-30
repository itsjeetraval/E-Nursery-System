<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="../assets/css/forgotpass_style.css">
  </head>
  <body>
    <div class="center">
      <h1>Verify Email</h1>
      <form method="post" action="../validation/enteredemailvarifiation.php">
        <div class="txt_field">
          <input type="text" name="email_id" required>
          <span></span>
          <label>Email</label>
        </div>
        <!--<div class="txt_field">
          <input type="password" name="password" required>
          <span></span>
          <label>Password</label>
        </div>
        <div class="pass">Forgot Password?<a href=""></div>-->
        <a href="../forgot password/getotp.php"><input type="submit" value="Get Code"></a>
        <!--<div class="signup_link">
          Not a member? <a href="registration.php">Signup</a>
        </div>-->
      </form>
    </div>

  </body>
</html>
