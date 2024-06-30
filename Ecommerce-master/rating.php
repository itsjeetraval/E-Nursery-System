<?php 

session_start();
if(!isset($_SESSION['login'])==TRUE)
  {
    header("location:../login and registration/login.php");
  }

  include('con_inc.php');
 
 $pid = $_POST['pid'];

 $rating = $_POST['star'];

 $uid = $_SESSION['uid'];

?>
<?php 

 $urq = "SELECT * FROM rating WHERE user_id = '$uid' AND product_id = '$pid'";

 $urp = mysql_query($urq,$con);

 $urnr = mysql_num_rows($urp);

  if($urnr>=1)
  {
  	 $uprq = "UPDATE rating  SET rating= '$rating' WHERE user_id = '$uid' AND product_id='$pid' ";

  	 $uprp = mysql_query($uprq,$con);
  	  if ($uprp) 
  	  {
  	  	  echo '<script type="text/javascript"> 
                 alert("You had rated this product so your rating is Updated"); 
              window.location.href = "product_details.php?pid='.$pid.'";
              </script>;';
  	  }
  }

  else 
  {

$q = "INSERT INTO rating(user_id,product_id,rating) VALUES ($uid,$pid,$rating)";

$p = mysql_query($q,$con);

if($p)
{
	 echo '<script type="text/javascript"> 
                 alert("Product rated Successfully !"); 
              window.location.href = "product_details.php?pid='.$pid.'";
              </script>;';
}
else
{
	 echo mysql_error();
}
}






?>