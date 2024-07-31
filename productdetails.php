<?php include("include/config.php");?>
<?php
session_start();
ob_start();
?>
<?php
if(!isset($_SESSION['usr']))
{
    header("location:login.php");
}
else{

    $nm = $_SESSION['usr'];
    $q1="SELECT * FROM `user` WHERE `email` = '$nm'";
    $e1=mysqli_query($conn,$q1);
    $res = mysqli_fetch_row($e1);
    $unm=ucfirst($res[1]);
    $uid= $res[0];
    $qq1= "SELECT * FROM `cart` WHERE `uid` = '$uid'";
    $ee1= mysqli_query($conn, $qq1);
}
?>
<?php
  if(isset($_POST['btn2']))
  {
    extract($_POST);
    $q3="SELECT * FROM `cart` WHERE `uid` = '$uid' AND `pid` = '$pid'";
    $e3=mysqli_query($conn,$q3);
    $rs=mysqli_fetch_row($e3);
    if(mysqli_num_rows($e3) == 0)
    {
        $q4 = "INSERT INTO `cart`(`uid`, `pid`, `quantity`) VALUES ('$uid','$pid','$qn')";
        $e4 = mysqli_query($conn,$q4);
    }
    else
    {
        $qun = $rs[3] + $qn;
        $q4 = "UPDATE `cart` SET `quantity`='$qun'";
        $e4 = mysqli_query($conn,$q4);
    }
    header("location:productdetails.php");
  }
    $q2="select * from `product` where `status` = 1";
    $e2=mysqli_query($conn,$q2);
?>
<!doctype html>
<html lang="en">

