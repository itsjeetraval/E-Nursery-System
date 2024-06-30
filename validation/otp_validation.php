<?php 

$pin = $_POST["pin_otp"];

$con = mysql_connect("localhost","root","");

if(!$con)
{
	die("error");
}

mysql_select_db("e-nursery system");

$q = "SELECT * FROM verification_master WHERE varification_code='$pin'";

$p = mysql_query($q,$con);

$num = mysql_num_rows($p);

if($num==1)
{
	header("location:../forgot password/forgoted_password_manager.php");
}
else
{
	echo '<script type="text/javascript"> 
                 alert("invalid varification code"); 
              window.location.href = "../forgot password/getotp.php";
              </script>;';
}
?>
