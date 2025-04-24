<?php
include './components/head.php';

?>
<!-- header  -->
<?php include "./components/header.php";
if (isset($_GET['success']) || isset($_SESSION['success'])) {
  echo '<script>
    toaster("success","Registration Successful", "Welcome to our store")
    </script>';
  unset($_SESSION['success']);
}
if (isset($_GET['error']) || isset($_SESSION['error'])) {
  echo '<script>
    toaster("warning","Registration Failed", "Please try again")
    </script>';
  unset($_SESSION['error']);
}
if (isset($_GET["logout"])) {
  echo '<script>
    toaster("success","Logout Successfully", "See you again")
    </script>';
  unset($_SESSION['logout']);
}
?>

<!-- Hero Section -->
<section class="position-relative py-5" style="background-image: url('images/hero-img.jpg'); background-size: cover; background-position: center;">
  <!-- <div class="position-absolute top-0 start-0 w-100 h-100" style="background-color: rgba(0, 0, 0, 0.57);"></div> -->
  <div class="container position-relative text-white z-1">
    <div class="hero-content col-10 col-md-8">
      <h5 class="text-warning fw-medium mb-2">100% Original Products</h5>
      <h1 class="display-4 fw-bold mb-4">Wide Range of Quality Products</h1>
      <p class="text-light mb-4">Discover an extensive collection of everyday items and special finds delivered right to your doorstep.</p>
      <a href="#" class="btn btn-success px-4 py-2 rounded-pill fw-medium">Shop Now</a>
      <!-- <div class="d-flex gap-3">             
                <a href="#" class="btn btn-light text-dark px-4 py-2 rounded-pill fw-medium">Learn More</a>
            </div> -->
    </div>
  </div>
</section>

<!-- Category Section -->
<section class="container pt-5">

  <!-- Section Title -->
  <div class="row mb-4">
    <div class="col-12 text-center">
      <h2 class="fw-bold">
        <span class="text-dark">All</span>
        <span class="text-danger">Categories</span>
      </h2>
    </div>
  </div>

  <!-- Products Row -->
  <div class="row g-4">
    <!-- Product 1 -->
    <?php foreach ($categorys as $category) : ?>
      <div class="col-6 col-md-4 col-lg-4">
        <a href="shop.php?category=<?php echo $category["id"] ?>" class="text-decoration-none">
          <div class="card  border-0">
            <div class="image-wrapper w-100 mx-auto">
              <img src="./admin/assets/images/categories/<?php echo $category['image']; ?>"
                alt="Main Image" class="main-img img-fluid w-100 h-100">
            </div>
            <div class="card-body pt-3 pb-0">
              <h5 class="card-title fs-3 fw-bold text-center"><?php echo $category["name"] ?></h5>
              <!-- <p class="card-text">
                            <span class="text-decoration-line-through text-muted">Rs.1,300</span>
                            <span class="text-danger fw-bold ms-2">Rs.1,170</span>
                        </p> -->
            </div>
          </div>
        </a>
      </div>
    <?php endforeach; ?>
    <!-- Product 2 -->
    <!-- <div class="col-6 col-md-4 col-lg-4">
      <a href="shop.php" class="text-decoration-none">
        <div class="card  border-0">
          <div class="image-wrapper w-100 mx-auto">
            <img src="images/bag.jpeg" alt="Main Image" class="main-img img-fluid w-100 h-100">
          </div>
          <div class="card-body px-0 pt-3 pb-0">
            <h5 class="card-title fs-3 fw-bold text-center">Shoes</h5>
            <p class="card-text">
                            <span class="text-decoration-line-through text-muted">Rs.1,300</span>
                            <span class="text-danger fw-bold ms-2">Rs.1,170</span>
                        </p>
          </div>
        </div>
      </a>
    </div> -->
    <!-- Product 3 -->
    <!-- <div class="col-6 col-md-4 col-lg-4">
      <a href="shop.php" class="text-decoration-none">
        <div class="card  border-0">
          <div class="image-wrapper w-100 mx-auto">
            <img src="images/watch2.jpeg" alt="Main Image" class="main-img img-fluid w-100 h-100">
          </div>
          <div class="card-body px-0 pt-3 pb-0">
            <h5 class="card-title fs-3 fw-bold text-center">Watches</h5>
            <p class="card-text">
                            <span class="text-decoration-line-through text-muted">Rs.1,300</span>
                            <span class="text-danger fw-bold ms-2">Rs.1,170</span>
                        </p>
          </div>
        </div>
      </a>
    </div> -->

  </div>

