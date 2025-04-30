<?php 
$categoryquery = "SELECT * FROM categories";
$categoryexe = mysqli_query($connect, $categoryquery);
$categorys = [];
while ($fetch = mysqli_fetch_array($categoryexe)) {
  $categorys[] = $fetch;
}

$featuredquery = "SELECT * FROM products WHERE featured = '1'";
$featuredexe = mysqli_query($connect, $featuredquery);
$featured = [];
while ($fetch = mysqli_fetch_array($featuredexe)) {
  $featured[] = $fetch;
}
$randomProducts = [];
if(empty($featured)) {
  $featurequery="SELECT * FROM products ORDER BY RAND() LIMIT 4";
  $exe= mysqli_query($connect, $featurequery);
  while ($fetch = mysqli_fetch_array($exe)) {
    $randomProducts[] = $fetch;
  }

 }

 $recentProductsQuery = "SELECT * FROM products ORDER BY id DESC LIMIT 8";
 $recentProductsResult = mysqli_query($connect, $recentProductsQuery);
  $recentProducts = [];
  while ($fetch = mysqli_fetch_array($recentProductsResult)) {
    $recentProducts[] = $fetch;
  } 

if(isset($_GET['category'])){
  $category_id = $_GET['category'];
  $productquery = "SELECT * FROM products WHERE category_id = '$category_id'";
  $productexe = mysqli_query($connect, $productquery);
  $products = [];
  while ($fetch = mysqli_fetch_array($productexe)) {
    $products[] = $fetch;
  }
} else {
  $products = [];
$productquery = "SELECT * FROM products";
$productexe = mysqli_query($connect, $productquery);
while ($fetch = mysqli_fetch_array($productexe)) {
  $products[] = $fetch;
}
}

$productDetails = null;
if (isset($_GET['product'])) {
  $product_id = $_GET['product'];
  $productquery = "SELECT * FROM products WHERE id = '$product_id'";
  $productexe = mysqli_query($connect, $productquery);

  if ($productexe && mysqli_num_rows($productexe) > 0) {
    $productDetails = mysqli_fetch_assoc($productexe); // NO []
  }
}

?>
<style>
  .navbar-nav .nav-link {
    font-weight: 500;
    letter-spacing: 0.5px;
    padding: 0 15px;
  }

  .navbar-brand img {
    height: 40px;
  }

  .cart-badge {
    position: relative;
    top: -10px;
    right: 5px;
    background-color: #4CAF50;
    color: white;
    border-radius: 50%;
    padding: 0.25em 0.5em;
    font-size: 0.75em;
  }

  @media (max-width: 992px) {
    .navbar-nav .nav-link {
      padding: 10px 0;
    }
  }
</style>


<!-- Sticky Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top shadow-sm py-4">
  <div class="container-fluid px-3">
    <!-- Logo -->
    <a class="navbar-brand" href="#">
      <!-- <img src="" alt="Logo" class="img-fluid"> -->
      <h4>Logo</h4>     
    </a>

    <!-- Mobile Toggle Button -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Navbar Content -->
    <div class="collapse navbar-collapse" id="navbarContent">
      <!-- Main Navigation Links -->
      <ul class="navbar-nav mx-auto mb-2 mb-lg-0 ">
        <?php 
        foreach ($categorys as $category) {
          echo '<li class="nav-item fs-5">
                  <a class="nav-link text-capitalize" href="shop.php?category='.$category['id'].'">'.$category['name'].'</a>
                </li>';
        }
        ?>
        <!-- <li class="nav-item">
          <a class="nav-link" href="shop.php">LUXURY PERFUMES</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="shop.php">HERBAL</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="shop.php">SKIN CARE</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="shop.php">HAIR CARE</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="shop.php">FRAGRANCES</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="shop.php">DEALS & KITS</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="shop.php">GIFTS</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="shop.php">TRACK YOUR ORDER</a>
        </li> -->
      </ul>

      <!-- Right Icons -->
      <div class="d-flex align-items-center">
        <a href="#" class="text-dark me-2">
          <i class="bi bi-search fs-5"></i>
        </a>
        <a href="cart.php" class="text-dark position-relative">
          <i class="bi bi-bag fs-5"></i>
          <span class="cart-badge">5</span>
        </a>
        <?php if (isset($_SESSION['email'])) { ?>         
          <div class="btn-group">
            <button type="button" class="btn btn-outline-secondary py-1 dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="bi bi-person fs-5"></i>
            </button>
            <ul class="dropdown-menu dropdown-menu-end">
              <?php 
              $query = mysqli_query($connect, "SELECT * FROM users WHERE email = '".$_SESSION['email']."'");
              $user = mysqli_fetch_assoc($query);
              ?>
              <li><button class="dropdown-item text-center text-danger fs-3" type="button"><?php echo $user["name"]?></button></li>
              <li><button class="dropdown-item text-center" type="button"><?php echo $user["email"]?></button></li>
              <li><a href="./auth/logout.php" class="dropdown-item border text-center mt-1" type="button">Logout</a></li>
            </ul>
          </div>
        <?php } else { ?>
          <a href="#" class="text-dark me-3" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
            <i class="bi bi-person fs-5"></i>
          </a>
        <?php } ?>
      </div>
    </div>
  </div>
