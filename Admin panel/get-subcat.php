<?php
    include "config.php";
    $category_id = $_POST["id"];
    $result = mysql_query("SELECT * FROM category where sub_category(id) = $category_id",$con);
?>
<option value="">Select Sub Category</option>
<?php
    while($row = mysql_fetch_array($result)) {
?>
<option value="<?php echo $row["id"];?>"><?php echo $row["category"];?></option>
<?php
    }
?>