</section>

<!-- Section Divider -->
<div class="row py-4">
  <div class="col-12">
    <hr class="opacity-25 ">
  </div>
</div>

<!-- Featured Products Section -->
<section class="container">
  <!-- Section Title -->
  <div class="row mb-4">
    <div class="col-12 text-center">
      <h2 class="fw-bold">
        <span class="text-dark">FEATURED</span>
        <span class="text-danger">PRODUCTS</span>
      </h2>
    </div>
  </div>

  <!-- Products Row -->
  <div class="row g-4">
    <!-- Products -->


    <!-- Product 2 -->
    <div class="col-6 col-md-4 col-lg">
      <a href="product-detail.php" class="text-decoration-none">
        <div class="card h-100 border-0">
          <div class="image-hover-wrapper">
            <img src="images/bag.jpeg" alt="Main Image" class="main-img img-fluid">
            <img src="images/bag2.jpeg" alt="Hover Image" class="hover-img img-fluid">
            <span class="position-absolute top-0 start-0 bg-danger text-white px-2 py-1 m-2">- 15 %</span>
          </div>
          <div class="card-body px-0 pt-3 pb-0">
            <h5 class="card-title fs-6 fw-bold">Daily Defense Invisible Sunscreen Super Serum SPF 60</h5>
            <p class="card-text">
              <span class="text-decoration-line-through text-muted">Rs.1,300</span>
              <span class="text-danger fw-bold ms-2">Rs.1,170</span>
            </p>
          </div>
        </div>
      </a>
    </div>
    <!-- Product 3 -->
    <div class="col-6 col-md-4 col-lg">
      <a href="product-detail.php" class="text-decoration-none">
        <div class="card h-100 border-0">
          <div class="image-hover-wrapper">
            <img src="images/shoes.jpeg" alt="Main Image" class="main-img img-fluid">
            <img src="images/shoes2.jpeg" alt="Hover Image" class="hover-img img-fluid">
            <span class="position-absolute top-0 start-0 bg-danger text-white px-2 py-1 m-2">- 10 %</span>
          </div>
          <div class="card-body px-0 pt-3 pb-0">
            <h5 class="card-title fs-6 fw-bold">Daily Defense Invisible Sunscreen Super Serum SPF 60</h5>
            <p class="card-text">
              <span class="text-decoration-line-through text-muted">Rs.1,300</span>
              <span class="text-danger fw-bold ms-2">Rs.1,170</span>
            </p>
          </div>
        </div>
      </a>
    </div>

    <!-- Product 4 -->
    <div class="col-6 col-md-4 col-lg">
      <a href="product-detail.php" class="text-decoration-none">
        <div class="card h-100 border-0">
          <div class="image-hover-wrapper">
            <img src="images/watches.jpeg" alt="Main Image" class="main-img img-fluid">
            <img src="images/watch2.jpeg" alt="Hover Image" class="hover-img img-fluid">
            <span class="position-absolute top-0 start-0 bg-danger text-white px-2 py-1 m-2">- 10 %</span>
          </div>
          <div class="card-body px-0 pt-3 pb-0">
            <h5 class="card-title fs-6 fw-bold">Daily Defense Invisible Sunscreen Super Serum SPF 60</h5>
            <p class="card-text">
              <span class="text-decoration-line-through text-muted">Rs.1,300</span>
              <span class="text-danger fw-bold ms-2">Rs.1,170</span>
            </p>
          </div>
        </div>
      </a>
    </div>

    <!-- Product 5 -->
    <div class="col-6 col-md-4 col-lg">
      <a href="product-detail.php" class="text-decoration-none">
        <div class="card h-100 border-0">
          <div class="image-hover-wrapper">
            <img src="images/Sun-Block.._300x.avif" alt="Main Image" class="main-img img-fluid">
            <img src="images/SPF-1-updated_300x.avif" alt="Hover Image" class="hover-img img-fluid">
            <span class="position-absolute top-0 start-0 bg-danger text-white px-2 py-1 m-2">- 10 %</span>
          </div>
          <div class="card-body px-0 pt-3 pb-0">
            <h5 class="card-title fs-6 fw-bold">Daily Defense Invisible Sunscreen Super Serum SPF 60</h5>
            <p class="card-text">
              <span class="text-decoration-line-through text-muted">Rs.1,300</span>
              <span class="text-danger fw-bold ms-2">Rs.1,170</span>
            </p>
          </div>
        </div>
      </a>
    </div>
  </div>