</nav>

<!-- 
    <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">Toggle right offcanvas</button> -->
<!-- 
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasRightLabel">Offcanvas right</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    ...
  </div>
</div> -->

<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
  <div class="offcanvas-header border-bottom">
    <h5 class="offcanvas-title fw-bold" id="offcanvasRightLabel">
      <span id="loginTitle">Sign In</span>
      <span id="signupTitle" style="display: none;">Create Account</span>
    </h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <!-- Tab Navigation (Hidden) -->
    <ul class="nav nav-tabs d-none" id="authTabs" role="tablist">
      <li class="nav-item" role="presentation">
        <button class="nav-link active" id="login-tab" data-bs-toggle="tab" data-bs-target="#login-content" type="button" role="tab" aria-controls="login-content" aria-selected="true">Login</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="signup-tab" data-bs-toggle="tab" data-bs-target="#signup-content" type="button" role="tab" aria-controls="signup-content" aria-selected="false">Sign Up</button>
      </li>
    </ul>

    <!-- Tab Content -->
    <div class="tab-content" id="authTabContent">
      <!-- Login Form Tab -->
      <div class="tab-pane fade show active" id="login-content" role="tabpanel" aria-labelledby="login-tab">
        <div class="p-2">
          <!-- Welcome Message -->
          <div class="text-center mb-4">
            <!-- <img src="https://hebbkx1anhila5yf.public.blob.vercel-storage.com/image-kM3utZcMZzPAfq1JPicp20KvWvEVuS.png" alt="Logo" class="img-fluid mb-3" style="max-width: 80px;"> -->
            <h4 class="fw-bold">Welcome!</h4>
            <p class="text-muted">Please sign in to continue</p>
          </div>

          <!-- Login Form -->
          <form action="./auth/login.php" method="post">
            <!-- Email Input -->
            <div class="form-floating mb-3">
              <input type="email" class="form-control" id="floatingEmail" placeholder="name@example.com" name="email" required>
              <label for="floatingEmail">Email address</label>
            </div>

            <!-- Password Input -->
            <div class="form-floating mb-3">
              <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password" required>
              <label for="floatingPassword">Password</label>
            </div>
            <input type="hidden" name="user" value="login">

            <!-- Remember Me & Forgot Password -->
            <div class="d-flex justify-content-between mb-4">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="rememberMe">
                <label class="form-check-label" for="rememberMe">
                  Remember me
                </label>
              </div>
              <a href="#" class="text-decoration-none">Forgot password?</a>
            </div>

            <!-- Sign In Button -->
            <div class="d-grid gap-2 mb-4">
              <button class="btn btn-primary py-2 fw-bold" type="submit">SIGN IN</button>
            </div>

            <!-- Divider -->
            <!-- <div class="position-relative my-4">
              <hr>
              <p class="position-absolute top-50 start-50 translate-middle bg-white px-3 text-muted small">OR CONTINUE WITH</p>
            </div> -->

            <!-- Social Login Buttons -->
            <!-- <div class="row g-2 mb-4">
              <div class="col">
                <button type="button" class="btn btn-outline-secondary w-100">
                  <i class="bi bi-google"></i> Google
                </button>
              </div>
              <div class="col">
                <button type="button" class="btn btn-outline-secondary w-100">
                  <i class="bi bi-facebook"></i> Facebook
                </button>
              </div>
            </div> -->

            <!-- Sign Up Link -->
            <div class="text-center mt-4">
              <p class="mb-0">Don't have an account? <a href="#" class="text-decoration-none fw-bold" id="showSignupForm">Sign up</a></p>
            </div>
          </form>
        </div>
      </div>

      <!-- Sign Up Form Tab -->
      <div class="tab-pane fade" id="signup-content" role="tabpanel" aria-labelledby="signup-tab">
        <div class="p-2">
          <!-- Welcome Message -->
          <div class="text-center mb-4">
            <!-- <img src="https://hebbkx1anhila5yf.public.blob.vercel-storage.com/image-kM3utZcMZzPAfq1JPicp20KvWvEVuS.png" alt="Logo" class="img-fluid mb-3" style="max-width: 80px;"> -->
            <h4 class="fw-bold">Create Account</h4>
            <p class="text-muted">Join us today!</p>
          </div>

          <!-- Sign Up Form -->
          <form action="./auth/signup.php" method="post">
            <!-- Name Input -->
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="floatingName" placeholder="Full Name" name="name" required>
              <label for="floatingName">Name</label>
            </div>

            <!-- Email Input -->
            <div class="form-floating mb-3">
              <input type="email" class="form-control" id="floatingSignupEmail" placeholder="name@example.com" name="email" required>
              <label for="floatingSignupEmail">Email address</label>
            </div>

            <!-- Password Input -->
            <div class="form-floating mb-3">
              <input type="password" class="form-control" id="floatingSignupPassword" placeholder="Password" name="password" required>
              <label for="floatingSignupPassword">Password</label>
            </div>

            <!-- Confirm Password Input -->
            <div class="form-floating mb-3">
              <input type="password" class="form-control" id="floatingConfirmPassword" placeholder="Confirm Password" name="confirm_password" required>
              <label for="floatingConfirmPassword">Confirm Password</label>
            </div>

            <!-- Terms and Conditions -->
            <!-- <div class="form-check mb-4">
              <input class="form-check-input" type="checkbox" id="termsCheck">
              <label class="form-check-label" for="termsCheck">
                I agree to the <a href="#" class="text-decoration-none">Terms of Service</a> and <a href="#" class="text-decoration-none">Privacy Policy</a>
              </label>
            </div> -->

            <!-- Sign Up Button -->
            <div class="d-grid gap-2 mb-4">
              <button class="btn btn-primary py-2 fw-bold" type="submit">CREATE ACCOUNT</button>
            </div>

            <!-- Divider -->
            <!-- <div class="position-relative my-4">
              <hr>
              <p class="position-absolute top-50 start-50 translate-middle bg-white px-3 text-muted small">OR SIGN UP WITH</p>
            </div> -->

            <!-- Social Sign Up Buttons -->
            <!-- <div class="row g-2 mb-4">
              <div class="col">
                <button type="button" class="btn btn-outline-secondary w-100">
                  <i class="bi bi-google"></i> Google
                </button>
              </div>
              <div class="col">
                <button type="button" class="btn btn-outline-secondary w-100">
                  <i class="bi bi-facebook"></i> Facebook
                </button>
              </div>
            </div> -->

            <!-- Sign In Link -->
            <div class="text-center mt-4">
              <p class="mb-0">Already have an account? <a href="#" class="text-decoration-none fw-bold" id="showLoginForm">Sign in</a></p>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Add this JavaScript at the end of your body tag -->
<script>
  document.addEventListener('DOMContentLoaded', function() {
    // Get elements
    const loginTab = document.getElementById('login-tab');
    const signupTab = document.getElementById('signup-tab');
    const showSignupForm = document.getElementById('showSignupForm');
    const showLoginForm = document.getElementById('showLoginForm');
    const loginTitle = document.getElementById('loginTitle');
    const signupTitle = document.getElementById('signupTitle');

    // Show signup form when "Sign up" is clicked
    showSignupForm.addEventListener('click', function(e) {
      e.preventDefault();
      signupTab.click();
      loginTitle.style.display = 'none';
      signupTitle.style.display = 'block';
    });

    // Show login form when "Sign in" is clicked
    showLoginForm.addEventListener('click', function(e) {
      e.preventDefault();
      loginTab.click();
      signupTitle.style.display = 'none';
      loginTitle.style.display = 'block';
    });
  });
</script>