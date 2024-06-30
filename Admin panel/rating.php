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
    <title>Ratings</title>
    <link href="assets/vendor/fontawesome/css/fontawesome.min.css" rel="stylesheet">
    <link href="assets/vendor/fontawesome/css/solid.min.css" rel="stylesheet">
    <link href="assets/vendor/fontawesome/css/brands.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/datatables/datatables.min.css" rel="stylesheet">
    <link href="assets/css/master.css" rel="stylesheet">
</head>


            <!-- end of navbar navigation -->
            <h3><center><a href="dashboard.php">Go To Dashboard</a></center></h3>
            <div class="content">
                <div class="container">
                    <div class="page-title">
                        <h3><center>Ratings</center></h3>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                            <div class="card">

                                <div class="card-header">Rating</div>
                                <div class="card-body">
                                    <!--<p class="card-title">Add class <code>.table</code> inside table element</p>-->
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>User name</th>
                                                    <th>Product Name</th>
                                                
                                                    <th>Product img-1</th>
                                                    <th>Product img-2</th>
                                                    
                                                    <th>Rating</th>
                                                     <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                
                                                    <?php
                                                    $ratingq = "SELECT * FROM rating";

                                                    $ratingp = mysql_query($ratingq,$con);

                                                     if($ratingp)
                                                     {
                                                         while($ratingr = mysql_fetch_array($ratingp))
                                                         {
                                                        

                                                             $uid = $ratingr['user_id'];

                                                             $pid = $ratingr['product_id'];

                                                             $rating = $ratingr['rating'];
                                                        
                                                      $usersq = "SELECT * FROM user_registration WHERE id = '$uid'";
                                                    $userp = mysql_query($usersq,$con);
                                                      if($userp)
                                                      {
                                                        while($userpr = mysql_fetch_array($userp))
                                                    
                                                        {
                                                            $productq = "SELECT * FROM product WHERE id='$pid'";

                                                            $productp = mysql_query($productq,$con);

                                                            if($productp)
                                                            {
                                                                 while($productr = mysql_fetch_array($productp))
                                                                 {
                                                                     $img1 = $productr['product_img1'];
                                                                     $img2 = $productr['product_img2'];

                                    
                                                      ?>
                                                    <tr>
                                                    <th scope="row"><?php echo $ratingr['id']?></th>
                                                    <td><?php echo $userpr['user_name']?></td>
                                                    <td><?php echo $productr['product_name']?></td>
                                                    <td><?php echo '<img src="assets/img/Product images/'.$productr['product_img1'].'" width="100px;" height="100px" alt="error">'?></td>
                                                    <td><?php echo '<img src="assets/img/Product images/'.$productr['product_img2'].'" width="200px;" height="100px" alt="error">'?></td>
                                                    <td><?php 

            

                 $rq = "SELECT rating FROM rating WHERE product_id = '$pid' AND user_id='$uid'";

                 $rp = mysql_query($rq,$con);

                 if($rp)
                 {
                     while($rr = mysql_fetch_array($rp))
                     {
                          $stars_number = $rr['rating'];



                          $stars = ceil($stars_number);

                          $remaining = 5 - $stars;
                      
                        //    $val = $stars + $remaining;

                          //echo $val;




                          ?>

                          <div class="rating">
                            <?php for($i=1;$i<=$stars;$i++) 
                            { ?>
                    <i class="fa-fw select-all fas"></i>
                    <?php } 
                    for($i=1;$i<=$remaining;$i++)
                    { 
                        ?>
                        <i class="fa-fw select-all fas"></i>
                    <?php } ?>


                </div>
                <?php 
         

                     }
                 }
                 else
                 {
                     echo mysql_error();
                 }



                ?></td>
                                                    
                                                    
                                                    <td class="text-end">
                                            <form method="post" action="delete user record.php">
                                                <input type=hidden name="id" value="<?php echo $userpr['id']?>" readonly="readonly"> 
                                            <a href="delete rating.php?id=<?php echo $ratingr['id']?>" class="btn btn-outline-danger btn-rounded" onclick=" return deleteProfile();"><i class="fas fa-trash"></i></a>
                
                                        </td>
                                    
                                                    <?php


                                                                 }
                                                            }
                                                     }
                                                     }
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


<script type="text/javascript">

        function deleteProfile() {
    
    return confirm("are you really want to delete this record ?");
    if(ans) 
    {
       window.location.href = "delete rating.php";
    }
    else
    {
        window.location.href = "rating.php";
    }
   
}
</script>


