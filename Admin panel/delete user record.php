<?php 

session_start();
if(!isset($_SESSION['admin'])==TRUE)
  {
    header("location:../login and registration/login.php");
  }

include('config.php');



$deleteid = $_GET['id'];

$q = "DELETE FROM user_registration WHERE id='$deleteid'";

$p = mysql_query($q,$con);

if($p)
{
    echo '<script type="text/javascript"> 
                 
              window.location.href = "tables.php";
              </script>;';
}
else
{
    echo  "not able to delete".mysql_error();
}
?>


<?php 



$deleteid = $_GET['area_id'];

$q1 = "DELETE FROM area WHERE id='$deleteid'";

$p1 = mysql_query($q1,$con);

if($p1)
{
     echo '<script type="text/javascript"> 
                 
              window.location.href = "tables.php";
              </script>;';
}
else
{
    echo  "not able to delete".mysql_error();
}

?>


