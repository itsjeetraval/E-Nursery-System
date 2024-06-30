<?php 
session_start();
if(!isset($_SESSION['admin'])==TRUE)
  {
    header("location:../../login and registration/login.php");
  }

  include('../config.php');



@$con = mysql_connect("localhost","root","");

mysql_select_db("e-nursery system");

$category_id = $_POST['category_name'];

$subcategory_name = $_POST['subcategory_name'];

$subcategory_desc = $_POST['subcategory_desc'];

$parent_id = $_POST['parent_id'];

$id = $_POST['id'];


$q = "SELECT * FROM category WHERE id = '$category_id'";

$p = mysql_query($q,$con);

if($p)
{
     while($r = mysql_fetch_array($p))
     {
         $cname = $r['category_name'];

         if($subcategory_name == $cname)
         {
            echo '<script type="text/javascript"> 
                 alert("category and subcategory name should be different"); 
              window.location.href = "subcategory_edit.php?subcategory_id='.$id.'&&parent_id='.$parent_id.'";
              </script>;';
              
             
         }
         else
         {

            $q1 = "UPDATE category SET category_name='$subcategory_name',category_desc='$subcategory_desc',parent_id='$category_id' WHERE id='$id'";

$p1 = mysql_query($q1,$con);

if($p1)
{
    echo '<script type="text/javascript"> 
                 alert("Subcategory updated successfully"); 
              window.location.href = "../tables.php";
              </script>;';
              
}
else
{
    echo '<script type="text/javascript"> 
                 alert("subcategory already exists !"); 
              window.location.href = "subcategory_edit.php?subcategory_id='.$id.'&&parent_id='.$parent_id.'";
              </script>;';
}


         }
     }
}




?>