</section>

<!-- Section Divider -->
<div class="row py-4">
  <div class="col-12">
    <hr class="opacity-25">
  </div>
</div>

<!-- Recent Products -->
<section class="container">
  <!-- Section Title -->
  <div class="row mb-4">
    <div class="col-12 text-center">
      <h2 class="fw-bold">
        <span class="text-dark">Recent</span>
        <span class="text-danger">Products</span>
      </h2>
    </div>
  </div>


  <!-- Products  Content -->

  <div class="d-flex gap-2" style="overflow-x: scroll; white-space: nowrap; scrollbar-width: none;">

    <!--  First product -->
    <div class="recent-product text-center mb-4">
      <a href="product-detail.php" class="text-decoration-none text-danger">
        <div class="recent-image mb-3 border border-2">
          <img src="./images/bag2.jpeg" class="img-fluid w-100 h-100" alt="">
        </div>
        <button class="btn btn-outline-dark w-100 mb-3 py-1 py-md-2 text-uppercase">Add to Bag</button>
        <h5 class="product-title fw-bold mb-1">Leather Bag</h5>
        <p class="product-price mb-0">Rs.4,490</p>
      </a>
    </div>

    <!-- second Product -->
    <div class="recent-product text-center mb-4">
      <a href="product-detail.php" class="text-decoration-none text-danger">
        <div class="recent-image mb-3 border border-2">
          <img src="./images/download2.jpeg" class="img-fluid w-100 h-100" alt="">
        </div>
        <button class="btn btn-outline-dark w-100 mb-3 py-1 py-md-2 text-uppercase">Add to Bag</button>
        <h5 class="product-title fw-bold mb-1">Camera</h5>
        <p class="product-price mb-0">Rs.4,490</p>
      </a>
    </div>

    <!-- third Product -->
    <div class="recent-product text-center mb-4">
      <a href="product-detail.php" class="text-decoration-none text-danger">
        <div class="recent-image mb-3 border border-2">
          <img src="./images/download1.jpeg" class="img-fluid w-100 h-100" alt="">
        </div>
        <button class="btn btn-outline-dark w-100 mb-3 py-1 py-md-2 text-uppercase">Add to Bag</button>
        <h5 class="product-title fw-bold mb-1">Skin Cream</h5>
        <p class="product-price mb-0">Rs.4,490</p>
      </a>
    </div>

    <!-- fourth product -->
    <div class="recent-product text-center mb-4">
      <a href="product-detail.php" class="text-decoration-none text-danger">
        <div class="recent-image mb-3 border border-2">
          <img src="./images/download6.jpeg" class="img-fluid w-100 h-100" alt="">
        </div>
        <button class="btn btn-outline-dark w-100 mb-3 py-1 py-md-2 text-uppercase">Add to Bag</button>
        <h5 class="product-title fw-bold mb-1">Shoes</h5>
        <p class="product-price mb-0">Rs.4,490</p>
      </a>
    </div>
    <!-- fifth product -->
    <div class="recent-product text-center mb-4">
      <a href="product-detail.php" class="text-decoration-none text-danger">
        <div class="recent-image mb-3 border border-2">
          <img src="./images/bag2.jpeg" class="img-fluid w-100 h-100" alt="">
        </div>
        <button class="btn btn-outline-dark w-100 mb-3 py-1 py-md-2 text-uppercase">Add to Bag</button>
        <h5 class="product-title fw-bold mb-1">Leather Bag</h5>
        <p class="product-price mb-0">Rs.4,490</p>
      </a>
    </div>

    <!-- fifth product -->
    <div class="recent-product text-center mb-4">
      <a href="product-detail.php" class="text-decoration-none text-danger">
        <div class="recent-image mb-3 border border-2">
          <img src="./images/bag2.jpeg" class="img-fluid w-100 h-100" alt="">
        </div>
        <button class="btn btn-outline-dark w-100 mb-3 py-1 py-md-2 text-uppercase">Add to Bag</button>
        <h5 class="product-title fw-bold mb-1">Leather Bag</h5>
        <p class="product-price mb-0">Rs.4,490</p>
      </a>
    </div>

    <!-- </div> -->
