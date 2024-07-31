<?php include("include/config.php");?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>G&P | Home</title>
    <link rel="shortcut icon" href="G&P.jpg" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700&display=swap');

        :root {
            --main-color: #d3ad7f;
            --black: #13131a;
            --bg: #1c782a;
            --border: .1rem solid rgba(255, 255, 255, .3);
        }

        * {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            outline: none;
            border: none;
            text-decoration: none;
            text-transform: capitalize;
            transition: .2s linear;
        }

        html {
            font-size: 92.5%;
            overflow-x: hidden;
            scroll-padding-top: 9rem;
            scroll-behavior: smooth;
        }

        html::-webkit-scrollbar {
            width: .8rem;
        }

        html::-webkit-scrollbar-track {
            background: transparent;
        }

        html::-webkit-scrollbar-thumb {
            background: #fff;
            border-radius: 5rem;
        }

        body {
            background: rgb(197, 218, 197);
            overflow-x: hidden;
            overflow-y: hidden;
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

        /* .header #logo h1 {
            color: white;
            font-size: 15px;
            margin-left: 2px;
        } */

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

        .login-form {
            position: absolute;
            top: 100%;
            right: -100%;
            background: white;
            border-radius: .5rem;
            box-shadow: #d3ad7f;
            width: 30rem;
            padding: 2rem;
        }

        .login-form.active {
            right: 2rem;
            transition: .4s linear;
        }

        h4 {
            color: black;
            text-transform: uppercase;
            font-size: 2.0rem;
            text-align: center;
            margin-bottom: 3rem;
        }

        .box {
            margin: 2rem 0;
            font-size: 1.7rem;
            color: black;
            text-transform: none;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            width: 100%;
        }

        .remember {
            display: flex;
            align-items: center;
            gap: .5rem;
            margin: 1rem 0;
        }

        label {
            font-size: 1.2rem;
            color: rgb(127, 124, 124);
            cursor: pointer;
        }

        p {
            color: lightslategray;
            padding-top: 0.7rem;
            font-size: 1.2rem;
        }

        a {
            color: rgba(88, 194, 13, 0.768);
        }

        a:hover {
            text-decoration: underline;
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

        @media (max-width:450px) {
            html {
                font-size: 50%;
            }
        }

        .cart-item {
            font-family: "Times New Roman", Times, serif;
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

        .fa-github {
            margin: 1px 9px;
            padding: 12px 13px;
            border: 2px solid white;
            background-color: black;
            color: white;
        }

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
    </style>
</head>

<body style="overflow-y: hidden;">
    <header class="header">
        <div id="logo">
            <img src="G&P.jpg" alt="My logo">
            <spam>Welcome to Green and Protein Grocer</spam>

        </div>
        <nav class="navbar">
            <a href="#">Home</a>
            <a href="#about-us">About Us</a>
            <!-- <a href="#">Shop</a> -->
            <a href="productdetails.php">Product Details</a>
            <a href="gallery.php">Gallery</a>
            <a href="#">Review</a>
            <a href="#about-us1">Contact Us</a>
        </nav>
        <div class="icons">
            <!-- <div class="fas fa-search" id="search-btn"></div> -->
            <!--<div class="fas fa-shopping-cart" id="cart-btn"></div>-->
           <a href="login.php"><div class="fas fa-user" id="login-btn"></div></a>
            <div class="fas fa-bars" id="menu-btn"></div>
        </div>
        <!-- <div class="search-form">
            <input type="search" id="search-box" placeholder="search here">
            <label for="search-box" class="fas fa-search"></label>
        </div> -->