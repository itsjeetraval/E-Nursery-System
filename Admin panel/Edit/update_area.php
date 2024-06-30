<?php 

session_start();
if(!isset($_SESSION['admin'])==TRUE)
  {
    header("location:../../login and registration/login.php");
  }

include "../config.php";

$aid = $_POST['area_id'];

$aname = $_POST['area_name'];

$pincode = $_POST['pincode'];


$q = "SELECT * FROM `area` WHERE  area_name = '$aname' OR pincode='$pincode'";

$p = mysql_query($q,$con);

if($p)
{
     $nr = mysql_num_rows($p);

     if($nr>=1)
     {
          echo '<script type="text/javascript"> 
                 alert("Given data is already associated with the area !!"); 
                window.location.href = "area_edit.php?area_id='.$aid.'";
                </script>;';

     }
     else if(!preg_match("/^[3]{1}[8]{1}[0]{2}\d{2}$/",$pincode))
   {
 
    echo '<script type="text/javascript"> 
                 alert("verify your pincode"); 
              window.location.href = "area_edit.php?area_id='.$aid.'";
              </script>;';
 }

else
{

$uq = "UPDATE `area` SET `area_name`='$aname',`pincode`=$pincode WHERE id = '$aid'";

$up = mysql_query($uq,$con);

if($up)
{
	 echo '<script type="text/javascript"> 
                 alert("Area updated successfully"); 
              window.location.href = "../tables.php";
              </script>;'; 

}
}
}











?>