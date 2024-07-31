<?php include("include/config.php");?>
<?php
if(isset($_REQUEST['id1']))
{
    $id1=$_REQUEST['id1'];
    $q1="select * from `banner` where `id` = '$id1'";
    $e1=mysqli_query($conn,$q1);
    $result=mysqli_fetch_row($e1);
    if(mysqli_num_rows($e1))
    {
        if($result[2] == 1)
        {
            $q3="UPDATE `banner` SET `status`= 0 WHERE `id`= $id1";
            $e3=mysqli_query($conn,$q3);
        }
        else
        {
            $q3="UPDATE `banner` SET `status`= 1 WHERE `id`= $id1";
            $e3=mysqli_query($conn,$q3);
        }
        header("location:allbanner.php");
    }
    else
    {
        header("location:allbanner.php");
    }
}
else
{
    header("location:allbanner.php");
}
?>