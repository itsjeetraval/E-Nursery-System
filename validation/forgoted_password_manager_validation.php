<?php 

$a = $_POST['new_password'];

$b = $_POST['new_confirm_password'];

$uppercase = preg_match('@[A-Z]@', $a);
$lowercase = preg_match('@[a-z]@', $a);
$number    = preg_match('@[0-9]@', $a);
$specialChars = preg_match('@[^\w]@', $a);

@$con = mysql_connect("localhost","root","");

if(!$con)
{
	die("error");
}

mysql_select_db("e-nursery system");

if(strlen($a)<8)
{
	echo '<script type="text/javascript"> 
                 alert("password should be atleast 8 character long"); 
              window.location.href = "../forgot password/forgoted_password_manager.php";
              </script>;';
}
else if(!$uppercase || !$lowercase || !$number || !$specialChars)
{
              echo '<script type="text/javascript"> 
                 alert("password should contains atleast one uppercase and lowercase,number,special Characters"); 
              window.location.href = "../forgot password/forgoted_password_manager.php";
              </script>;';
}

else if($b!=$a)
{
	echo '<script type="text/javascript"> 
                 alert("both passwords should be same"); 
              window.location.href = "../forgot password/forgoted_password_manager.php";
              </script>;';
}

else
{

session_start();

$email = $_SESSION['email_id'];

}

     $q1 = "UPDATE user_registration SET password='$a',confirm_password='$b' WHERE email_id='$email'";

     $p1 = mysql_query($q1,$con);

     if($p1)
     {
       echo '<script type="text/javascript"> 
                 alert("new password created successfully"); 
              window.location.href = "../login and registration/login.php";
              </script>;';
     }


?>