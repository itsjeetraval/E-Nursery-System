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
    <title>Tables</title>
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

                                  $q = "SELECT * FROM user_registration WHERE id='$aid'";

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
                 <h6 style="margin-left:20px;"><a href="logout.php">Logout</a></h6>
            </nav>
      



            <div class="content">
                <div class="container">
                    <div class="page-title">
                        <h3>Tables</h3>
                    </div>
                    <div class="row">




                        <div class="col-md-12 col-lg-12">
                            <div class="card">
                                <div class="card-header">Area <a href="area_upload.php" style="
    
    text-align: center;
    text-decoration: none;
    font-size: 15px;
    margin-left: 900px;
    color:#566573
    opacity: 0.9;" ><span class="fa-fw select-all fas"></span>Add Area</a></h3></div>
                                <div class="card-body">
                                    <!--<p class="card-title">Add class <code>.table</code> inside table element</p>-->
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Area Name</th>
                                            
                                                    <th>Pincode</th>
                                                    
                                                    
                                        
                                                     
                                                    <th colspan="3">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                
                                                    <?php
                                                    @$con = mysql_connect("localhost","root",'');
                                                     mysql_select_db("e-nursery system");
                                                    $areaq = "SELECT * FROM area";
                                                    $areap = mysql_query($areaq,$con);
                                                      if($areap)
                                                      {
                                                        while($areapr = mysql_fetch_array($areap))
                                                    
                                                        {
                                    
                                                      ?>
                                                    <tr>
                                                    <th scope="row"><?php echo $areapr['id']?></th>
                                                    <td><?php echo $areapr['area_name']?></td>
                                            
                                                    <td><?php echo $areapr['pincode']?></td>
                                                    
                                                 
                                                
                                                
                                                    
                                                    <td class="text-end">
                                                         <form method="post" action="delete user record.php">
                                                <input type=hidden name="id" value="<?php echo $areapr['id']?>" readonly="readonly"> 
                                            <a href="delete user record.php?area_id=<?php echo $areapr['id']?>" class="btn btn-outline-danger btn-rounded" onclick=" return deleteProfile();"><i class="fas fa-trash"></i></a></td>
                                            <td><a href="Edit/area_edit.php?area_id=<?php echo $areapr['id']?>" class="btn btn-outline-info btn-rounded"><i class="fas fa-pen"></i></a></td>
                                        
                
                                        </td>
                                    
                                                    <?php
                                                      }
                                                  }
                                                  ?>
                                                </tr>
                                        
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>





























































                        <div class="col-md-12 col-lg-12">
                            <div class="card">
                                <div class="card-header">Users</div>
                                <div class="card-body">
                                    <!--<p class="card-title">Add class <code>.table</code> inside table element</p>-->
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Password</th>
                                                     <th>Confirm Password</th>
                                                    <th>Phone number</th>
                                                    <th>Area</th>
                                                    <th>Address</th>
                                                    <th>Pincode</th>
                                                    <th>Gender</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                
                                                    <?php
                                                    @$con = mysql_connect("localhost","root",'');
                                                     mysql_select_db("e-nursery system");
                                                    $usersq = "SELECT * FROM user_registration WHERE user_name!='admin'";
                                                    $userp = mysql_query($usersq,$con);
                                                      if($userp)
                                                      {
                                                        while($userpr = mysql_fetch_array($userp))
                                                    
                                                        {
                                                            
                                    
                                                      ?>
                                                    <tr>
                                                    <th scope="row"><?php echo $userpr['id']?></th>
                                                    <td><?php echo $userpr['user_name']?></td>
                                                    <td><?php echo $userpr['email_id']?></td>
                                                    <td><?php echo $userpr['password']?></td>
                                                    <td><?php echo $userpr['confirm_password']?></td>
                                                    <td><?php echo $userpr['phone_number']?></td>
                                        
                                                    <td><?php echo $userpr['area']?></td>
                                                    
                                                    <td><?php echo $userpr['address']?></td>
                                                    <td><?php echo $userpr['pincode']?></td>
                                                    <td><?php echo $userpr['user_gender']?></td>
                                                    <td class="text-end">
                                            <form method="post" action="delete user record.php">
                                                <input type=hidden name="id" value="<?php echo $userpr['id']?>" readonly="readonly"> 
                                            <a href="delete user record.php?id=<?php echo $userpr['id']?>" class="btn btn-outline-danger btn-rounded" onclick=" return deleteProfile();"><i class="fas fa-trash"></i></a>
                
                                        </td>
                                    
                                                    <?php
                                                
                                                      }
                                                  }
                                                  ?>
                                                </tr>
                                        
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>









                        <div class="col-md-12 col-lg-12">
                            <div class="card">
                                <div class="card-header">Category <a href="category_upload.php" style="
    
    text-align: center;
    text-decoration: none;
    font-size: 15px;
    margin-left: 900px;
    color:#566573
    opacity: 0.9;" ><span class="fa-fw select-all fas"></span>Add Category</a></h3></div>
                                <div class="card-body">
                                    <!--<p class="card-title">Add class <code>.table</code> inside table element</p>-->
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Category Name</th>
                                                    <th>Category Description</th>
                                                     
                                                    
                                                     <th>Actions</th>
                                                  
                                                </tr>
                                            </thead>
                                            <tbody>
                                                
                                                    <?php
                                                    @$con = mysql_connect("localhost","root",'');
                                                     mysql_select_db("e-nursery system");
                                                    $categoryq = "SELECT * FROM category WHERE parent_id = 0";
                                                    $categoryp = mysql_query($categoryq,$con);
                                                      if($categoryp)
                                                      {
                                                        while($categorypr = mysql_fetch_array($categoryp))
                                                    
                                                        {
                                    
                                                      ?>
                                                    <tr>
                                                    <th scope="row"><?php echo $categorypr['id']?></th>
                                                    <td><?php echo $categorypr['category_name']?></td>
                                                    <td><?php echo $categorypr['category_desc']?></td>
                                        
                                                    
                                                    <td class="text-end">
                                                         <form method="post" action="delete category record.php">
                                                <input type=hidden name="id" value="<?php echo $categorypr['id']?>" readonly="readonly"> 
                                            <a href="delete category record.php?category_id=<?php echo $categorypr['id']?>" class="btn btn-outline-danger btn-rounded" onclick=" return deleteCategory();"><i class="fas fa-trash"></i></a>
                                            <a href="Edit/category_edit.php?category_id=<?php echo $categorypr['id']?>&&category_name=<?php echo $categorypr['category_name'] ?>&&category_desc=<?php echo $categorypr['category_desc'] ?>" class="btn btn-outline-info btn-rounded"><i class="fas fa-pen"></i></a>
                                        
                
                                        </td>
                                    
                                                    <?php
                                                      }
                                                  }
                                                  ?>
                                                </tr>
                                        
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>













 <div class="col-md-12 col-lg-12">
                            <div class="card">
                                <div class="card-header">Subcategory<a href="subcategory_upload.php" style="
    
    text-align: center;
    text-decoration: none;
    font-size: 15px;
    margin-left: 850px;
    color:#566573
    opacity: 0.9;" ><span class="fa-fw select-all fas"></span>Add Subcategory</a></h3></div>
                                <div class="card-body">
                                    <!--<p class="card-title">Add class <code>.table</code> inside table element</p>-->
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Category Name</th>
                                                    <th>Subcategory Name</th>
                                                    <th>Subcategory Description</th>
                                                    <th></th>
                                                     <th>Actions</th>
                                                  
                                                </tr>
                                            </thead>
                                            <tbody>
                                                
                                                    <?php
                                                    @$con = mysql_connect("localhost","root",'');
                                                     mysql_select_db("e-nursery system");
                                                    $categoryq = "SELECT * FROM category WHERE parent_id != 0";
                                                    $categoryp = mysql_query($categoryq,$con);
                                                      if($categoryp)
                                                      {
                                                        while($categorypr = mysql_fetch_array($categoryp))
                                                    
                                                        {
                                    
                                                      ?>
                                                    <tr>
                                                    <th scope="row"><?php echo $categorypr['id']?></th>
                                                    <td><?php $preid = $categorypr['parent_id']; $preq = "SELECT * FROM category WHERE id= '$preid'";

                                                    $prep = mysql_query($preq,$con);

                                                    $prer = mysql_fetch_array($prep);

                                                    echo $prer['category_name'];


                                                ?></td>
                                            
                                                    <td><?php echo $categorypr['category_name']?></td>
                                                    <td><?php echo $categorypr['category_desc']?></td>
                                                    
                                            
                                                    
                                                    <td class="text-end">
                                                         <form method="post" action="delete category record.php">
                                                <input type=hidden name="id" value="<?php echo $categorypr['id']?>" readonly="readonly"> 
                                            <a href="delete category record.php?category_id=<?php echo $categorypr['id']?>" class="btn btn-outline-danger btn-rounded" onclick=" return deleteCategory();"><i class="fas fa-trash"></i></a>
                                            <a href="Edit/subcategory_edit.php?subcategory_id=<?php echo $categorypr['id']?>&&parent_id=<?php echo $categorypr['parent_id']  ?>" class="btn btn-outline-info btn-rounded"><i class="fas fa-pen"></i></a>
                                        
                
                                        </td>
                                    
                                                    <?php
                                                      }
                                                  }
                                              
                                                  ?>
                                                </tr>
                                        
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
















                







                         <div class="row">
                        <div class="col-md-12 col-lg-12">
                            <div class="card">
                                <div class="card-header">Products<a href="product_upload.php" style="
    
    text-align: center;
    text-decoration: none;
    font-size: 15px;
    margin-left: 880px;
    color:#566573
    opacity: 0.9;" ><span class="fa-fw select-all fas"></span>Add Product</a></h3></div>
                                <div class="card-body">
                                    <!--<p class="card-title">Add class <code>.table</code> inside table element</p>-->
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Product name</th>
                                                    <th>Product description</th>
                                                    <th>Product image-1</th>
                                                     <th>Product image-2</th>
                                                    <th>Product Price</th>
                                                    <th>Product stock</th>
                                                    <th>Category Name</th>
                                                    <th>Subcategory Name</th>
                                                    <th>Featured ?</th>
                                                    <th> Actions</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                
                                                    <?php
                                                    @$con = mysql_connect("localhost","root",'');
                                                     mysql_select_db("e-nursery system");
                                                    $productsq = "SELECT * FROM product";
                                                    $productsp = mysql_query($productsq,$con);
                                                      if($productsp)
                                                      {
                                                        while($productspr = mysql_fetch_array($productsp))
                                                    
                                                        {
                                                            $img1 = $productspr['product_img1'];
                                                            $img2 = $productspr['product_img2'];
                                    
                                                      ?>
                                                    <tr>
                                                    <th scope="row"><?php echo $productspr['id']?></th>
                                                    <td><?php echo $productspr['product_name']?></td>
                                                    <td><?php echo $productspr['product_desc']?></td>
                                                    <td><?php echo '<img src="assets/img/Product images/'.$productspr['product_img1'].'" width="100px;" height="100px" alt="error">'?></td>
                                                    <td><?php echo '<img src="assets/img/Product images/'.$productspr['product_img2'].'" width="200px;" height="100px" alt="error">'?></td>
                                                    <td><?php echo $productspr['product_price']?></td>
                                                    <td><?php echo $productspr['product_stock']?></td>
                                                    <td><?php 

                                                     @$con = mysql_connect("localhost","root",'');
                                                     mysql_select_db("e-nursery system");

                                                    $cid = $productspr['category_id']; 

                                                    $cnameq = "SELECT category_name FROM category WHERE id='$cid'";

                                                    $cnamep = mysql_query($cnameq,$con);

                                                    if($cnamep)
                                                    {
                                                         while($cname = mysql_fetch_array($cnamep))
                                                         {
                                                             echo $cname['category_name'];
                                                         }
                                                    }














                                                ?></td>
                                                    <td><?php 
                                                    $scid =  $productspr['sub_category_id'];

                                                    if($cid == $scid)
                                                    {
                                                         echo "Not Have Subcategory";
                                                    }
                                                    else
                                                    {


$scnameq = "SELECT category_name FROM category WHERE id='$scid'";

                                                    $scnamep = mysql_query($scnameq,$con);

                                                    if($scnamep)
                                                    {
                                                         while($scname = mysql_fetch_array($scnamep))
                                                         {
                                                             echo $scname['category_name'];
                                                         }
                                                    }
                                                }















                                                ?></td>
                                                    <td><?php $featured =  $productspr['featured_id']; if($featured==1){echo "Yes";}else{echo "No";}?></td>
                                                  
                                                    <td class="text-end">
                                        
                                                <input type=hidden name="product_id" value="<?php echo $productspr['id']?>" readonly="readonly"> 
                                                <a href="delete product record.php?product_id=<?php echo $productspr['id']?>" class="btn btn-outline-danger btn-rounded" onclick=" return deleteProduct();"><i class="fas fa-trash"></i></a>
                                                <a href="Edit/product_edit.php?product_id=<?php echo $productspr['id']?>&&cid=<?php echo $productspr['category_id']?>&&scid=<?php echo $productspr['sub_category_id'] ?>" class="btn btn-outline-info btn-rounded"><i class="fas fa-pen"></i></a>
                                            
                                        </td>
                    
                                                    <?php
                                                      }
                                                  }
                                                  ?>
                                                </tr>
                                        
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--<div class="col-md-12 col-lg-12">
                            <div class="card">
                                <div class="card-header">Stripe Table</div>
                                <div class="card-body">
                                    <p class="card-title">Add class <code>.table-striped</code> inside table element</p>
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>First Name</th>
                                                    <th>Last Name</th>
                                                    <th>Username</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th scope="row">1</th>
                                                    <td>Mark</td>
                                                    <td>Otto</td>
                                                    <td>@mdo</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">2</th>
                                                    <td>Jacob</td>
                                                    <td>Thornton</td>
                                                    <td>@fat</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">3</th>
                                                    <td>Larry</td>
                                                    <td>the Bird</td>
                                                    <td>@twitter</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-12">
                            <div class="card">
                                <div class="card-header">Basic DataTables Table</div>
                                <div class="card-body">
                                    <p class="card-title"></p>
                                    <table class="table table-hover" id="dataTables-example" width="100%">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Salary</th>
                                                <th>Country</th>
                                                <th>City</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Dakota Rice</td>
                                                <td>$36,738</td>
                                                <td>United States</td>
                                                <td>Oud-Turnhout</td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Minerva Hooper</td>
                                                <td>$23,789</td>
                                                <td>Curaçao</td>
                                                <td>Sinaai-Waas</td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Sage Rodriguez</td>
                                                <td>$56,142</td>
                                                <td>Netherlands</td>
                                                <td>Baileux</td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>Philip Chaney</td>
                                                <td>$38,735</td>
                                                <td>Korea, South</td>
                                                <td>Overland Park</td>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td>Doris Greene</td>
                                                <td>$63,542</td>
                                                <td>Malawi</td>
                                                <td>Feldkirchen in Kärnten</td>
                                            </tr>
                                            <tr>
                                                <td>6</td>
                                                <td>Mason Porter</td>
                                                <td>$78,615</td>
                                                <td>Chile</td>
                                                <td>Gloucester</td>
                                            </tr>
                                            <tr>
                                                <td>7</td>
                                                <td>Allisa Sanches</td>
                                                <td>$28,615</td>
                                                <td>Columbia</td>
                                                <td>Nigger</td>
                                            </tr>
                                            <tr>
                                                <td>8</td>
                                                <td>Peter Benhams</td>
                                                <td>$33,215</td>
                                                <td>Ecuador</td>
                                                <td>Holster</td>
                                            </tr>
                                            <tr>
                                                <td>9</td>
                                                <td>Bramson Adams</td>
                                                <td>$109,222</td>
                                                <td>Philippines</td>
                                                <td>Camp John</td>
                                            </tr>
                                            <tr>
                                                <td>10</td>
                                                <td>Jessie Williams</td>
                                                <td>$55,123</td>
                                                <td>Malaysia</td>
                                                <td>Glosterine</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-12">
                            <div class="card">
                                <div class="card-header">Bordered Table</div>
                                <div class="card-body">
                                    <p class="card-title">Add class <code>.table-bordered</code> for borders on all sides of the table and cells.</p>
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th scope="col">ID</th>
                                                    <th scope="col">First</th>
                                                    <th scope="col">Last</th>
                                                    <th scope="col">Handle</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th scope="row">1</th>
                                                    <td>Mark</td>
                                                    <td>Otto</td>
                                                    <td>@mdo</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">2</th>
                                                    <td>Jacob</td>
                                                    <td>Thornton</td>
                                                    <td>@fat</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">3</th>
                                                    <td>Larry the Bird</td>
                                                    <td>Gogles</td>
                                                    <td>@twitter</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-12">
                            <div class="card">
                                <div class="card-header">Compact Table</div>
                                <div class="card-body">
                                    <p class="card-title">Add class <code>.table-sm </code> to make tables more compact by cutting cell padding in half.</p>
                                    <div class="table-responsive">
                                        <table class="table table-sm">
                                            <thead>
                                                <tr>
                                                    <th scope="col">ID</th>
                                                    <th scope="col">First</th>
                                                    <th scope="col">Last</th>
                                                    <th scope="col">Handle</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th scope="row">1</th>
                                                    <td>Mark</td>
                                                    <td>Otto</td>
                                                    <td>@mdo</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">2</th>
                                                    <td>Jacob</td>
                                                    <td>Thornton</td>
                                                    <td>@fat</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">3</th>
                                                    <td>Larry the Bird</td>
                                                    <td>Gogles</td>
                                                    <td>@twitter</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>!-->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/datatables/datatables.min.js"></script>
    <script src="assets/js/initiate-datatables.js"></script>
    <script src="assets/js/script.js"></script>
    <script type="text/javascript">

        function deleteProfile() {
    
    return confirm("are you really want to delete this record ?");
    if(ans) 
    {
       window.location.href = "delete user record.php";
    }
    else
    {
        window.location.href = "tables.php";
    }
   
}




 function deleteCategory() {
    
    return confirm("are you really want to delete this record ?");
    if(ans) 
    {
       window.location.href = "delete category record.php";
    }
    else
    {
        window.location.href = "tables.php";
    }
   
}



function deleteProduct() {
    
    return confirm("are you really want to delete this record ?");
    if(ans) 
    {
       window.location.href = "delete product record.php";
    }
    else
    {
        window.location.href = "tables.php";
    }
   
}
        



    </script>
</body>

</html>
