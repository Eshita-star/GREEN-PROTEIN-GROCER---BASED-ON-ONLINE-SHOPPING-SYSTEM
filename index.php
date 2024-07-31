<?php include('include/home_header.php') ?>
    
    <?php
        $qi2= "SELECT * FROM `banner` WHERE `status`= 1";
        $ei2= mysqli_query($conn, $qi2);
        $rsb=mysqli_fetch_row($ei2);
    ?>
        
        <!-- <form action="" class="login-form">
            <h4>login form</h4>
            <div>
                <input type="email" placeholder="enter your email" class="box">
            </div>
            <div>
                <input type="password" placeholder="enter your password" class="box">
            </div>
            <div class="remember">
                <input type="checkbox" name="" id="remember-me">
                <label for="remember-me">remember-me</label>
            </div>
            <input type="submit" value="login now" class="btn">
            <p>forget password? <a href="#">click here</a></p>
            <p>don't have an account? <a href="#">create one</a></p>
        </form> -->
    <?php
        $q1="select * from `product`";
        $e1=mysqli_query($conn,$q1);
    ?>        
    </header>
    <div class="cont" style="overflow-x: hidden;">
        <div id="carouselId" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselId" data-slide-to="0" class="active"></li>
                <li data-target="#carouselId" data-slide-to="1"></li>
                <li data-target="#carouselId" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                    <img src="images/banner/<?php echo "$rsb[1]"; ?>" class="<?php if($rsb[2]== 1){ echo "d-block";} else { echo "d-none";}?>" style="height:500px; width: 100%;">
                    <div class="carousel-caption d-none d-md-block">
                        <h3 style="font-size: 50px;">Green And Protein Grocer</h3>
                        <p style="color: blue; font-weight: 500;">Healthy, protein-rich groceries just a click away, delivered fresh to your home.</p>
                    </div>
                </div>
                <?php
                while($rsb = mysqli_fetch_row($ei2))
                {
                ?>
                    <div class="carousel-item">
                        <img src="images/banner/<?php echo strtolower($rsb[1]); ?>" class="<?php if($rsb[2]== 1){ echo "d-block";} else { echo "d-none";}?>" style="height:500px; width: 100%;">
                        <div class="carousel-caption d-none d-md-block">
                            <h3 style="font-size: 50px;">Green And Protein Grocer</h3>
                            <p style="color: blue; font-weight: 500;">Healthy, protein-rich groceries just a click away, delivered fresh to your home.</p>
                        </div>
                    </div>
                <?php
                }
                ?>
                <!-- <div class="carousel-item">
                    <img src="https://images.pexels.com/photos/158179/lake-constance-sheep-pasture-sheep-blue-158179.jpeg"
                        alt="First slide" style="height:500px; width: 100%;">
                    <div class="carousel-caption d-none d-md-block">
                        <h3>Title</h3>
                        <p>Description</p>
                    </div>
                </div> -->
            </div>
            <a class="carousel-control-prev" href="#carouselId" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselId" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-1">
            </div> 
            <div class="col-md-10 mt-2"> 
                <div class="row p-2">
                <?php
                if(mysqli_num_rows($e1) == 0)
                {
                    echo "<h1> No Product available </h1>";
                }else
                {
                    while($result= mysqli_fetch_row($e1))
                {
                ?>    
                    <div class="col-md-4">
                    <a href="productdetails.php" style="text-decoration:none;">   <div class="card" style="min-height: 200px;">
                            <img src="images/product/<?php echo "$result[3]"?>" alt="">
                            <div class="card-body">
                            </div>
                        </div><a>
                    </div>
                <?php
                }
                }?> 
                </div>
            </div>
   
            <div class="col-md-1">
            </div>
        </div>

    </div>
    <?php include("include/home_footer.php"); 
    ?>
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
        // let searchForm = document.querySelector('.search-form');
        // document.querySelector('#search-btn').onclick = () => {
        //     searchForm.classList.toggle('active');
        //     cartItem.classList.remove('active');
        //     loginForm.classList.remove('active');
        //     navbar.classList.remove('active');

        // }
        
        let loginForm = document.querySelector('.login-form');
        document.querySelector('#login-btn').onclick = () => {
            loginForm.classList.toggle('active');
            navbar.classList.remove('active');
            searchForm.classList.remove('active');
            cartItem.classList.remove('active');
        }
        let navbar = document.querySelector('.navbar');
        document.querySelector('#menu-btn').onclick = () => {
            navbar.classList.toggle('active');
            searchForm.classList.remove('active');
            cartItem.classList.remove('active');
            loginForm.classList.remove('active');
        }

        window.onscroll = () => {
            searchForm.classList.remove('active');
            cartItem.classList.remove('active');
            loginForm.classList.remove('active');
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