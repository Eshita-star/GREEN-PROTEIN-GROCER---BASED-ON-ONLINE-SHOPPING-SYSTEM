<?php include("include/config.php");?>
<?php 
$q1="select * from `footer`";
$e1=mysqli_query($conn,$q1);
$result=mysqli_fetch_row($e1);  //using fetch data from database
?>


<div class="footer" id="about-us">
        <div>
        </div>
        <div class="main" id="about-us1">
            <div class="row">
                <div class="col-md-10">
                    <h3 class="new ml-5">Social Media</h3>
                    <hr class="new1">
                    <!-- <p>follw our site</p> -->
                    <link rel="stylesheet"
                        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
                    <a href="<?php echo "$result[1]"; ?>" class="fa fa-facebook"></a>
                    <a href="<?php echo "$result[2]"; ?>" class="fa fa-twitter"></a>
                    <!-- <a href="#" class="fa fa-github"></a> -->
                    <a href="<?php echo "$result[3]"; ?>" class="fa fa-whatsapp"></a>
                    <a href="<?php echo "$result[4]"; ?>" class="fa fa-instagram"></a><br><br>
                    <h3 style="margin-left: 8%;">About Us</h3>
                    <hr class="new2">
                    <p style="margin-left: 1px; justify-content: center;"><?php echo "$result[5]"; ?>
                    </p><br><br>

                    <h3 class="new" style="margin-left: 8%;">Contact Us</h3>
                    <hr class="new3">
                    <i class="fa fa-phone" aria-hidden="true" style="color:white;"></i> <span style="color:white;">+91
                    <?php echo "$result[6]"; ?></span>
                    <i class="fa fa-envelope" aria-hidden="true" style="color:white;"></i> <span
                        style="color:white;"><?php echo "$result[7]"; ?></span>
                    <i class="fa fa-map-marker" aria-hidden="true" style="color:white;"></i> <span
                        style="color:white;"><?php echo "$result[8]"; ?></span>
                </div>
                
            </div>
           
    </div>