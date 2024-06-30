<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Change Password</title>
    <link rel="stylesheet" href="../assets/css/forgotpass_manager.css">
  </head>
  <body>
    <div class="center">
      <h1>Change Password</h1>
      <form method="post" action="../validation/forgoted_password_manager_validation.php">
        <div class="txt_field">
          <input type="password" name="new_password" required>
          <span></span>
          <label>Enter New Password</label>
        </div>
        <div class="txt_field">
          <input type="password" name="new_confirm_password" required>
          <span></span>
          <label>Confirm Password</label>
        </div>
        <input type="submit">
        
      </form>
    </div>
