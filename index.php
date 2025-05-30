  <?php
  include './assets/ajax.php';
  include './components/head.php';
  //  header  
  include "./components/header.php";
  ?>

  <?php
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
  <style>

  </style>

  <!-- Hero Section -->
  <section class="position-relative py-5" style="background: linear-gradient(135deg, rgba(0, 0, 0, 0.9), rgba(0, 0, 0, 0.7), rgba(200, 0, 0, 0.5), rgba(0, 255, 255, 0.4));">
    <div class="container position-relative text-white z-1">
      <div class="hero-content col-10 col-md-8">
        <h5 class="text-warning fw-medium mb-2">100% Original Products</h5>
        <h1 class="display-4 fw-bold mb-4">Wide Range of Quality Products</h1>
        <p class="text-light mb-4">Discover an extensive collection of everyday items and special finds delivered right to your doorstep.</p>
        <a href="shop.php" class="btn btn-success px-4 py-2 rounded-pill fw-medium">Shop Now</a>
      </div>
    </div>
  </section>



  <!-- Category Section -->
  <section class="container py-3 pt-md-5">
    <!-- Section Title -->
    <div class="row">
      <div class="col-12 text-center">
        <h2 class="fw-bold">
          <span class="text-dark">All</span>
          <span class="text-danger">Categories</span>
        </h2>
      </div>
    </div>

    <!-- Category Row -->
    <div class="row g-4 pt-3">
      <?php foreach ($categorys as $category) : ?>
        <div class="col-6 col-md-4 col-lg-4">
          <a href="shop.php?category=<?php echo $category["id"] ?>" class="text-decoration-none">
            <div class="card  border-0">
              <div class="image-wrapper w-100 mx-auto category-img-wrapper">
                <img src="./admin/assets/images/categories/thumbnails/<?php echo $category['image']; ?>"
                  alt="Main Image" class="main-img img-fluid w-100 h-100">
              </div>
              <div class="card-body pt-3 pb-0">
                <h5 class="card-title fs-md-3 fw-bold text-center"><?php echo $category["name"] ?></h5>
                <!-- <p class="card-text">
                            <span class="text-decoration-line-through text-muted">Rs.1,300</span>
                            <span class="text-danger fw-bold ms-2">Rs.1,170</span>
                        </p> -->
              </div>
            </div>
          </a>
        </div>
      <?php endforeach; ?>
    </div>

  </section>

  <!-- Section Divider -->
  <div class="row py-md-4">
    <div class="col-12">
      <hr class="opacity-25 ">
    </div>
  </div>

  <!-- Recent Products -->
  <section class="container">
    <!-- Section Title -->
    <div class="row">
      <div class="col-12 text-center">
        <h2 class="fw-bold">
          <span class="text-dark">Recent</span>
          <span class="text-danger">Products</span>
        </h2>
      </div>
    </div>
    <!-- Products  Content -->
    <div class="d-flex gap-2 pt-3 flex-nowrap overflow-auto hide-scrollbar" style="scrollbar-width: none;">
      <?php foreach ($recentProducts as $recentProduct): ?>
        <div class="recent-product text-center flex-shrink-0" style="width: 300px;">
          <a href="product-detail.php?product=<?php echo $recentProduct["id"] ?>" class="text-decoration-none text-danger">
            <div class="mb-3 border border-2 recent-img-wrapper">
              <?php
              $imagequery = "SELECT * FROM product_images WHERE product_id = '" . $recentProduct['id'] . "' LIMIT 1";
              $imageexe = mysqli_query($connect, $imagequery);
              $imagefetch = mysqli_fetch_array($imageexe);
              $image = $imagefetch["product_images"];
              ?>
              <img src="./admin/assets/images/products/thumbnails/<?php echo $image ?>" class="img-fluid" alt="">
            </div>
            <button class="btn btn-outline-dark w-100 mb-3 py-1 py-md-2 text-uppercase">Add to Bag</button>
            <h5 class="product-title fw-bold mb-1 text-wrap"><?php echo $recentProduct["title"] ?></h5>
            <p class="product-price mb-0">Rs <?php echo $recentProduct["price"] ?></p>
          </a>
        </div>
      <?php endforeach; ?>
    </div>

  </section>


  <!-- Section Divider -->
  <div class="row py-2 py-md-4">
    <div class="col-12">
      <hr class="opacity-25">
    </div>
  </div>

  <!-- Featured or Popular Picks Products -->
  <section class="container">
    <!-- Section Title -->
    <div class="row">
      <div class="col-12 text-center">
        <h2 class="fw-bold">
          <?php
          if (empty($featured)) {
            echo '<span class="text-dark">Popular Picks</span>';
            echo '<span class="text-danger"> For You</span>';
          } else {
            echo '<span class="text-dark">FEATURED</span>';
            echo '<span class="text-danger"> PRODUCTS</span>';
          }
          ?>
        </h2>
      </div>
    </div>
    <!-- Products  Content -->
    <div class="d-flex gap-2 pt-3 flex-nowrap overflow-auto hide-scrollbar" style="scrollbar-width: none;">
      <?php
      $productList = empty($featured) ? $randomProducts : $featured;
      foreach ($productList as $product):
        $imageQuery = "SELECT * FROM product_images WHERE product_id = '" . $product['id'] . "'";
        $imageResult = mysqli_query($connect, $imageQuery);
        $images = [];
        while ($row = mysqli_fetch_array($imageResult)) {
          $images[] = $row['product_images'];
        }
        $hasSecondImage = !empty($images[1]);
      ?>
        <div class="recent-product text-center flex-shrink-0" style="width: 300px;">
          <a href="product-detail.php?product=<?php echo $recentProduct["id"] ?>" class="text-decoration-none text-danger">
            <!-- Image Wrapper -->
            <div class="custom-img-wrapper position-relative overflow-hidden <?php echo $hasSecondImage ? 'has-hover' : 'no-hover'; ?>">
              <?php if (!empty($images[0])): ?>
                <img src="./admin/assets/images/products/thumbnails/<?php echo $images[0]; ?>"
                  alt="Main Image"
                  class="main-image img-fluid w-100 h-100">
              <?php endif; ?>
              <?php if ($hasSecondImage): ?>
                <img src="./admin/assets/images/products/thumbnails/<?php echo $images[1]; ?>"
                  alt="Hover Image"
                  class="hover-image img-fluid w-100 h-100 position-absolute top-0 start-0">
              <?php endif; ?>
              <span class="position-absolute top-0 start-0 bg-danger text-white px-2 py-1 m-2" style="z-index: 3;">0%</span>
            </div>
            <div class="card-body px-0 pt-3 pb-0 text-center">
              <h5 class="card-title fs-6 fw-bold"><?php echo $product["title"]; ?></h5>
              <p class="card-text">
                <span class="text-decoration-line-through text-muted">Rs. <?php echo $product["price"]; ?></span>
                <span class="text-danger fw-bold ms-2">Rs. <?php echo $product["price"]; ?></span>
              </p>
            </div>
          </a>
        </div>
      <?php endforeach; ?>
    </div>

  </section>
  <!-- Section Divider -->
  <div class="row">
    <div class="col-12">
      <hr class="opacity-25 ">
    </div>
  </div>

