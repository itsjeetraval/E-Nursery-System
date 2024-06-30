<?php 




@$con = mysql_connect("localhost","root","");

if(!$con)
{
	die("error");
}

mysql_select_db("e-nursery system");

?>