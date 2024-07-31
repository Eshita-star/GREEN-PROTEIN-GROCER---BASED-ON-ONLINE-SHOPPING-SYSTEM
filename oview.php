<?php include("include/config.php");?>
<?php
if(isset($_REQUEST['id1']))
{
    $id1=$_REQUEST['id1'];
    $q1="select * from `orders` where `id` = '$id1'";
    $e1=mysqli_query($conn,$q1);
    $result=mysqli_fetch_row($e1);

    //join with product table
    $q2="select * from `product` where `id` = $result[2]";
    $e2=mysqli_query($conn,$q2);
    $result1=mysqli_fetch_row($e2); 

    //join with user table
    $q3="select * from `user` where `id` = $result[1]";
    $e3=mysqli_query($conn,$q3);
    $result2=mysqli_fetch_row($e3); 
}
else{
    header("location:order.php");
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>G&P | Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="G&P.jpg" />
  </head>
  <body>
    <div class="container-scroller">
      
      <!-- partial:partials/_navbar.html -->
      <?php include("include/header.php");?>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <?php include("include/sidebar.php");?>
        <!-- partial -->
        <div class="main-panel">
          <div class="row">
            <div class="col-md-2">
              
            </div>
            <div class="col-md-8">
              <div class="card">
                <!-- <img class="card-img-top" src="holder.js/100x180/" alt=""> -->
                <div class="card-body">
                  <form action="" method="post" enctype="multipart/form-data">
                      <div class="form-group">
                        <label for="">Product Name</label>
                        <input type="text"
                            class="form-control" readonly name="prd" id="" value="<?php echo "$result1[1]"; ?>" aria-describedby="helpId" placeholder="" required>
                        <small id="helpId" class="form-text text-muted"></small>
                     </div>
                    <div class="form-group">
                      <label for="">User Name</label>
                      <input type="text"
                        class="form-control" readonly name="prd" id="" value="<?php echo "$result2[1]"; ?>" aria-describedby="helpId" placeholder="" required>
                      <small id="helpId" class="form-text text-muted"></small>
                    </div>
                    <div class="form-group">
                      <label for="">Quantity</label>
                      <input type="text"
                        class="form-control" readonly name="price" id="" value="<?php echo "$result[3]"; ?>" aria-describedby="helpId" placeholder="" required>
                      <small id="helpId" class="form-text text-muted"></small>
                    </div>
                    <div class="form-group">
                      <label for="">Payment Type</label>
                      <input type="text"
                        class="form-control" readonly name="price" id="" value="<?php echo "$result[5]"; ?>" aria-describedby="helpId" placeholder="" required>
                      <small id="helpId" class="form-text text-muted"></small>
                    </div>
                    <div class="form-group">
                      <label for="">User Address</label>
                      <textarea class="form-control" name="" id="" rows="3" readonly><?php echo "$result[4]"; ?></textarea>
                    </div>
                    <a class="btn btn-primary" href="order.php" role="button"><i class="mdi mdi-arrow-left-bold"></i></a>
                  </form>
                </div>
              </div>
              
            </div>
            <div class="col-md-2">
              
            </div>
          </div>
         
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <footer class="footer">
            <div class="container-fluid d-flex justify-content-between">
              <span class="text-muted d-block text-center text-sm-start d-sm-inline-block">Copyright © Green and Protein Grocer Evolution 2024</span>
              
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="assets/vendors/chart.js/Chart.min.js"></script>
    <script src="assets/js/jquery.cookie.js" type="text/javascript"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="assets/js/dashboard.js"></script>
    <script src="assets/js/todolist.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>