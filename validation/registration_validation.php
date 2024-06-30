<?php


@$con = mysql_connect("localhost","root","");
if(!$con)
{
	die("error");
}
mysql_select_db("e-nursery system");

$a = $_POST["user_name"];
$b = $_POST["email_id"]; 
$c = $_POST["password"];
$d = $_POST["confirm_password"];
$e = $_POST["phone_number"];
$f = $_POST["area"];
$g = $_POST["address"];





$i = $_POST["user_gender"];
$uppercase = preg_match('@[A-Z]@', $c);
$lowercase = preg_match('@[a-z]@', $c);
$number    = preg_match('@[0-9]@', $c);
$specialChars = preg_match('@[^\w]@', $c);


$q = "SELECT * FROM user_registration WHERE email_id = '$b'";

$result = mysql_query($q,$con);

$num = mysql_num_rows($result);

if(strlen($a)<2)
{
	echo '<script type="text/javascript"> 
                 alert("username should be atleast two character"); 
              window.location.href = "../login and registration/Registration.php";
              </script>;';
}
else if($f == 0)
{
   echo '<script type="text/javascript"> 
                 alert("Enter Area"); 
              window.location.href = "../login and registration/Registration.php";
              </script>;';
}

else if($num==1)
{

	echo '<script type="text/javascript"> 
                 alert("email id already taken"); 
              window.location.href = "../login and registration/Registration.php";
              </script>;';
}
else if(strlen($c)<8)
{
              echo '<script type="text/javascript"> 
                 alert("password should be more or equal then 8 character"); 
              window.location.href = "../login and registration/Registration.php";
              </script>;';
}
else if(!$uppercase || !$lowercase || !$number || !$specialChars)
{
              echo '<script type="text/javascript"> 
                 alert("password should contains atleast one uppercase and lowercase,number,special Characters"); 
              window.location.href = "../login and registration/Registration.php";
              </script>;';
}
 else if($d!=$c)
 {
 	
 	echo '<script type="text/javascript"> 
                 alert("password and confirm password should be same"); 
              window.location.href = "../login and registration/Registration.php";
              </script>;';

 }
 else if(!preg_match("/^[6-9]\d{9}$/",$e))
 {
   echo '<script type="text/javascript"> 
                 alert("invalid Phone number"); 
              window.location.href = "../login and registration/Registration.php";
              </script>;';
 }




else
{
    $anpq = "SELECT * FROM area WHERE id = '$f'";

    $anpp = mysql_query($anpq,$con);
    
     if($anpp)
     {
        while($anr = mysql_fetch_array($anpp))
        {
           $area_name = $anr['area_name'];

           $pincode = $anr['pincode'];
        }
     }
	$reg = "INSERT INTO user_registration(user_name,email_id,password,confirm_password,phone_number,area,address,pincode,user_gender) VALUES ('$a','$b','$c','$d','$e','$area_name','$g','$pincode','$i')";
	$regp = mysql_query($reg,$con);
	if($regp)
	{
		//echo "successfully registered";
		//echo "<a href='index.php'><b>"."Back to Login Page"."</b></a>";
		echo '<script type="text/javascript"> 
                 alert("You are successfully registered!!"); 
              window.location.href = "../login and registration/login.php";
              </script>;';
	}
	else
	{
	echo "error:".mysql_error();
    }

}
?>