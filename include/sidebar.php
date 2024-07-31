<nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
                <div class="nav-profile-image">
                  <!-- <img src="assets/images/faces/face1.jpg" alt="profile"> -->
                  <span class="login-status online"></span>
                  <!--change to offline or busy as needed-->
                </div>
                <div class="nav-profile-text d-flex flex-column">
                  <span class="font-weight-bold mb-2">G&P</span>
                  <span class="text-secondary text-small">Admin</span>
                </div>
                <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="profile.php">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="user.php">
                <span class="menu-title">User Detail</span>
                <i class="mdi mdi-account menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Banner Setting</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-folder-image menu-icon"></i>
              </a>
              <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="addbanner.php">Add Banner</a></li>
                  <li class="nav-item"> <a class="nav-link" href="allbanner.php">All Banner</a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic1" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Footer Setting</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-function menu-icon"></i>
              </a>
              <div class="collapse" id="ui-basic1">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="links.php">Links</a></li>
                  <li class="nav-item"> <a class="nav-link" href="about.php">About </a></li>
                  <li class="nav-item"> <a class="nav-link" href="contact.php">Contact Us</a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic3" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Product</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-movie-roll menu-icon"></i>
              </a>
              <div class="collapse" id="ui-basic3">
                <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="addproduct.php">Add Product</a></li>
                  <li class="nav-item"> <a class="nav-link" href="allproduct.php">All Product</a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic4" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Gallery Image</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-image menu-icon"></i>
              </a>
              <div class="collapse" id="ui-basic4">
                <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="addimg.php">Add Image</a></li>
                  <li class="nav-item"> <a class="nav-link" href="allimg.php">All Image</a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="order.php">
                <span class="menu-title">Orders Detail</span>
                <i class="mdi mdi-basket-fill menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="reviewmsg.php">
                <span class="menu-title">Review Message</span>
                <i class="mdi mdi-message menu-icon"></i>
              </a>
            </li>
      
          </ul>
        </nav>