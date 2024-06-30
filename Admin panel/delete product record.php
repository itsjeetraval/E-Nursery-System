<?php 

session_start();
if(!isset($_SESSION['admin'])==TRUE)
  {
    header("location:../login and registration/login.php");

    
  }

  include('config.php');

  


$deleteproduct = $_GET['product_id'];

$q = "DELETE FROM product WHERE id='$deleteproduct'";

$p = mysql_query($q,$con);

if($p)
{
     header("location:tables.php");
}
else
{
    echo  "not able to delete";
}
?>