<!-- All Products -->
<section class="container py-2 py-md-5">
  <!-- Section Title -->
  <div class="row">
    <div class="d-flex flex-column flex-md-row col-12 text-md-start justify-content-between align-items-center">
      <div class="w-100">      
        <h2 class="fw-bold">
          <span class="text-dark">All</span>
          <span class="text-danger">Products</span>
        </h2>
      </div>

      <!-- SCROLLABLE CATEGORY LIST -->
      <div class="overflow-auto hide-scrollbar w-100">
        <ul class="d-flex list-unstyled gap-3 mb-0 flex-nowrap justify-content-md-end py-2" id="category-list">
          <li>
            <a href="#" class="category-link text-decoration-none" data-id="">All</a>
          </li>
          <?php
          $query = "SELECT * FROM categories";
          $result = mysqli_query($connect, $query);
          $categorys = mysqli_fetch_all($result, MYSQLI_ASSOC);
          foreach ($categorys as $category): ?>
            <li>
              <a href="#" class="category-link text-decoration-none" data-id="<?= $category['id'] ?>">
                <?= $category['name'] ?>
              </a>
            </li>
          <?php endforeach; ?>
        </ul>
      </div>
    </div>
  </div>

  <!-- Products Tab Content -->
  <div class="row g-3" id="product-container">
    <?php
    if (empty($products)) {
      echo '<div class="text-center">No Products Found</div>';
    } else {
      foreach ($products as $product):
        $query = "SELECT * FROM product_images WHERE product_id = '" . $product["id"] . "' LIMIT 1";
        $exe = mysqli_query($connect, $query);
        $fetch = mysqli_fetch_array($exe);
        $image = $fetch["product_images"];
    ?>
      <div class="col-6 col-md-4 col-lg-3">
        <div class="product-card d-flex flex-column border border-2 h-100 p-2 py-3 shadow-sm">
          <a href="product-detail.php?product=<?= $product['id'] ?>" class="text-decoration-none text-black">
            <div class="product-image mb-2">
              <img src="./admin/assets/images/products/thumbnails/<?= $image ?>" class="img-fluid product-img" alt="">
            </div>
          </a>

          <h6 class="product-title text-danger mb-1"><?= $product["title"] ?></h6>
          <p class="product-price text-danger mb-2">Rs. <?= $product["price"] ?></p>

          <div class="mt-auto">
            <?php if (isset($_SESSION['email'])): ?>
              <button class="btn btn-outline-dark w-100 add-to-cart-btn">Add to Cart</button>
            <?php else: ?>
              <button class="btn btn-outline-dark w-100 add-to-cart-btn"
                data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight"
                aria-controls="offcanvasRight">Add to Cart</button>
            <?php endif; ?>
          </div>
        </div>
      </div>
    <?php endforeach; } ?>
  </div>
</section>


  <!-- footer  -->
  <?php include "./components/footer.php" ?>



  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).on("click", ".category-link", function(e) {
      e.preventDefault();
      const categoryId = $(this).data("id");

      $.ajax({
        url: "index.php",
        method: "GET",
        data: {
          category: categoryId,
          ajax: 1
        },
        success: function(response) {
          $("#product-container").html(response);
        },
        error: function() {
          alert("Failed to load products.");
        }
      });
    });
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>


  </body>

  </html>