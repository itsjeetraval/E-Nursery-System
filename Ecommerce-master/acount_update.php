<?php

session_start();

if(!isset($_SESSION['login'])==TRUE)
  {
    header("location:../login and registration/login.php");
  }

@$con = mysql_connect("localhost","root","");
if(!$con)
{
	die("error");
}
mysql_select_db("e-nursery system");

$uid = $_SESSION['uid'];


$a = $_POST["user_name"];
$b = $_POST["email_id"]; 
$c = $_POST["old_password"];
$d = $_POST["new_password"];
$h = $_POST['confirm_new_password'];
$e = $_POST["phone_number"];
$f = $_POST["area"];
$g = $_POST["address"];
$i = $_POST['your_area'];






$udq = "SELECT * FROM user_registration WHERE id='$uid'";

$udp = mysql_query($udq,$con);

if($udp)
{
    while($udr = mysql_fetch_array($udp))
    {
      $a_old = $udr['user_name'];
      $b_old = $udr['email_id'];
      $e_old = $udr['phone_number'];
      $pass_old = $udr['password'];

       
    }
}
if($c == '')
{
   $c = $pass_old;

}
if($a=='')
{
    $a = $a_old;
     
}

if($d=='' OR $h =='')
{
     $d = $pass_old;
     $h = $pass_old;
}




if($b == '')
{
    $b = $b_old;
    
}

if($e==0)
{
    $e = $e_old;
}


if($f == 0)
{
   $aidq = "SELECT * FROM area WHERE area_name = '$i'";

   $aidp = mysql_query($aidq,$con);

   if($aidp)
   {
       while($aidr = mysql_fetch_array($aidp))
       {
           $f = $aidr['id'];
       }
   }


}



$uppercase = preg_match('@[A-Z]@', $d);
$lowercase = preg_match('@[a-z]@', $d);
$number    = preg_match('@[0-9]@', $d);
$specialChars = preg_match('@[^\w]@', $d);


$q = "SELECT * FROM user_registration WHERE id != '$uid' AND email_id = '$b'";

$result = mysql_query($q,$con);

$num = mysql_num_rows($result);

if($num==1)
{
   echo '<script type="text/javascript"> 
                 alert("Entered email is already registered !"); 
              window.location.href = "account.php";
              </script>;';

}


else if($c != $pass_old)
{

     echo '<script type="text/javascript"> 
                 alert("Old Password Invalid"); 
              window.location.href = "account.php";
              </script>;';

}

else if(strlen($a)<2)
{
	echo '<script type="text/javascript"> 
                 alert("username should be atleast two character"); 
              window.location.href = "account.php";
              </script>;';
}


else if(strlen($d)<8)
{
              echo '<script type="text/javascript"> 
                 alert("password should be more or equal then 8 character"); 
              window.location.href = "account.php";
              </script>;';
}
else if(!$uppercase || !$lowercase || !$number || !$specialChars)
{
              echo '<script type="text/javascript"> 
                 alert("password should contains atleast one uppercase and lowercase,number,special Characters"); 
              window.location.href = "account.php";
              </script>;';
}
 else if($d!=$h)
 {
 	
 	echo '<script type="text/javascript"> 
                 alert("password and confirm password should be same"); 
              window.location.href = "account.php";
              </script>;';

 }
 else if(!preg_match("/^[6-9]\d{9}$/",$e))
 {
   echo '<script type="text/javascript"> 
                 alert("invalid Phone number"); 
              window.location.href = "account.php";
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
	$reg = "UPDATE  user_registration  SET user_name = '$a',email_id = '$b',password = '$d',confirm_password = '$h',phone_number = '$e',area = '$area_name',address = '$g',pincode = '$pincode' WHERE id = '$uid'";
	$regp = mysql_query($reg,$con);
	if($regp)
	{
		//echo "successfully registered";
		//echo "<a href='index.php'><b>"."Back to Login Page"."</b></a>";
		echo '<script type="text/javascript"> 
                 alert("Your details updated successfully !!"); 
              window.location.href = "account.php";
              </script>;';
	}
	else
	{
	echo "error:".mysql_error();
    }

}

?>