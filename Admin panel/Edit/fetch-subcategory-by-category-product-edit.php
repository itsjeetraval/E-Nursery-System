<?php 
session_start();
if(!isset($_SESSION['admin'])==TRUE)
  {
    header("location:../../login and registration/login.php");
  }
?>

<?php
require_once "config.php";
$category_id = $_POST["category_id"];
$result = mysql_query("SELECT * FROM category where parent_id = $category_id",$con);
?>
<option value="">Select SubCategory</option>
<?php
while($row = mysql_fetch_array($result)) {
?>
<option value="<?php echo $row["id"];?>"><?php echo $row["category_name"];?></option>
<?php
}
?>