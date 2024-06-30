<?php
session_start();
if(!isset($_SESSION['admin'])==TRUE)
  {
    header("location:../../login and registration/login.php");
  }
    include "../config.php";
?>
 <?php 

                                    $cid = $_GET['catid'];
                               
                                    $category_nameq = "SELECT category_name FROM category WHERE category_id='$cid'";


                                    $category_namep = mysql_query($category_nameq,$con);

                                    if($category_namep)
                                    {


                                       if($catrow = mysql_fetch_array($category_namep))
                                       {

                                          $category_name = $catrow['category_name'];
                                       }




                                    






}


                                    ?>
