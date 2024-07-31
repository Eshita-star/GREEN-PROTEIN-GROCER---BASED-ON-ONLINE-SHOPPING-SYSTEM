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
    $e1="SELECT * FROM `user` WHERE `email`= '$nm'";
    $q1=mysqli_query($conn,$e1);
    $res = mysqli_fetch_row($q1);
    $unm=ucfirst($res[1]);
}
$qg="SELECT * FROM `gallery`";
$eg=mysqli_query($conn,$qg);
?>
<!doctype html>
<html lang="en">

<head>
    <title>G&P | Gallery</title>
    <link rel="shortcut icon" href="G&P.jpg" type="image/x-icon">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        /*--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
--*/
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

        .gallery-grid1 {
            position: relative;
            overflow: hidden;
            cursor: pointer;
        }

        .gallery-grid1 .p-mask .p-desc {
            color: #a3a3a3;
            position: relative;
            display: block;
            margin-bottom: 10px;
            padding-bottom: 10px;
            font-size: 1em;
        }

        .gallery-grid1:hover .p-mask,
        .row .product:hover .p-mask {
            opacity: 1;
            visibility: visible;
            -webkit-transform: translate3d(0px, 0px, 0px);
            -moz-transform: translate3d(0px, 0px, 0px);
            -ms-transform: translate3d(0px, 0px, 0px);
            -o-transform: translate3d(0px, 0px, 0px);
            transform: translate3d(0px, 0px, 0px);
        }

        .p-mask h4 {
            color: #fff;
            font-size: 1.2em;
            text-decoration: none;
            line-height: 1.8em;
            text-transform: uppercase;
            font-weight: bold;
        }

        .p-mask p {
            margin: 0;
            color: #f5f5f5;
            line-height: 1.8em;
            font-size: 16px;
        }

        .p-mask span {
            color: #fd6239;
        }

        .pictures_eyes_in {
            position: relative;
            text-align: center;
        }

        .grid figure {
            position: relative;
            float: left;
            overflow: hidden;
            height: auto;
            background: #000;
            text-align: center;
        }

        .grid figure img {
            position: relative;
            display: block;
            max-width: 100%;
            opacity: 0.8;
        }

        .grid figure figcaption {
            padding: 1em;
            color: #fff;
            font-size: 1.25em;
            -webkit-backface-visibility: hidden;
            backface-visibility: hidden;
        }

        .grid figure figcaption::before,
        .grid figure figcaption::after {
            pointer-errors: none;
        }

        .grid figure figcaption,
        .grid figure figcaption>a {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }

        /*-gallery-inner-*/
        /*-- gallery --*/
        .gallery-heading {
            text-align: center;
        }

        .grid {
            position: relative;
            clear: both;
            margin: 0 auto;
            max-width: 1000px;
            list-style: none;
            text-align: center;
        }

        /* Common style */
        .grid figure {
            position: relative;
            overflow: hidden;
            margin: 10px 0;
            height: auto;
            text-align: center;
        }

        .grid figure img {
            position: relative;
            display: block;
            width: 100%;
            opacity: 0.8;
        }

        .grid figure figcaption {
            padding: 2em;
            color: #fff;
            text-transform: uppercase;
            font-size: 1em;
            -webkit-backface-visibility: hidden;
            backface-visibility: hidden;
        }

        .grid figure figcaption,
        .grid figure figcaption>a {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }

        .grid figure figcaption>a {
            z-index: 1000;
            text-indent: 200%;
            white-space: nowrap;
            font-size: 0;
            opacity: 0;
        }

        .grid figure h3 {
            font-weight: 300;
            margin: 0;
            text-align: center;
            font-size: 1.05em;
            color: #fff;
            padding: 5px;
            background: rgba(0, 0, 0, 0.44);
        }

        .grid figure h2 span {
            font-weight: 800;
        }

        .grid figure h2,
        .grid figure p {
            margin: 0;
        }

        .grid figure p {
            letter-spacing: 1px;
            font-size: 68.5%;
            font-weight: 600;
        }

        /*-----------------*/
        /***** Apollo *****/
        /*-----------------*/
        figure.effect-apollo img {
            opacity: 0.95;
            -webkit-transition: opacity 0.35s, -webkit-transform 0.35s;
            transition: opacity 0.35s, transform 0.35s;
            -webkit-transform: scale3d(1.05, 1.05, 1);
            transform: scale3d(1.05, 1.05, 1);
            -moz-transform: scale3d(1.05, 1.05, 1);
            -o-transform: scale3d(1.05, 1.05, 1);
            -ms-transform: scale3d(1.05, 1.05, 1)
        }

        figure.effect-apollo figcaption::before {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.5);
            content: '';
            -webkit-transition: -webkit-transform 0.6s;
            transition: transform 0.6s;
            -webkit-transform: scale3d(1.9, 1.4, 1) rotate3d(0, 0, 1, 45deg) translate3d(0, -100%, 0);
            transform: scale3d(1.9, 1.4, 1) rotate3d(0, 0, 1, 45deg) translate3d(0, -100%, 0);
            -o-transform: scale3d(1.9, 1.4, 1) rotate3d(0, 0, 1, 45deg) translate3d(0, -100%, 0);
            -mz-transform: scale3d(1.9, 1.4, 1) rotate3d(0, 0, 1, 45deg) translate3d(0, -100%, 0);
            -ms-transform: scale3d(1.9, 1.4, 1) rotate3d(0, 0, 1, 45deg) translate3d(0, -100%, 0);
        }

        figure.effect-apollo p {
            position: absolute;
            right: 0;
            bottom: 0;
            margin: 3em;
            padding: 0 1em;
            max-width: 168px;
            border-right: 4px solid #fd6239;
            text-align: right;
            opacity: 0;
            -webkit-transition: opacity 0.35s;
            transition: opacity 0.35s;
            color: #26d797;
        }

        figure.effect-apollo h2 {
            text-align: left;
        }

        figure.effect-apollo:hover img {
            opacity: 0.6;
            -webkit-transform: scale3d(1, 1, 1);
            transform: scale3d(1, 1, 1);
            -moz-transform: scale3d(1, 1, 1);
            -o-transform: scale3d(1, 1, 1);
            -ms-transform: scale3d(1, 1, 1);
        }

        figure.effect-apollo:hover figcaption::before {
            -webkit-transform: scale3d(1.9, 1.4, 1) rotate3d(0, 0, 1, 45deg) translate3d(0, 100%, 0);
            transform: scale3d(1.9, 1.4, 1) rotate3d(0, 0, 1, 45deg) translate3d(0, 100%, 0);
            -o-transform: scale3d(1.9, 1.4, 1) rotate3d(0, 0, 1, 45deg) translate3d(0, 100%, 0);
            -moz-transform: scale3d(1.9, 1.4, 1) rotate3d(0, 0, 1, 45deg) translate3d(0, 100%, 0);
            -ms-transform: scale3d(1.9, 1.4, 1) rotate3d(0, 0, 1, 45deg) translate3d(0, 100%, 0);
        }

        figure.effect-apollo:hover p {
            opacity: 1;
            -webkit-transition-delay: 0.1s;
            transition-delay: 0.1s;
        }

        .tittle-w3 {
            font-size: 2em;
            color: #fd6239;
            margin: 0em 0 1.5em;
            text-align: center;
            text-transform: uppercase;
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
    </style>
</head>

<body>
    <div class="gallery">
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
                <a href="logout.php"><div class="fas fa-user" id="login-btn"></div></a>
            </div>
        </header>
        <div class="container" style="margin-top: 5%;">
            <h2 class="tittle-w3">Gallery</h2>
            <div class="gallery-grids">
                <div class="row">
                    <?php
                    if(mysqli_num_rows($eg) == 0)
                    {?>
                        <div class="col-md-12 gallery-grid wow fadeInUp animated" data-wow-delay=".5s">
                            <h2 style="text-align: center;">No Image</h2>
                        </div>
                    <?php
                    }else{
                        while($rsglt= mysqli_fetch_row($eg))
                        {
                        ?>
                            <div class="col-md-4 gallery-grid wow fadeInUp animated" data-wow-delay=".5s">
                                <div class="grid">
                                    <figure class="effect-apollo">
                                        <a class="example-image-link" href="images/g2.jpg" data-lightbox="example-set"
                                            data-title="">
                                            <img src="images/gallery/<?php echo "$rsglt[1]" ?>"
                                                alt="" />
                                            <figcaption>
                                                <!-- <h3>Buttery Crescent Rolls</h3> -->
                                                <!-- <p>Delish Food <br>Best Recipes</p> -->
                                            </figcaption>
                                        </a>
                                    </figure>
                                </div>
                            </div>
                        <?php
                       }
                        }
                    ?> 
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
    <?php include("include/footer.php"); 
    ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
        <script src="scroll.js"></script>
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