</section>

<!-- All Products -->
<section class="container py-5">
  <!-- Section Divider -->
  <div class="row">
    <div class="col-12">
      <hr class="opacity-25 mb-5">
    </div>
  </div>

  <!-- Section Title -->
  <div class="row mb-4">
    <div class="d-md-flex col-12 text-center justify-content-between align-items-center">
      <h2 class="fw-bold">
        <span class="text-dark">All</span>
        <span class="text-danger">Products</span>
      </h2>
      <ul class="d-flex list-unstyled text-center gap-4 justify-content-center">
        <li><a href="index.php" class="text-decoration-none">All</a></li>
        <?php foreach ($categorys as $category): ?>
          <li><a href="" class="text-decoration-none"><?php echo $category["name"] ?></a></li>
          <!-- <li><a href="" class="text-decoration-none">Shoes</a></li>
        <li><a href="" class="text-decoration-none">Watches</a></li>
        <li><a href="" class="text-decoration-none">Rings</a></li> -->
        <?php endforeach; ?>
      </ul>
    </div>
  </div>


  <!-- Products Tab Content -->
  <div class="row g-2">
    <!--  First product -->
    <?php
  if (empty($products)) {
    echo '<div class="text-center">No Products Found</div>';
}else{
     foreach ($products as $product): ?>
      <div class="col-6 col-md-4 col-lg-3">
        <a href="product-detail.php" class="text-decoration-none text-black">
          <div class="product-card text-center border border-2 mb-4" style="height: 60vh; overflow: scroll; scrollbar-width: none;">
            <div class="product-image mb-3">
              <img src="./admin/assets/images/products/<?php echo $product["image"] ?>" class="img-fluid w-100 h-100 " alt="">
            </div>
            <div class="d-flex align-items-center justify-content-between px-1">
              <p class="product-price "><?php echo $product["price"] ?></p>
              <button class="btn btn-outline-dark w-50 mb-3 text-uppercase">Add to Cart</button>
            </div>
            <h5 class="product-title fw-bold mb-3"><?php echo $product["title"] ?></h5>
          </div>
        </a>
      </div>
    <?php endforeach; } ?>
  

    <!-- second Product -->
    <!-- <div class="col-6 col-md-4 col-lg-3">
      <a href="product-detail.php" class="text-decoration-none text-black">
        <div class="product-card text-center mb-4 border border-2">
          <div class="product-image mb-3">
            <img src="./images/shoes.jpeg" class="img-fluid w-100 h-100" alt="">
          </div>
          <div class="d-flex align-items-center justify-content-between px-1">
            <p class="product-price ">Rs.4,490</p>
            <button class="btn btn-outline-dark w-50 mb-3 text-uppercase">Add to Cart</button>
          </div>
          <h5 class="product-title fw-bold mb-3">Leather Bag</h5>

        </div>
      </a>
    </div> -->

    <!-- third Product -->
    <!-- <div class="col-6 col-md-4 col-lg-3 ">
      <a href="product-detail.php" class="text-decoration-none text-black">
        <div class="product-card text-center border border-2 mb-4">
          <div class="product-image mb-3">
            <img src="./images/download2.jpeg" class="img-fluid h-100 w-100" alt="">
          </div>
          <div class="d-flex align-items-center justify-content-between px-1">
            <p class="product-price ">Rs.4,490</p>
            <button class="btn btn-outline-dark w-50 mb-3 text-uppercase">Add to Cart</button>
          </div>
          <h5 class="product-title fw-bold mb-3">Leather Bag</h5>

        </div>
      </a>
    </div> -->

    <!-- fourth product -->
    <!-- <div class="col-6 col-md-4 col-lg-3 ">
      <a href="product-detail.php" class="text-decoration-none text-black">
        <div class="product-card text-center border border-2 mb-4">
          <div class="product-image mb-3">
            <img src="./images/download3.jpeg" class="img-fluid h-100 w-100" alt="">
          </div>
          <div class="d-flex align-items-center justify-content-between px-1">
            <p class="product-price ">Rs.4,490</p>
            <button class="btn btn-outline-dark w-50 mb-3 text-uppercase">Add to Cart</button>
          </div>
          <h5 class="product-title fw-bold mb-3">Leather Bag</h5>

        </div>
      </a>
    </div> -->

    <!-- fifth product -->
    <!-- <div class="col-6 col-md-4 col-lg-3 ">
      <a href="product-detail.php" class="text-decoration-none text-black">
        <div class="product-card text-center border border-2 mb-4">
          <div class="product-image mb-3">
            <img src="./images/watches.jpeg" class="img-fluid h-100 w-100" alt="Durvesh Perfume">
          </div>
          <div class="d-flex align-items-center justify-content-between px-1">
            <p class="product-price ">Rs.4,490</p>
            <button class="btn btn-outline-dark w-50 mb-3 text-uppercase">Add to Cart</button>
          </div>
          <h5 class="product-title fw-bold mb-3">Leather Bag</h5>

        </div>
      </a>
    </div> -->

    <!-- fifth product -->
    <!-- <div class="col-6 col-md-4 col-lg-3 ">
      <a href="product-detail.php" class="text-decoration-none text-black">
        <div class="product-card text-center border border-2 mb-4">
          <div class="product-image mb-3">
            <img src="./images/download5.jpeg" class="img-fluid h-100 w-100" alt="Durvesh Perfume">
          </div>
          <div class="d-flex align-items-center justify-content-between px-1">
            <p class="product-price ">Rs.4,490</p>
            <button class="btn btn-outline-dark w-50 mb-3 text-uppercase">Add to Cart</button>
          </div>
          <h5 class="product-title fw-bold mb-3">Leather Bag</h5>

        </div>
      </a>
    </div> -->
    <!-- fifth product -->
    <!-- <div class="col-6 col-md-4 col-lg-3">
      <a href="product-detail.php" class="text-decoration-none text-black">
        <div class="product-card text-center border border-2 mb-4">
          <div class="product-image mb-3">
            <img src="./images/download6.jpeg" class="img-fluid h-100 w-100" alt="Durvesh Perfume">
          </div>
          <div class="d-flex align-items-center justify-content-between px-1">
            <p class="product-price ">Rs.4,490</p>
            <button class="btn btn-outline-dark w-50 mb-3 text-uppercase">Add to Cart</button>
          </div>
          <h5 class="product-title fw-bold mb-3">Leather Bag</h5>
        </div>
      </a>
    </div> -->
  </div>
</section>

<!-- footer  -->
<?php include "./components/footer.php" ?>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>


</body>

</html>