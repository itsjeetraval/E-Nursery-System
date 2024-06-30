<?php 

@$con = mysql_connect("localhost","root","");

if(!$con)
{
	die("error");
}

$a = $_POST['product_name'];
$b = $_POST['product_desc'];
$e = $_POST['product_price'];
$f = $_POST['product_stock'];
$g = $_POST['category_name'];
$h = $_POST['sub_category_name'];

if(!$h)
{
        $h = $g;
}

$filename1 = $_FILES["product_img1"]["name"];
$tempname1 = $_FILES["product_img1"]["tmp_name"]; 

$folder1 = "assets/img/Product images/".$filename1;   
$upload1 =move_uploaded_file($tempname1, $folder1);

$filename2 = $_FILES["product_img2"]["name"];
$tempname2 = $_FILES["product_img2"]["tmp_name"]; 

$file_ext1 = explode('.',$filename1);
$file_ext2 = explode('.',$filename2);

$file_ext_chk1 = strtolower(end($file_ext1));
$file_ext_chk2 = strtolower(end($file_ext2));

$valid_file_ext = array('png','jpg','jpeg');

if(in_array($file_ext_chk1,$valid_file_ext) AND in_array($file_ext_chk2,$valid_file_ext))
{



$folder2 = "assets/img/Product images/".$filename2;   
$upload2 =move_uploaded_file($tempname2, $folder2);
$featured = $_POST['product_featured'];
if ($upload1) 
{

        if ($upload2) 
     {
             mysql_select_db("e-nursery system");

			$q = "INSERT INTO product(product_name,product_desc,product_img1,product_img2,product_price,product_stock,category_id,sub_category_id,featured_id) VALUES('$a','$b','$filename1','$filename2',$e,$f,$g,$h,$featured)";
			$p = mysql_query($q,$con);
		     if($p)
		    {
				echo '<script type="text/javascript"> 
                 		alert("Product added successfully"); 
              			window.location.href = "tables.php";
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
                                alert("invalid file type !!"); 
                                window.location.href = "product_upload.php";
                                        </script>;';

}

?>