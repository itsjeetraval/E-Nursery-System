<?php
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
     echo '<script type="text/javascript"> 
                 alert("invalid email or password or you have not registered your self yet !"); 
              window.location.href = "../login and registration/login.php";
              </script>;';
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

               header("location:admin_session.php");

            }
            else
            {
                if($row['email_id'] != 'admin@gmail.com' && $num==1)
                {
                    $uid = $row['id'];

                    $_SESSION['uid'] = $uid;

                     header("location:user_session.php");

                }

                
            }
      }
}

}




/*$uidq = "SELECT * FROM user_regestration WHERE email_id = '$a'";

$uidp =  mysql_query($uidq,$con);

if($uidp)
{
      while($uidr = mysql_fetch_array($uidp))
      {
           $uid = $uidr['id'];
           


           $_SESSION['uid'] = $uid;
      }
}
else
{
      echo "error";
}


$nr = mysql_num_rows($uidp);

if($nr==1)
{
     
}
else
{
      echo "error";
}
}*/



?>