<head>
    <title>G&P | ProductDetails</title>
    <link rel="shortcut icon" href="G&P.jpg" type="image/x-icon">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    
    <style>
  @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700&display=swap');
        html,
        body {
            margin: 0;
            font-size: 100%;
            font-family: 'Lato', sans-serif;
            background: #fff;
        }

        body a {
            text-decoration: none;
            transition: 0.5s all;
            -webkit-transition: 0.5s all;
            -moz-transition: 0.5s all;
            -o-transition: 0.5s all;
            -ms-transition: 0.5s all;
        }

        .header {

            background-image: linear-gradient(rgb(1 53 79 / 52%), rgb(186, 225, 238));

            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: .2rem 1%;
            border-bottom: var(--border);
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
        }

        .header #logo img {
            height: 4rem;
            border-radius: 30px;
        }

        .header .navbar a {
            margin: 0 1rem;
            color: #fff;
        }

        .header .navbar a:hover {
            color: rgb(131, 241, 63);
            border-bottom: .1rem solid green;
            padding-bottom: .5rem;
        }

        .header .icons div {
            color: #f6f5f5;
            cursor: pointer;
            font-size: 1.7rem;
            margin-left: 1.7rem;
            background-color: rgb(5, 167, 167);
            text-align: center;
            height: 2.1rem;
            width: 2.1rem;
            border-radius: .3rem;

        }

        .header .icons div:hover {
            color: rgb(234, 234, 221);
            background-color: rgb(10, 127, 21);
        }

        #menu-btn {
            display: none;
        }

        .header .search-form {
            position: absolute;
            top: 115%;
            right: 7%;
            background: #fff;
            width: 40rem;
            height: 3rem;
            display: flex;
            align-items: center;
            transform: scaleY(0);
            transform-origin: top;
        }

        
        .header .search-form.active {
            transform: scaleY(1);
        }

        .header .search-form input {
            height: 100%;
            width: 100%;
            font-size: 1.6rem;
            color: black;
            padding: 1rem;
            text-transform: none;
        }

        .header .search-form label {
            cursor: pointer;
            font-size: 1.7rem;
            color: black;
        }

        .header .search-form label:hover {
            color: rgb(159, 184, 218);
        }
        .header .cart-items-container {
            position: absolute;
            top: 100%;
            right: -100%;
            height: calc(100vh - 4.5rem);
            width: 30rem;
            background: #fff;
            padding: 0 1.5rem;
        }

        .header .cart-items-container.active {
            right: 0;
        }

        .header .cart-items-container .cart-item {
            position: relative;
            margin: 1rem 0;
            display: flex;
            align-items: center;
            gap: 1.5rem;
        }

        .header .cart-items-container .cart-item .fa-times {
            position: absolute;
            top: 1rem;
            right: 1rem;
            font-size: 2rem;
            cursor: pointer;
            color: black;
        }

        .header .cart-items-container .cart-item .fa-times:hover {
            color: var(--main-color);
        }

        .header .cart-items-container .cart-item img {
            height: 7rem;
            width: 30%;

        }

        .header .cart-items-container .cart-item.content h3 {
            font-size: 2rem;
            color: black;
            padding-bottom: .5rem;

        }

        .header .cart-items-container .cart-item.content price {
            font-size: 1.5rem;
            color: rgb(195, 97, 18);
        }

        .header .cart-items-container .btn {
            width: 100%;
            text-align: center;
        }

        .heading{
            text-align: center;
            margin-bottom: 30px;
        }
        .heading span{
            color:orangered;
        }
        .box-container {
          
            margin-bottom: 30px; 
            padding:0.1rem 0.2rem;
            
        }
         .product .box-container{
            display:flex;
            flex-wrap:wrap;
            gap:1.5rem;
         }
         .product .box-container .box{
            flex:1 1 30rem;
            text-align: center;
            padding:2rem;
            border:.1rem solid rgba(0,0,0,.3);
            border-radius:.5rem;
            overflow:hidden;
            position:relative;
         }
         .product .box-container .box img{
            height: 16rem;
         }

         .product .box-container .box .discount
         {
            position: absolute;
            top:0rem;
            left:0.6rem;  
            background:rgba(0,255,0,.1);
            color:var(--green);
            padding:.2rem .5rem;
            font-size: 1rem;
         }
         .product .box-container .box .icons{
            position:absolute;
            top:0.1rem;
            right:-4rem;
         }
         .product .box-container .box:hover .icons{
         right:1rem;
        }
         .product .box-container .box .icons a{
            display:block;
            height:3.5rem;
            width:3.5rem;
            line-height:3.5rem;
            font-size:1.7rem;
            text-decoration: none;
            color:var(--black);
            background-color: rgba(0,0,0,.05);
            border-radius:50%;
            margin-top:.7rem;
         }
         .product .box-container .box .icons a:hover{
            background: var(--green);
            color:white;
         }
         .product .box-container .box .h3{
            color:var(--black);
            font-size: 2.5rem;
         }   
         .product .box-container .box .stars i{
         padding:1rem .1rem;
         font-size:1.7rem;
         color:gold;
         }
         .product .box-container .box .price{
            font-size: 1.4rem;
            color:#333;
            padding:.5rem 0;
         }
         .product .box-container .box .price span{
            font-size: 1rem;
            color:#999;
            text-decoration:line-through;
         }
         .product .box-container .box .quantity{
            display:flex;
            align-items: center;
            justify-content: center;
            padding-top: 0.3rem;
            padding-bottom: .5rem;

         }
         .product .box-container .box .quantity span{
            padding:0 .7rem;
            font-size: 1.5rem;
         }
         .product .box-container .box .quantity input{
            border:0.1rem solid rgba(0,0,0,.3);
            font-size:1.4rem;
            font-weight:bolder;
            color:var(--black);
            padding:.5rem;
            background:rgba(0,0,0,.05);
         }
         .product .box-container .box .btn{
            display:block;
            
         }
         .product .box-container .box .btn:hover{
            background: rgb(4, 41, 72);
            color:white;
         }
         @media (max-width:991px) {
            html {
                font-size: 55%;
            }

            .header {
                padding: 1.5rem 2rem;
            }
        }

        @media (max-width:768px) {
            #menu-btn {
                display: inline-block;
            }

            .header .navbar {
                position: absolute;
                top: 100%;
                right: -100%;
                width: 30rem;
                box-shadow: var(--box-shadow);
                border-radius: .5rem;
                background: #fff;

            }

            .header .navbar.active {
                right: 0;
            }

            .header .navbar a {
                color: rgb(249, 245, 245);
                display: block;
                font-size: 2rem;
                margin: 1rem 6.5rem;
                width: 50rem;
                text-align: center;
                background-color: darkcyan;

            }

            .header .search-form {
                width: 90%;
                right: 2rem;
            }
        }
         
        .footer {
            height: 100vh;
            width: 100%;
            background-color: black;
            justify-content: center;
        }

        .fa {
            margin-top: 10px;
            padding: 20px;
            font-size: 30px;
            width: 50px;
            text-align: center;
            text-decoration: none;
        }

        .fa:hover {
            opacity: 0.7;
        }

        .fa-facebook {
            margin: 1px 9px;
            padding: 12px 13px;
            border: 2px solid white;
            background-color: black;
            color: white;
        }

        .fa-twitter {
            margin: 1px 9px;
            padding: 12px 13px;
            border: 2px solid white;
            background-color: black;
            color: white;
        }

        /* .fa-github {
            margin: 1px 9px;
            padding: 12px 13px;
            border: 2px solid white;
            background-color: black;
            color: white;
        } */

        .fa-whatsapp {
            margin: 1px 9px;
            padding: 12px 13px;
            border: 2px solid white;
            background-color: black;
            color: white;
        }

        .fa-instagram {
            margin: 1px 9px;
            padding: 12px 13px;
            border: 2px solid white;
            background-color: black;
            color: white;
        }

        .main h3 {
            margin-left: 100px;
            color: white;
        }

        .main p {
            margin-left: 100px;
            color: white;
        }

        hr.new1 {
            border-top: 3px solid #fff;
            margin-left: 10px;
            width: 35%;
        }

        hr.new2 {
            border-top: 3px solid #fff;
            margin-left: 10px;
            width: 35%;
        }

        hr.new3 {
            border-top: 3px solid #fff;
            margin-left: 10px;
            width: 35%;
        }

        .btn {
            margin-top: 3px;
            display: inline-block;
            padding: 1rem 3rem;
            font-size: 1.5rem;
            color: #fff;
            background: rgb(132, 174, 52);
            cursor: pointer;
            width: 100%;
        }

        .btn:hover {
            letter-spacing: .2rem;
        }
        .product {
    margin-top: 5rem; 
}
    </style>
