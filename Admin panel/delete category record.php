<?php 
session_start();
if(!isset($_SESSION['admin'])==TRUE)
  {
    header("location:../login and registration/login.php");
  }

include('config.php');

$deleteid = $_GET['category_id'];

$q1 = "DELETE FROM category WHERE id='$deleteid' OR parent_id = '$deleteid'";

$p1 = mysql_query($q1,$con);

if($p1)
{
    echo "ddsdgs";
    echo '<script type="text/javascript"> 
                 
              window.location.href = "tables.php";
              </script>;';
}
else
{
    echo  "not able to delete";
}

?>