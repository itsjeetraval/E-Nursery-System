<?php 

$con = mysql_connect("localhost","root","");

mysql_select_db('e-nursery system');

$area_id = mysql_real_escape_string($_POST['area_id']);

$q = "SELECT * FROM area WHERE id='$area_id'";

$p = mysql_query($q,$con);

$options = "<option value=''>Select Pincode</option>";

while($r = mysql_fetch_array($p))
{
	$options .= "<option value='".$row['id']."'>".$r['pincode']."</option>";
}
echo $options;





?>