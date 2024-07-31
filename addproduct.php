<?php include("include/config.php");?>
<?php
if(isset($_POST['btn1']))
{
    extract($_POST);
    $image=$_FILES['img']['tmp_name'];
    $image_name=$_FILES['img']['name'];
    $target_files='images/product/';
    move_uploaded_file($image, $target_files.basename($image_name));
    $q2="INSERT INTO `product`(`product_name`, `price`,`image`,`delivery_charge`,`status`) VALUES ('$prd','$price','$image_name','$dc', 1)";
    $e2=mysqli_query($conn,$q2);
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
                        class="form-control" name="prd" id="" aria-describedby="helpId" placeholder="" required>
                      <small id="helpId" class="form-text text-muted"> * </small>
                    </div>
                    <div class="form-group">
                      <label for="">Product Price</label>
                      <input type="text"
                        class="form-control" name="price" id="" aria-describedby="helpId" placeholder="" required>
                      <small id="helpId" class="form-text text-muted"> * </small>
                    </div>
                    <div class="form-group">
                      <label for="">Delivery Charge</label>
                      <input type="text"
                        class="form-control" name="dc" id="" aria-describedby="helpId" placeholder="" required>
                      <small id="helpId" class="form-text text-muted"> * </small>
                    </div>
                    <div class="form-group">
                      <label for="">Add Image</label>
                      <input type="file"
                        class="form-control" name="img" id="img" onchange=fun1(event) aria-describedby="helpId" placeholder="">
                      <small id="helpId" class="form-text text-muted"> * </small>
                    </div>
                    <div id="prevw">
      
                    </div>
                    <button type="submit" name="btn1" class="btn btn-primary">Submit</button>
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

    <script>
        function fun1(event)
        {
            var image = URL.createObjectURL(event.target.files[0]);
            var newimg = document.createElement('img');
            document.getElementById('prevw').innerHTML='';
            newimg.src=image;
            newimg.width="300";
            document.getElementById('prevw').appendChild(newimg);
        }
    </script>
    <!-- End custom js for this page -->
  </body>
</html>