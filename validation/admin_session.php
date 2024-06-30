<?php 
session_start();

$_SESSION['admin'] = TRUE;

if(isset($_SESSION['admin']))
{
	header("location:../admin panel/dashboard.php");
}



?>