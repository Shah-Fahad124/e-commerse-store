<?php
include "./admin/process/connection.php";
include './components/head.php'
?>
<!-- navbar  -->
<?php include "./components/header.php" ?>
<!-- custom CSS -->
<link rel="stylesheet" href="./assets/productdetail.css">

<!-- Breadcrumb -->
<?php
// $id = $_GET['id'];
// $ref = $_GET['ref'] ?? '';
// Get previous page URL
$backURL = $_SERVER['HTTP_REFERER'] ?? 'index.php';
?>

<div class="container mt-4">
  <ol class="d-flex list-unstyled gap-4">
    <a href="javascript:history.back()" class="text-decoration-none btn btn-outline-danger px-4 py-1">Back</a>
  </ol>
</div>


<!-- Product Detail Section -->
<section class="container py-2">
  <div class="row">
    <!-- Product Images -->
    <div class="col-lg-6">
      <div class="product-img-container" id="productImgContainer">
        <div class="zoom-lens" id="zoomLens"></div>

        <?php
        // Fetch ALL images of the product
        $imageQuery = "SELECT * FROM product_images WHERE product_id = {$productDetails['id']}";
        $imageResult = mysqli_query($connect, $imageQuery);

        // Fetch first image separately for the main image
        $firstImage = mysqli_fetch_assoc($imageResult);
        $detailImage = $firstImage['product_images'];
        ?>

        <img src="./admin/assets/images/products/original/<?php echo $detailImage ?>" alt="Product Image" id="productImg" class="main-product-img">
      </div>

      <div class="product-thumbnails">
        <?php
        // Display all thumbnails
        mysqli_data_seek($imageResult, 0); // Reset result pointer
        while ($thumb = mysqli_fetch_assoc($imageResult)) {
        ?>
          <div class="thumbnail">
            <img src="./admin/assets/images/products/original/<?php echo $thumb['product_images']; ?>" alt="Thumbnail" onclick="changeImage('./admin/assets/images/products/original/<?php echo $thumb['product_images']; ?>', this)">
          </div>
        <?php } ?>
      </div>
    </div>

    <!-- Product Info -->
    <div class="col-lg-6">
      <div class="product-info ps-lg-4 mt-4 mt-lg-0">
        <h1 class="product-title"><?php echo $productDetails["title"] ?></h1>
        <p class="product-price">Rs. <?php echo $productDetails["price"] ?></p>
        <p class="product-description">
          <?php echo $productDetails["description"] ?>
        </p>

        <div class="quantity-selector">
          <button onclick="decrementQuantity()">-</button>
          <input type="number" id="quantity" value="1" min="1" max="10">
          <button onclick="incrementQuantity()">+</button>
        </div>

        <?php
        // Example: Assuming you already have product data in $product array
        $productTitle = $productDetails['title'];
        $productPrice = $productDetails['price'];
        $productId = $productDetails['id']; // If you want to send ID too

        // Your WhatsApp number (admin number)
        $adminNumber = '923309520278'; // use without +, 92 is Pakistan code

        // Message to send (URL encoded)
        $message = urlencode("Hello, I want to order this product:\n\nProduct Name: $productTitle\nPrice: Rs.$productPrice\nProduct ID: $productId\nPlease guide me further.");

        // WhatsApp link
        $whatsappLink = "https://wa.me/$adminNumber?text=$message";
        ?>

        <!-- WhatsApp Order Button -->
        <div class="d-flex justify-content-end gap-2 mb-4">
        <a href="<?php echo $whatsappLink; ?>" target="_blank" class="btn btn-outline-danger">
          Order Now on WhatsApp
        </a>
        </div>

        <?php /* ?>
<div class="d-flex justify-content-end gap-2 mb-4">
  <?php if (isset($_SESSION['email'])) { ?>
    <button class="btn btn-outline-danger">Add to Cart</button>
  <?php } else { ?>
    <a href="auth/login.php" class="btn btn-outline-danger" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">Add to Cart</a>
  <?php } ?>
</div>
<?php */ ?>

        <div class="product-meta">
          <?php
          $query = "SELECT * FROM categories WHERE id = {$productDetails["category_id"]}";
          $result = mysqli_query($connect, $query);
          $category = mysqli_fetch_assoc($result);
          ?>
          <p class="text-capitalize"><span>Category:</span> <?php echo $category["name"]; ?></p>
          <p><span>Tags:</span> Leather, Premium, Fashion</p>
          <p><span>Availability:</span> <span class="text-success">In Stock</span> (12 items)</p>
        </div>
      </div>
    </div>
  </div>
</section>


