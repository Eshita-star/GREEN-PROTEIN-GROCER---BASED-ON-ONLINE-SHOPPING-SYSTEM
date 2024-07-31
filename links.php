<?php include("include/config.php");?>
<?php
if(isset($_POST['btn1']))
{
    $q2="select * from `footer`";
    $e2=mysqli_query($conn,$q2);
    extract($_POST);
    if(mysqli_num_rows($e2)==0)
    {
        $q1="INSERT INTO `footer`( `link1`, `link2`, `link3`,`link4`) VALUES ('$facebook','$twitter','$whatsapp','$instagram')";
        $e1=mysqli_query($conn,$q1);
    }
    else{
        $q3="UPDATE `footer` SET `link1`='$facebook',`link2`='$twitter',`link3`='$whatsapp',`link4`='$instagram' WHERE `id`= 1";
        $e3=mysqli_query($conn,$q3);
    }
   
    
}
$q3="select * from `footer`";
$e3=mysqli_query($conn,$q3);
$result1=mysqli_fetch_row($e3);
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
                                <form action="" method="post">
                                    <div class="form-group">
                                        <label for="">Facebook</label>
                                        <input type="text" class="form-control" name="facebook" id="" aria-describedby="helpId"
                                            placeholder="">
                                        <small id="helpId" class="form-text text-muted"> * </small>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Twitter</label>
                                        <input type="text" class="form-control" name="twitter" id="" aria-describedby="helpId"
                                            placeholder="">
                                        <small id="helpId" class="form-text text-muted"> * </small>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Whatsapp</label>
                                        <input type="text" class="form-control" name="whatsapp" id="" aria-describedby="helpId"
                                            placeholder="">
                                        <small id="helpId" class="form-text text-muted"> * </small>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Instagram</label>
                                        <input type="text" class="form-control" name="instagram" id="" aria-describedby="helpId"
                                            placeholder="">
                                        <small id="helpId" class="form-text text-muted"> * </small>
                                    </div>
                                    <button type="submit" class="btn btn-primary" name="btn1">Submit</button>
                                    <button type="button" class="btn btn-primary" name="btn2" data-toggle="modal" data-target="#modelId">Update</button>
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
                        <span class="text-muted d-block text-center text-sm-start d-sm-inline-block">Copyright © Green and Protein Grocer
                            Evolution 2024</span>

                    </div>
                </footer>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- Button trigger modal -->
    
    
    <!-- Modal -->
    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                <form action="" method="post">
                                    <div class="form-group">
                                        <label for="">Facebook</label>
                                        <input type="text" class="form-control" name="facebook" id="" value="<?php echo "$result1[1]";?>" aria-describedby="helpId"
                                            placeholder="">
                                        <small id="helpId" class="form-text text-muted"> * </small>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Twitter</label>
                                        <input type="text" class="form-control" name="twitter" id="" value="<?php echo "$result1[2]";?>" aria-describedby="helpId"
                                            placeholder="">
                                        <small id="helpId" class="form-text text-muted"> * </small>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Whatsapp</label>
                                        <input type="text" class="form-control" name="whatsapp" id="" value="<?php echo "$result1[3]";?>" aria-describedby="helpId"
                                            placeholder="">
                                        <small id="helpId" class="form-text text-muted"> * </small>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Instagram</label>
                                        <input type="text" class="form-control" name="instagram" id="" value="<?php echo "$result1[4]";?>" aria-describedby="helpId"
                                            placeholder="">
                                        <small id="helpId" class="form-text text-muted"> * </small>
                                    </div>
                                    <button type="submit" class="btn btn-primary" name="btn1">Submit</button>
                                </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
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