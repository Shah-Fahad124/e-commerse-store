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
    ?>
          <div class="col-6 col-md-4 col-lg-3">
            <div class="product-card text-center border border-2 mb-4" style="height: 60vh; overflow: scroll; scrollbar-width: none;">
              <div class="product-image mb-3">
                <a href="product-detail.php?product=<?php echo $product['id']; ?>" class="text-decoration-none text-black">
                    <?php 
                    $imagequery = "SELECT * FROM product_images WHERE product_id = '" . $product['id'] . "' LIMIT 1";
                    $imageexe = mysqli_query($connect, $imagequery);
                    $images = mysqli_fetch_array($imageexe);
                    $image=$images['product_images'];
                    ?>
                  <img src="./admin/assets/images/products/thumbnails/<?php echo $image; ?>" class="img-fluid w-100 h-100" alt="">
                </a>
              </div>
    
              <div class="d-flex align-items-center justify-content-between px-1">
                <p class="product-price">Rs. <?php echo $product['price']; ?></p>
                <?php
                if (isset($_SESSION['email'])) {
                  echo '<button class="btn btn-outline-dark w-50 mb-3 text-uppercase">Add to Cart</button>';
                } else {
                  echo '<button class="btn btn-outline-dark w-50 mb-3 text-uppercase" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">Add to Cart</button>';
                }
                ?>
              </div>
    
              <a href="product-detail.php?product=<?php echo $product['id']; ?>" class="text-decoration-none text-black">
                <h5 class="product-title fw-bold mb-3"><?php echo $product['title']; ?></h5>
              </a>
    
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