<!-- Related Products -->
<section class="container pb-5">
  <h3 class="fw-bold mb-4">
    <span class="text-dark">Related</span>
    <span class="text-danger">Products</span>
  </h3>

  <div class="row">
    <!-- Related Product 1 -->
    <?php
    $query = "SELECT * FROM products WHERE category_id = " . $productDetails["category_id"] . " AND id != " . $productDetails["id"] . " LIMIT 4";
    $result = mysqli_query($connect, $query);
    $relatedProducts = [];
    while ($Products = mysqli_fetch_assoc($result)) {
      $relatedProducts[] = $Products;
    }
    if (empty($relatedProducts)) {
      echo "<h3 class='text-center'>No Related Products Found</h3>";
    } else {
      foreach ($relatedProducts as $relatedProduct):
    ?>

        <div class="col-6 col-md-3">
          <a class="text-decoration-none text-black" href="product-detail.php?product=<?php echo $relatedProduct["id"] ?>">
            <div class="related-product">
              <div class="product-image">
                <?php
                // Fetch the first image for the related product
                $relatedImageQuery = "SELECT * FROM product_images WHERE product_id = {$relatedProduct['id']}";
                $relatedImageResult = mysqli_query($connect, $relatedImageQuery);
                $relatedImage = mysqli_fetch_assoc($relatedImageResult);

                ?>
                <img src="./admin/assets/images/products/thumbnails/<?php echo $relatedImage["product_images"] ?>" alt="Related Product">
                <span class="position-absolute top-0 start-0 bg-danger text-white px-2 py-1 m-2">- 15%</span>
              </div>
              <h5><?php echo $relatedProduct["title"] ?></h5>
              <p class="price">Rs.<?php echo $relatedProduct["price"] ?></p>
            </div>
          </a>
        </div>
    <?php endforeach;
    } ?>

  </div>
</section>

<!-- Footer -->
<?php include "./components/footer.php" ?>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">

<!-- Custom JavaScript -->
<script>
  // Image Zoom Functionality
  const container = document.getElementById('productImgContainer');
  const img = document.getElementById('productImg');
  const lens = document.getElementById('zoomLens');

  container.addEventListener('mousemove', moveLens);
  container.addEventListener('mouseenter', showLens);
  container.addEventListener('mouseleave', hideLens);

  function moveLens(e) {
    const pos = getCursorPos(e);
    let x = pos.x - (lens.offsetWidth / 2);
    let y = pos.y - (lens.offsetHeight / 2);

    // Prevent lens from going outside the image
    if (x > container.offsetWidth - lens.offsetWidth) {
      x = container.offsetWidth - lens.offsetWidth;
    }
    if (x < 0) {
      x = 0;
    }
    if (y > container.offsetHeight - lens.offsetHeight) {
      y = container.offsetHeight - lens.offsetHeight;
    }
    if (y < 0) {
      y = 0;
    }

    // Set lens position
    lens.style.left = x + "px";
    lens.style.top = y + "px";

    // Calculate zoom ratio
    const cx = container.offsetWidth / lens.offsetWidth;
    const cy = container.offsetHeight / lens.offsetHeight;

    // Set background properties for the lens
    lens.style.backgroundImage = "url('" + img.src + "')";
    lens.style.backgroundSize = (container.offsetWidth * cx) + "px " + (container.offsetHeight * cy) + "px";
    lens.style.backgroundPosition = "-" + (x * cx) + "px -" + (y * cy) + "px";
  }

  function getCursorPos(e) {
    const rect = container.getBoundingClientRect();
    const x = e.pageX - rect.left - window.pageXOffset;
    const y = e.pageY - rect.top - window.pageYOffset;
    return {
      x,
      y
    };
  }

  function showLens() {
    lens.style.display = "block";
  }

  function hideLens() {
    lens.style.display = "none";
  }

  // Change main product image
  function changeImage(src, thumbnail) {
    document.getElementById('productImg').src = src;

    // Update active thumbnail
    const thumbnails = document.querySelectorAll('.thumbnail');
    thumbnails.forEach(item => {
      item.classList.remove('active');
    });
    thumbnail.parentElement.classList.add('active');
  }

  // Quantity selector
  function incrementQuantity() {
    const input = document.getElementById('quantity');
    const value = parseInt(input.value);
    if (value < parseInt(input.max)) {
      input.value = value + 1;
    }
  }

  function decrementQuantity() {
    const input = document.getElementById('quantity');
    const value = parseInt(input.value);
    if (value > parseInt(input.min)) {
      input.value = value - 1;
    }
  }
</script>
</body>

</html>