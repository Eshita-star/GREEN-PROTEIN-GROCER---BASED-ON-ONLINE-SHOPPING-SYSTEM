<?php include("include/config.php");?>
<?php
if(isset($_POST['btn1']))
{
    extract($_POST);
    $image=$_FILES['img']['tmp_name'];
    $image_name=$_FILES['img']['name'];
    $target_files='images/user/';

    $q1="SELECT * FROM `user` WHERE `email` = '$username'";
    $e1=mysqli_query($conn,$q1);
    if(mysqli_num_rows($e1) == 0)
    {
        move_uploaded_file($image, $target_files.basename($image_name));
        $q2="INSERT INTO `user`(`name`, `email`, `image`, `password`) VALUES ('$name','$username','$image_name','$password')";
        $e2=mysqli_query($conn,$q2);
        header("location:login.php");
        $msg = "Successfully register";
        $color= "green";
    }
    else
    {
        $msg = "Account already exists";
        $color= "red";
    }
}
else
{
    $msg = "";
}
?>

<!DOCTYPE html>
<html lang="en">

  <head>
    <title>G&P | Registration Page</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="G&P.jpg" />
    <!--Stylesheet-->
    <style media="screen">
      *,
      *:before,
      *:after {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
      }

      body {
        background-color:rgb(30, 134, 80);
      }

      .background {
        width: 430px;
        height: 520px;
        position: absolute;
        transform: translate(-50%, -50%);
        left: 50%;
        top: 50%;
      }

      .background .shape {
        height: 200px;
        width: 200px;
        position: absolute;
        border-radius: 50%;
      }

      .shape:first-child {
        background: linear-gradient(#1845ad,
            #23a2f6);
        left: -80px;
        top: -80px;
      }

      .shape:last-child {
        background: linear-gradient(to right,
            #ff512f,
            #f09819);
        right: -30px;
        bottom: -80px;
      }

      form {
        height: 722px;
        width: 595px;
        background-color: rgba(255, 255, 255, 0.13);
        position: absolute;
        transform: translate(-50%, -50%);
        top: 50%;
        left: 50%;
        border-radius: 10px;
        backdrop-filter: blur(10px);
        border: 2px solid rgba(255, 255, 255, 0.1);
        box-shadow: 0 0 40px rgba(8, 7, 16, 0.6);
        padding: 50px 35px;
      }

      form * {
        font-family: 'Poppins', sans-serif;
        color: #ffffff;
        letter-spacing: 0.5px;
        outline: none;
        border: none;
      }

      form h3 {
        font-size: 32px;
        font-weight: 500;
        line-height: 42px;
        text-align: center;
      }

      label {
        display: block;
        margin-top: 30px;
        font-size: 16px;
        font-weight: 500;
      }

      input {
        display: block;
        height: 50px;
        width: 100%;
        background-color: rgba(255, 255, 255, 0.07);
        border-radius: 3px;
        padding: 0 10px;
        margin-top: 8px;
        font-size: 14px;
        font-weight: 300;
      }

      ::placeholder {
        color: #e5e5e5;
      }

      button {
        margin-top: 50px;
        width: 100%;
        background-color: #ffffff;
        color: #080710;
        padding: 15px 0;
        font-size: 18px;
        font-weight: 600;
        border-radius: 5px;
        cursor: pointer;
      }

      .social {
        margin-top: 30px;
        display: flex;
      }

      .social div {
        background: red;
        width: 150px;
        border-radius: 3px;
        padding: 5px 10px 10px 5px;
        background-color: rgba(255, 255, 255, 0.27);
        color: #eaf0fb;
        text-align: center;
      }

      .social div:hover {
        background-color: rgba(255, 255, 255, 0.47);
      }

      .social .fb {
        margin-left: 25px;
      }

      .social i {
        margin-right: 4px;
      }
    </style>
  </head>

  <body>
    <div class="background">
      <div class="shape"></div>
      <div class="shape"></div>
    </div>
    <form method="post" enctype="multipart/form-data">
      <h3>Registration Here</h3>
      <label for="username">Name</label>
      <input type="text" placeholder="Enter your name" id="name" name="name" required>

      <label for="username">Username</label>
      <input type="text" placeholder="Email or Phone" id="username" name="username" required>

      <label for="username">Upload Image</label>
      <input type="file"  id="username" name="img">

      <label for="password">Password</label>
      <input type="password" placeholder="Password" id="password" name="password" required>

      <button type="submit" name="btn1">Registration</button>
      <div class="" style="font-size:15px; margin-top:5px;"><spam>If you have an account</spam><a href="login.php" style="margin-left:3px; color: blue;">Log-in</a></div>
    </form>
  </body>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>
