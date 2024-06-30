<?php 
session_start();
if(!isset($_SESSION['admin'])==TRUE)
  {
    header("location:../login and registration/login.php");
  }

  include('config.php');



?>



<!doctype html>
<!-- 
* Bootstrap Simple Admin Template
* Version: 2.1
* Author: Alexis Luna
* Website: https://github.com/alexis-luna/bootstrap-simple-admin-template
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Product Upload</title>
    <link href="assets/vendor/fontawesome/css/fontawesome.min.css" rel="stylesheet">
    <link href="assets/vendor/fontawesome/css/solid.min.css" rel="stylesheet">
    <link href="assets/vendor/fontawesome/css/brands.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/master.css" rel="stylesheet">
    <link href="assets/vendor/flagiconcss/css/flag-icon.min.css" rel="stylesheet">
</head>

<body>
    <div class="wrapper">
        <nav id="sidebar" class="active">
            <div class="sidebar-header">
                <img src="assets/img/bootstraper-logo.png" alt="bootraper logo" class="app-logo">
            </div>
            <ul class="list-unstyled components text-secondary">
                <li>
                    <a href="dashboard.php"><i class="fas fa-home"></i> Dashboard</a>
                </li>
                
                <li>
                    <a href="tables.php"><i class="fas fa-table"></i> Tables</a>
                </li>
                
                
                
                <li>
                    <a href="#pagesmenu" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle no-caret-down"><i class="fas fa-copy"></i> Pages</a>
                    <ul class="collapse list-unstyled" id="pagesmenu">
                        <li>
                            <a href="category_upload.php"><i class="fas fa-file"></i>Category page</a>
                        </li>
                         <li>
                            <a href="subcategory_upload.php"><i class="fas fa-file"></i>Subcategory page</a>
                        </li>
                        <li>
                            <a href="product_upload.php"><i class="fas fa-file"></i> Product page</a>
                        </li>
                        <li>
                            <a href="404.php"><i class="fas fa-info-circle"></i> 404 Error page</a>
                        </li>
                        <li>
                            <a href="500.php"><i class="fas fa-info-circle"></i> 500 Error page</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#pagesmenu" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle no-caret-down"><i class="fas fa-copy"></i>Edit Pages</a>
                    <ul class="collapse list-unstyled" id="pagesmenu">
                        <li>
                            <a href="category_edit.php"><i class="fas fa-file"></i>Category Edit Page</a>
                        </li>
                         <li>
                            <a href="subcategory_edit.php"><i class="fas fa-file"></i>Subcategory Edit page</a>
                        </li>
                        <li>
                            <a href="product_upload.php"><i class="fas fa-file"></i>Product Edit page</a>
                        </li>
                                           </ul>
                </li>
                
            </ul>
        </nav>
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
                               
                                    <i class="fas fa-user"></i> <?php  $aid = $_SESSION['aid']; 

                                  $q = "SELECT * FROM user_regestration WHERE id='$aid'";

                                  $p = mysql_query($q,$con);

                                  if($p)
                                  {
                                      while($r = mysql_fetch_array($p))
                                      {
                                          echo $r['user_name'];
                                      }
                                  }




                                ?> 
                                </a>
                                
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
      
            <!-- end of navbar navigation -->
            <div class="content">
                <div class="container-fluid">
                    <div class="page-title">
                        
                        <form method="post" action="upload_product_manager.php" enctype="multipart/form-data">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>Product</strong><small> Form</small></div>
                        <div class="card-body card-block">
                            <div class="form-group"><label for="Category Name" class=" form-control-label"></label>
                                <div class="form-group">
                                <label for="CATEGORY-DROPDOWN">Category</label>
                                <select class="form-control" id="category-dropdown" name="category_name" required>
                                    <option value="">Select Category</option>
                                    <?php
                                   $result = mysql_query("SELECT * FROM category where parent_id = 0",$con);
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

                    




                           <div class="form-group"><label for="Product Name" class=" form-control-label">Product Name</label><input type="text" name="product_name" id="company" placeholder="Enter your product name" class="form-control" required></div>
                           <div class="form-group"><label for="Poduct Description" class=" form-control-label">Poduct Description</label><input type="text" name="product_desc" id="vat" placeholder="About product..." class="form-control" required></div>
                           <div class="form-group"><label for="Product Image-1" class=" form-control-label">Product Image-1</label><input type="file" name="product_img1" id="street"  class="form-control" accept=".jpg,.png,.jpeg"  required></div>
                           <div class="form-group"><label for="Product Image-2" class=" form-control-label">Product Image-2</label><input type="file" accept=".jpg,.png,.jpeg" name="product_img2" id="street"  class="form-control" required></div>
                           <div class="form-group"><label for="Product Price" class=" form-control-label">Product Price</label><input type="text" name="product_price" id="country" placeholder="Enter product price" class="form-control" required></div>
                           <div class="form-group"><label for="Product Stock" class=" form-control-label">Product Stock</label><input type="text" name="product_stock" id="country" placeholder="Enter product stock" class="form-control" required></div>
                           <div class="form-group"><label for="Product Stock" class=" form-control-label">Product Featured ?</label><input type="number" name="product_featured" id="country" placeholder="Enter 1 for make product featured" class="form-control" min="0" max="1"required></div>
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