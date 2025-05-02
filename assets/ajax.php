    <!-- ajax code  -->
    <?php
    include "./admin/process/connection.php"; 
    if (isset($_GET['ajax']) && $_GET['ajax'] == 1) {
      $category_id = $_GET['category'] ?? '';
      $productquery = $category_id !== ''
        ? "SELECT * FROM products WHERE category_id = '$category_id'"
        : "SELECT * FROM products";
      $productexe = mysqli_query($connect, $productquery);
    
      if (mysqli_num_rows($productexe) > 0) {
        while ($product = mysqli_fetch_array($productexe)) {
          $imagequery = "SELECT * FROM product_images WHERE product_id = '" . $product['id'] . "' LIMIT 1";
          $imageexe = mysqli_query($connect, $imagequery);
          $images = mysqli_fetch_array($imageexe);
          $image = $images['product_images'];
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
    
    <?php
        }
      } else {
        echo '<div class="text-center text-danger">No Products Found</div>';
      }
      exit;
    }
    ?>
  