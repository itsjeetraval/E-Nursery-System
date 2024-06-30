

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="../assets/css/login_style.css">
  </head>
  <body>
    <div class="center">
      <h1>Login</h1>
      <form method="post" action="login.php">
        <div class="txt_field">
          <input type="text" name="email_id" required>
          <span></span>
          <label>Email</label>
        </div>
        <div class="txt_field">
          <input type="password" name="password" required>
          <span></span>
          <label>Password</label>
        </div>
        <div class="pass"><a href="../forgot password/forgotpass.php">Forgot Password?</a></div>
        <input name="login_btn" type="submit" value="Login">
        <div class="signup_link">
          Not a member? <a href="registration.php">Signup</a>
        </div>
      </form>
          <?php 

          if(isset($_POST['login_btn']))
          {

            session_start();


$a = $_POST["email_id"]; 
$b = $_POST["password"];



@$con = mysql_connect("localhost","root","");
if(!$con)
{
     die("error");
}
mysql_select_db("e-nursery system");



$q = "SELECT * FROM user_registration WHERE email_id = '$a' && password = '$b'";

$result = mysql_query($q,$con);

$num = mysql_num_rows($result);

if($num==0)
{
     
              ?>
              <textarea readonly name="error" style="width:100%;padding-bottom:30px;font-family: 'Poppins', 'sans-serif';border:none;resize:none;padding-left:10px; color:red;font-size:20px;"><?php echo 'invalid email or password or you have not registered your self yet !' ?> </textarea>

              
              <?php 

              unset($_POST['login_btn']);
}
else
{

if($result)
{
      while($row = mysql_fetch_array($result))
      {
            if($row['email_id'] == 'admin1@gmail.com')
            {
               $aid = $row['id'];

               $_SESSION['aid'] = $aid;

               header("location:../validation/admin_session.php");

            }
            else
            {
                if($row['email_id'] != 'admin@gmail.com' && $num==1)
                {
                    $uid = $row['id'];

                    $_SESSION['uid'] = $uid;

                     header("location:../validation/user_session.php");


         
          } } } } } } 
         ?>
    </div>

  </body>
</html>
<?php 













?>