</head>

<body>
        <header class="header">
            <div id="logo">
                <img src="G&P.jpg" alt="My logo">
                <spam>Welcome <?php echo "$unm"; ?></spam>
            </div>
            <nav class="navbar">
                <a href="login.php">Home</a>
                <a href="#about-us">About Us</a>
                <!-- <a href="#">Shop</a> -->
                <a href="productdetails.php">Product Details</a>
                <a href="gallery.php">Gallery</a>
                <a href="#">Review</a>
                <a href="#about-us1">Contact Us</a>
            </nav>
            <div class="icons">
                <div class="fas fa-search" id="search-btn"></div>
                <div class="fas fa-shopping-cart" id="cart-btn"></div>
                <a href="logout.php"><div class="fas fa-user" id="login-btn"></div></a>
                <div class="fas fa-bars" id="menu-btn"></div>
            </div>
            
            <div class="search-form">
                <input type="search" id="search-box" placeholder="search here">
                <label for="search-box" class="fas fa-search"></label>
            </div>
            <div class="cart-items-container">
                <?php
                if(mysqli_num_rows($ee1)== 0)
                {
                    echo "<h1>No items in your cartlist </h1>";
                }
                else{
                    while($resltt=mysqli_fetch_row($ee1))
                    {
                        $qq2="SELECT * FROM `product` WHERE `id` = '$resltt[2]'";
                        $ee2= mysqli_query($conn, $qq2);
                        $resltt1=mysqli_fetch_row($ee2);
                ?>
                    <a href="placeorder.php?id1=<?php echo "$resltt[2]";?>" style="text-decoration:none;"><div class="cart-item">
                        <span class="fas fa-times"></span>
                        <img src="images/product/<?php echo "$resltt1[3]"?>" alt="">
                        <div class="content">
                            <h3><?php echo "$resltt1[1]"?></h3>
                            <div class="price">₹<?php echo "$resltt1[2]"?>/-</div>
                        </div>
                    </div></a>
                <?php
                    }
                }
                ?>
                <a href="productdetails.php" class="btn">More Product</a>
            </div>
        </header>
       <section class="product" id="product">
        <h1 class="heading">LATEST <span>PRODUCTS</span></h1>
        <div class="box-container">
        <?php
        if(mysqli_num_rows($e2) == 0)
        {
            echo "<h1> No Product available </h1>";
        }else
        {
            while($result= mysqli_fetch_row($e2))
            {
        ?>    
        <div class ="box">
            <span class="discount">-27%</span>
            <div class="icons">
                <a href="#" class="fas fa-heart"></a>
                <a href="#" class="fas fa-share"></a>
                <a href="#" class="fas fa-eye"></a>
            </div>
            <img src="images/product/<?php echo "$result[3]"; ?>" alt="">
            <h3><?php echo "$result[1]"?></h3>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
            <div class="price">₹<?php echo "$result[2]"; ?>/- <span> ₹161.23/- </span></div>
            <form method="post">
                <div class="quantity">
                    <span>quantity : </span>
                    <input type="hidden" value="<?php echo "$result[0]"; ?>" name='pid'value="1">
                    <input type="hidden" value="<?php echo "$res[0]"; ?>" name='uid'value="1">
                    <input type="number" min="1" max="1000"  name='qn'value="1">
                <span> /kg</span>
                </div>
                <button class="btn" name="btn2" type="submit">Add To Cart</button>
            </form> 
        </div>
        <?php
        }
      }?>
    </div>
       </section>

       <?php include("include/footer.php"); ?>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
        <script>
           const searchInput = document.getElementById('search-box'); // Use the correct ID "search-box"
    const productBoxes = document.querySelectorAll('.box');

    searchInput.addEventListener('input', (e) => {
        const searchTerm = e.target.value.toLowerCase();

        productBoxes.forEach((box) => {
            const productName = box.querySelector('h3').textContent.toLowerCase();
            if (productName.includes(searchTerm)) {
                box.style.display = 'block';
            } else {
                box.style.display = 'none';
            }
        });
    });
            let searchForm = document.querySelector('.search-form');
            document.querySelector('#search-btn').onclick = () => {
                searchForm.classList.toggle('active');
                navbar.classList.remove('active');
    
            }
            let cartItem = document.querySelector('.cart-items-container');
            document.querySelector('#cart-btn').onclick = () => {
                cartItem.classList.toggle('active');
               /// loginForm.classList.remove('active');
                navbar.classList.remove('active');
                searchForm.classList.remove('active');
            }
            let navbar = document.querySelector('.navbar');
            document.querySelector('#menu-btn').onclick = () => {
                navbar.classList.toggle('active');
                searchForm.classList.remove('active');
            } 
    
            window.onscroll = () => {
                searchForm.classList.remove('active');
                navbar.classList.remove('active');
            }
    
        </script>
          <script>
            document.addEventListener("DOMContentLoaded", function () {
                // Add smooth scrolling to the "About Us" link
                const aboutUsLink = document.querySelector("a[href='#about-us']");
    
                if (aboutUsLink) {
                    aboutUsLink.addEventListener("click", function (event) {
                        event.preventDefault(); // Prevent default link behavior
    
                        const targetSection = document.querySelector("#about-us");
    
                        if (targetSection) {
                            // Scroll to the target section smoothly
                            targetSection.scrollIntoView({ behavior: "smooth" });
                        }
                    });
                }
            });
        </script>
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                // Add smooth scrolling to the "About Us" link
                const aboutUsLink = document.querySelector("a[href='#about-us1']");
    
                if (aboutUsLink) {
                    aboutUsLink.addEventListener("click", function (event) {
                        event.preventDefault(); // Prevent default link behavior
    
                        const targetSection = document.querySelector("#about-us1");
    
                        if (targetSection) {
                            // Scroll to the target section smoothly
                            targetSection.scrollIntoView({ behavior: "smooth" });
                        }
                    });
                }
            });
        </script>
        </body>
        </html>