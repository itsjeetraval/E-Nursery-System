<?php 
session_start();
if(!isset($_SESSION['admin'])==TRUE)
  {
    header("location:../../login and registration/login.php");
  }

  include('../config.php');
  
 $oid = $_GET['oid'];

 $bq = "SELECT * FROM `billing` WHERE order_id = '$oid'";

 $bp = mysql_query($bq,$con);

 while($br = mysql_fetch_array($bp))
 {
     $bid = $br['id'];

     $dq = "SELECT * FROM `delivery` WHERE billing_id = '$bid'";

     $dp = mysql_query($dq,$con);

     while($dr = mysql_fetch_array($dp))
     {
        $did = $dr['id'];

        $date = $dr['date_shipped'];

        $ds = $dr['delivery_status'];

        $dd = $dr['delivery_details'];


     
?>


<!doctype html>
<!-- 
* Bootstrap Simple Admin Template
* Version: 2.1
* Author: Alexis Luna
* Website: https://github.com/alexis-luna/bootstrap-simple-admin-template
-->
<html lang="en">

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Edit Delivery</title>
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
                        <h3></h3>
                        <form method="post" action="upload_edit_delivery_details.php">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>Edit Delivery</strong><small> Form</small></div>
                        <div class="card-body card-block">
                            <div class="form-group"><label for="Category Name" class=" form-control-label"></label><input type="hidden" name="oid" id="company" placeholder="Enter Area name" value="<?php echo  $did; ?>" class="form-control" required></div>
                          
                          <div class="form-group"><label for="Category Name" class=" form-control-label">Shipping Date</label><input type="date" name="shipping_date" id="company" placeholder="Enter Date" class="form-control" style="width:200px" value="<?php echo $date; ?>" required></div>
                           <div class="form-group"><label for="Category Description" class=" form-control-label">Delivery Status</label><input type="number" min="0" max="1" value="<?php echo $ds; ?>"  name="delivery_status" id="vat" placeholder="Enter Delivery Status" class="form-control" style="width:100px"  required></div>

                           <div class="form-group"><label for="Category Description" class=" form-control-label">Delivery Details</label><input type="text" name="delivery_detials" id="vat" placeholder="Enter Delivery Detials" class="form-control" style="width:100%" value="<?php echo $dd; ?>" required></div>
                            
                           <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                           <span id="payment-button-amount" name="submit">Submit</span>
                        
                           </button>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </form>
         <?php 
         }

 }
 ?>
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