<?php include("include/config.php");?>
<?php
if(isset($_REQUEST['id1']))
{
    $id1=$_REQUEST['id1'];
    $q1="DELETE FROM `product` WHERE `id` = '$id1'";
    $e1=mysqli_query($conn,$q1);
    header("location:allproduct.php");
}
else
{
    header("location:allproduct.php");
}
?>