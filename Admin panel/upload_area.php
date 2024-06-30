<?php 

@$con = mysql_connect("localhost","root","");

if(!$con)
{
    die("error");
}
$a = $_POST['area_name'];
$b = $_POST['pincode'];
//$c = $_POST['sub_category_name'];


      mysql_select_db("e-nursery system");

$q = "SELECT * FROM area WHERE area_name = '$a' OR pincode='$b'";

$p = mysql_query($q,$con);

if($p)
{
     $nr = mysql_num_rows($p);

     if($nr>=1)
     {
          echo '<script type="text/javascript"> 
                 alert("Given data is already associated with the area !!"); 
                window.location.href = "area_upload.php";
                </script>;';
     }
     else if(!preg_match("/^[3]{1}[8]{1}[0]{2}\d{2}$/",$b))
   {
 
    echo '<script type="text/javascript"> 
                 alert("verify your pincode"); 
              window.location.href = "area_upload.php";
              </script>;';
 }
     else
{
    $iq = "INSERT INTO area(area_name,pincode) VALUES ('$a',$b)";

    $ip = mysql_query($iq,$con);

    if($ip)
    {
        echo '<script type="text/javascript"> 
                 alert("Area added successfully !!!"); 
                window.location.href = "tables.php";
                </script>;';

                echo "done";

    }
    else
    {

        echo '<script type="text/javascript"> 
                 alert("Something Wrong Happened!!"); 
                window.location.href = "area_upload.php";
                </script>;';

    }

}

    

}


?>