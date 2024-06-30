<?php 
session_start();
if(!isset($_SESSION['admin'])==TRUE)
  {
    header("location:../../login and registration/login.php");
  }
?>
<?php 

include "../config.php";

$id = $_GET['product_id'];

$q = "SELECT * FROM product WHERE id = '$id'";

$p = mysql_query($q,$con);

$r = mysql_fetch_array($p);

$cid = $_GET['cid'];


$q2 = "SELECT * FROM category WHERE id = '$cid'";

$p2 = mysql_query($q2,$con);

$r2 = mysql_fetch_array($p2);

$cid2 = $r2['id'];

$category_name = $r2['category_name'];

$img1 = $r['product_img1'];

$img1_path = "../assets/img/Product images/".$img1;


?>



<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Product edit</title>
    <link href="assets/vendor/fontawesome/css/fontawesome.min.css" rel="stylesheet">
    <link href="assets/vendor/fontawesome/css/solid.min.css" rel="stylesheet">
    <link href="assets/vendor/fontawesome/css/brands.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/master.css" rel="stylesheet">
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <div class="wrapper">
        <!-- sidebar navigation component -->
        <nav id="sidebar" class="active">
            <div class="sidebar-header">
                <img src="assets/img/bootstraper-logo.png" alt="bootraper logo" class="app-logo">
            </div>
            <ul class="list-unstyled components text-secondary">
                <li>
                    <a href="../dashboard.php"><i class="fas fa-home"></i>Dashboard</a>
                </li>
                
                <li>
                    <a href="../tables.php"><i class="fas fa-table"></i>Tables</a>
                </li>
               
                    
                </li>
                
               
                
            </ul>
        </nav>
        <!-- end of sidebar component -->
        <div id="body" class="active">
            <!-- navbar navigation component -->
            <nav class="navbar navbar-expand-lg navbar-white bg-white">
                <button type="button" id="sidebarCollapse" class="btn btn-light">
                    <i class="fas fa-bars"></i><span></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="nav navbar-nav ms-auto">
                        <li class="nav-item dropdown">
                            <div class="nav-dropdown">
                                
                                
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <div class="nav-dropdown">
                                <a href="#" id="nav2" class="nav-item nav-link dropdown-toggle text-secondary" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fas fa-user"></i> <span>John Doe</span> <i style="font-size: .8em;" class="fas fa-caret-down"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end nav-link-menu">
                                    <ul class="nav-list">
                                        <li><a href="" class="dropdown-item"><i class="fas fa-address-card"></i> Profile</a></li>
                                        <li><a href="" class="dropdown-item"><i class="fas fa-envelope"></i> Messages</a></li>
                                        <li><a href="" class="dropdown-item"><i class="fas fa-cog"></i> Settings</a></li>
                                        <div class="dropdown-divider"></div>
                                        <li><a href="" class="dropdown-item"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- end of navbar navigation -->
            <div class="content">
                <div class="container-fluid">
                    <div class="page-title">
                        
                        <form method="post" action="update_product.php" enctype="multipart/form-data">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>Product</strong><small> Form</small></div>
                        <div class="card-body card-block">
                            <div class="form-group"><label for="Category Name" class=" form-control-label"></label>
                                <div class="form-group">
                                    <label for="CATEGORY-DROPDOWN">Category</label>

                                
                                <select class="form-control" id="category-dropdown" name="category_name">
                                    <option value="<?php echo $r2['id'] ?>"><?php echo $r2['category_name'] ?></option>
                                    <?php
                                   $result = mysql_query("SELECT * FROM category where parent_id = 0 AND category_name !='$category_name'",$con);
                                    while($row = mysql_fetch_array($result))
                                     {
                                            ?>
                                    <option value="<?php echo $row['id'];?>"><?php echo $row["category_name"];?></option>
                        <?php
                        }
                        ?>
                                </select>

                            </div>
                            <div class="form-group">
<label for="SUBCATEGORY">Sub Category</label>
<select class="form-control" id="sub-category-dropdown" name="sub_category_name">
</select>
</div>
 <div class="form-group"><label for="Product Name" class=" form-control-label">Product Name</label><input type="text" name="product_name" id="company" placeholder="Enter your product name" class="form-control" value="<?php echo $r['product_name']?>" required></div>
                           <div class="form-group"><label for="Poduct Description" class=" form-control-label">Poduct Description</label><input type="text" name="product_desc" id="vat" placeholder="About product..." class="form-control"  value="<?php echo $r['product_desc']?>" required></div>
                           <div class="form-group"><label for="Product Image-1" class=" form-control-label">Product Image-1</label><input type="file" name="product_img1" id="street"  class="form-control"  value="<?php echo $img1_path ?>" required></div>
                           <div class="form-group"><label for="Product Image-2" class=" form-control-label">Product Image-2</label><input type="file" name="product_img2" id="street"  class="form-control" required></div>
                           <div class="form-group"><label for="Product Price" class=" form-control-label">Product Price</label><input type="text" name="product_price" id="country" placeholder="Enter product price" class="form-control" value="<?php echo $r['product_price']?>" required></div>
                           <div class="form-group"><label for="Product Stock" class=" form-control-label">Product Stock</label><input type="text" name="product_stock" id="country" placeholder="Enter product stock" class="form-control" value="<?php echo $r['product_stock']?>" required></div>
                           <div class="form-group"><label for="Product Stock" class=" form-control-label"></label><input type="hidden" name="pid" id="country" placeholder="Enter product stock" class="form-control" value="<?php echo $_GET['product_id']?>" required></div>
                           <div class="form-group"><label for="Product Stock" class=" form-control-label"></label><input type="hidden" name="cid" id="country" placeholder="Enter product stock" class="form-control" value="<?php echo $_GET['cid']?>" required></div>
                           <div class="form-group"><label for="Product Stock" class=" form-control-label">Product Featured ?</label><input type="number" name="product_featured" id="country" placeholder="Enter 1 for make product featured" class="form-control" min="0" max="1" value="<?php echo $r['featured_id'] ?>"required></div>
                           <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">

                           <span id="payment-button-amount" name="submit">Submit</span>


                           </button>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/script.js"></script>

                            
    <script>
$(document).ready(function() {
$('#category-dropdown').on('change', function() {
var category_id = this.value;
$.ajax({
url: "fetch-subcategory-by-category.php",
type: "POST",
data: {
category_id: category_id
},
cache: false,
success: function(result){
$("#sub-category-dropdown").html(result);
}
});
});
});
</script>
</body>

</html>