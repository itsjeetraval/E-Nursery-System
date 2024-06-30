<?php 
session_start();
if(!isset($_SESSION['admin'])==TRUE)
  {
    header("location:../../login and registration/login.php");
  }
?>
<?php 

@$con = mysql_connect("localhost","root","");

mysql_select_db("e-nursery system");

$category_name = $_POST['category_name'];

$category_desc = $_POST['category_desc'];

$category_id = $_POST['category_id'];

$ucq = "SELECT * FROM `category` WHERE category_name = '$category_name'";

$ucp = mysql_query($ucq,$con);

$ucnr = mysql_num_rows($ucp);

if($ucnr)
{

  echo '<script type="text/javascript"> 
                 alert("category already exists !"); 
              window.location.href = "../tables.php";
              </script>;';
   
} 

else
{

$q1 = "UPDATE category SET category_name='$category_name',category_desc='$category_desc' WHERE id='$category_id'";

$p1 = mysql_query($q1,$con);

if($p1)
{
    echo '<script type="text/javascript"> 
                 alert("category updated successfully"); 
              window.location.href = "../tables.php";
              </script>;';

}
}




?>
<?php 