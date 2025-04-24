<!--Header Style -->
<div class="wave -three"></div>

<!--loader -->
<div id="spinner"></div>
<!--app open-->
<div id="app" class="page">
    <!--nav open-->
    <nav class="navbar navbar-expand-lg main-navbar">
        <a class="header-brand" href="index.html">
            <!-- <img src="./assets/img/brand/logo-white.png" class="header-brand-img" alt="Splite-Admin  logo"> -->
            <p class="text text-white">E-COMMERCE STORE</p>
        </a>
        <form class="form-inline mr-auto">
            <ul class="navbar-nav mr-2">
                <li><a href="#" data-toggle="sidebar" class="nav-link nav-link toggle"><i class="fa fa-reorder"></i></a></li>
                <li><a href="#" data-toggle="search" class="nav-link nav-link d-md-none navsearch"><i class="fa fa-search"></i></a></li>
            </ul>
            <div class="search-element mr-3">
                <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                <span class="Search-icon"><i class="fa fa-search"></i></span>
            </div>
        </form>
        <ul class="navbar-nav navbar-right">
           
          
            <li class="dropdown dropdown-list-toggle d-none d-lg-block">
                <a href="#" class="nav-link nav-link-lg full-screen-link">
                    <i class="fa fa-expand " id="fullscreen-button"></i>
                </a>
            </li>
            <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg d-flex">
                    <span class="mr-3 mt-2 d-none d-lg-block ">
                        <span class="text-white">Hello,<span class="ml-1"> 
                            <?php if(isset($_SESSION['ADMINID'])) {
                                echo $_SESSION['ADMINNAME'];
                            } ?>
                        </span></span>
                    </span>
                    <span><img src="./assets/img/avatar/avatar-3.jpeg" alt="profile-user" class="rounded-circle w-32 mr-2"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <div class=" dropdown-header noti-title text-center border-bottom pb-3">
                        <h5 class="text-capitalize text-dark mb-1"><?php if(isset($_SESSION['ADMINID'])) {
                                echo $_SESSION['ADMINNAME'];
                            } ?></h5>
                        <small class="text-overflow m-0">ADmin</small>
                    </div>
                    <a class="dropdown-item" href="#"><i class="mdi mdi-account-outline mr-2"></i> <span>My profile</span></a>
                    <div class="dropdown-divider"></div><a class="dropdown-item" href="./logout.php"><i class="mdi  mdi-logout-variant mr-2"></i> <span>Logout</span></a>
                </div>
            </li>
        </ul>
    </nav>
    <!--nav closed-->