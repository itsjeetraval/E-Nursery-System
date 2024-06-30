<?php 

session_start();
if(!isset($_SESSION['admin'])==TRUE)
  {
    header("location:../login and registration/login.php");
  }

include('config.php');



$deleteid = $_GET['id'];

$q = "DELETE FROM rating WHERE id='$deleteid'";

$p = mysql_query($q,$con);

if($p)
{
    echo '<script type="text/javascript"> 
                 
              window.location.href = "rating.php";
              </script>;';
}
else
{
    echo  "not able to delete".mysql_error();
}
?>