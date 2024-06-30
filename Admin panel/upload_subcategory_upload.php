<?php 

@$con = mysql_connect("localhost","root","");

if(!$con)
{
    die("error");
}
mysql_select_db("e-nursery system");
$a = $_POST['parent_category_name'];
$b = $_POST['subcategory_name'];
$c = $_POST['subcategory_desc'];


 $q = "SELECT * FROM category WHERE category_name='$b' ";

 $q2 = "SELECT id FROM category WHERE category_name='$a'";

    $p = mysql_query($q,$con);

    $p2 = mysql_query($q2,$con);

    if($p)


    {

        $r =  mysql_num_rows($p);

        if($r>=1)
        {
            echo '<script type="text/javascript"> 
                 alert("CATEGORY AND SUBCATEGORY MUST BE DIFFERENT"); 
                window.location.href = "subcategory_upload.php";
                </script>;';
        }

    }

    if($p2)
    {
        if($row = mysql_fetch_array($p2))
        {
           
           $parent_id = $row['id'];



           $q3 = "INSERT INTO category(category_name,category_desc,parent_id) VALUES('$b','$c','$parent_id')";
            
            $p3 = mysql_query($q3,$con);

            if($p3)
            {
               echo '<script type="text/javascript"> 
                 alert("Subcategory Created successfully"); 
                window.location.href = "subcategory_upload.php";
                </script>;'; 
            }


        }
        
    }
  

    


           


?>

          