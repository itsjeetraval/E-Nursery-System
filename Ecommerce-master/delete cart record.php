<?php 
session_start();
if(!isset($_SESSION['login'])==TRUE)
  {
    header("location:../login and registration/login.php");
  }

  include('con_inc.php');


  $uid = $_SESSION['uid'];

  $cid = $_GET['cart_id'];

   

?>
<?php 

$q = "DELETE FROM cart WHERE id = '$cid'  ";

$p = mysql_query($q,$con);

$rdq = "SELECT * FROM cart WHERE user_id = '$uid'";

$rdp = mysql_query($rdq,$con);

$rdnr = mysql_num_rows($rdp);





if($p)
{
    
      if(!$rdnr)
      {

         echo '<script type="text/javascript"> 
                 
              window.location.href = "products.php";
              </script>;';

      }


      echo '<script type="text/javascript"> 
                 
              window.location.href = "cart.php";
              </script>;';


    
    
  

              
}


?>