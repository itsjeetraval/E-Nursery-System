<?php 

session_start();
if(!isset($_SESSION['admin'])==TRUE)
  {
    header("location:../../login and registration/login.php");
  }

  include('../config.php');


@$con = mysql_connect("localhost","root","");

if(!$con)
{
    die("error");
}
$pid = $_POST['pid'];

$cid = $_POST['cid'];



$a = $_POST['product_name'];

//echo $a."<br>";
$b = $_POST['product_desc'];
//echo $b."<br>";
$e = $_POST['product_price'];
//echo $e."<br>";
$f = $_POST['product_stock'];
//echo $f."<br>";
$g = $_POST['category_name'];
//echo $g."<br>";
$h = $_POST['sub_category_name'];
//echo $h."<br>";
if(!$h)
{
        $h = $g;
}

$filename1 = $_FILES["product_img1"]["name"];
$tempname1 = $_FILES["product_img1"]["tmp_name"]; 

//echo $filename1."<br>";

$folder1 = "../assets/img/Product images/".$filename1;   
$upload1 =move_uploaded_file($tempname1, $folder1);


$filename2 = $_FILES["product_img2"]["name"];
$tempname2 = $_FILES["product_img2"]["tmp_name"];

$file_ext1 = explode('.',$filename1);
$file_ext2 = explode('.',$filename2);

//echo $filename2."<br>"; 

$folder2 = "../assets/img/Product images/".$filename2;   
$upload2 =move_uploaded_file($tempname2, $folder2);

$file_ext_chk1 = strtolower(end($file_ext1));
$file_ext_chk2 = strtolower(end($file_ext2));

$valid_file_ext = array('png','jpg','jpeg');

if(in_array($file_ext_chk1,$valid_file_ext) AND in_array($file_ext_chk2,$valid_file_ext))
{

$i = $_POST['product_featured'];

if ($upload1) 
{

        if ($upload2) 
     {
             mysql_select_db("e-nursery system");

            $q = "UPDATE product SET product_name ='$a',product_desc = '$b',product_img1 ='$filename1',product_img2 = '$filename2',product_price = '$e',product_stock = '$f',category_id = '$g',sub_category_id = '$h',featured_id='$i' WHERE id = '$pid'";
            $p = mysql_query($q,$con);
             if($p)
            {
                echo '<script type="text/javascript"> 
                        alert("Product updated successfully"); 
                        window.location.href = "../tables.php";
                            </script>;';
           
            }
            else
            {
                echo "error".mysql_error();
            }
     }
      

}
}
else{
    echo '<script type="text/javascript"> 
                        alert("invalid file type"); 
                        window.location.href = "product_edit.php?product_id='.$pid.'&&cid='.$cid.'";
                            </script>;';

}
?>