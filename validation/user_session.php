<?php 
session_start();


$_SESSION['login'] = TRUE;

if(isset($_SESSION['login']))
{
	header("location:../Ecommerce-master/index.php");
}



?>