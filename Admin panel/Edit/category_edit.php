<?php 
session_start();
if(!isset($_SESSION['admin'])==TRUE)
  {
    header("location:../../login and registration/login.php");
  }

  include('../config.php');



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
    <title>Edit Category</title>
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
                    <a href="../tables.php"><i class="fas fa-table"></i> Tables</a>
                </li>
                
                
                
                
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
                        <h3></h3>
                        <form method="post" action="update_category.php" enctype="multipart/form-data">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>Category</strong><small> Form</small></div>
                        <div class="card-body card-block">
                            <div class="form-group"><label for="Category Name" class=" form-control-label"></label><input type="hidden" name="category_id" id="company" placeholder="Enter your category name" class="form-control" value="<?php echo $_GET['category_id'] ?>" required>
                            </div>
                           
                          <div class="form-group"><label for="Category Name" class=" form-control-label">Category Name</label><input type="text" name="category_name" id="company" placeholder="Enter your category name" class="form-control" value="<?php echo $_GET['category_name'] ?>" required>
                            </div>
                           <div class="form-group"><label for="Category Description" class=" form-control-label">Category Description</label><input type="text" name="category_desc" id="vat" placeholder="About category..." class="form-control" value="<?php echo $_GET['category_desc'] ?>" required></div>
                            
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
</body>

</html>