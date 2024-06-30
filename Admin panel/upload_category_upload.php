<?php 

@$con = mysql_connect("localhost","root","");

if(!$con)
{
    die("error");
}
$a = $_POST['category_name'];
$b = $_POST['category_desc'];
//$c = $_POST['sub_category_name'];


      mysql_select_db("e-nursery system");

        

           $existing = "SELECT * FROM category WHERE category_name='$a' ";

           $existingp = mysql_query($existing,$con);

        
           

             

          /* $q1 = "SELECT id FROM category WHERE category_name='$c'";

            $p1 = mysql_query($q1,$con);

            $row = mysql_fetch_array($p1);

            $parent_id = $row['id'];*/



           $q = "INSERT INTO category(category_name,category_desc) VALUES('$a','$b')";
            $p = mysql_query($q,$con);


           $numofres = mysql_num_rows($existingp);

           if($numofres>=1)
           {
                   echo '<script type="text/javascript"> 
                 alert("category must be different"); 
                window.location.href = "tables.php";
                </script>;';
                
 
           }

             else {

                if($p)
            {
                echo '<script type="text/javascript"> 
                 alert("category added successfully"); 
                window.location.href = "category_upload.php";
                </script>;';
           
            }
            else
            {
                echo "".mysql_error();
            }
        }

?>