<?php 
 session_start();


header("location:login.php");

unset($_SESSION['login']);


?>