<?php 

@$con = mysql_connect("localhost","root","");

if(!$con)
{
	die("fail");
}

$a = $_POST['email_id'];

session_start();


$_SESSION['email_id']=$a;



$otp = rand(10,10000);

mysql_select_db("e-nursery system");

$q1 = "INSERT INTO verification_master(email_id,varification_code) VALUES ('$a',$otp)";

$p1 = mysql_query($q1,$con);

if($p1)
{
     $q2 = "SELECT * FROM user_registration WHERE email_id='$a'";

     $p2 = mysql_query($q2,$con);

     $num = mysql_num_rows($p2);

	  if($num==1)
	  {
	  	
	  	mail($a,"varification code",$otp);
	  	header("location:../forgot password/getotp.php");
	  }
	  else
	  {
	  	echo '<script type="text/javascript"> 
                 alert("user with entered email is not exists"); 
              window.location.href = "../forgot password/forgotpass.php";
              </script>;';
	  	//echo "<h3><b>Verify your Email</h3></b><br>";
	  	//echo "<h3><a href='forgotpass.php'>Back</a></h3>";
	  }



}



?>
