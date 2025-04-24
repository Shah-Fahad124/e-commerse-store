<?php include './components/head.php' ?>
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
      <li class=""><a href="<?php echo $backURL; ?>" class="text-decoration-none btn btn-outline-danger px-4 py-1">Back</a></li>
      <!-- <li class=""><a href="shop.php" class="text-decoration-none text-dark">Shop</a></li>
        <li class=""><a href="cart.php" class="text-decoration-none text-dark">Cart</a></li> -->
    </ol>

  </div>

  <!-- Product Detail Section -->
  <section class="container py-2">
    <div class="row">
      <!-- Product Images -->
      <div class="col-lg-6">
        <div class="product-img-container" id="productImgContainer">
          <div class="zoom-lens" id="zoomLens"></div>
          <img src="./admin/assets/images/products/<?php echo $productDetails["image"]?>" alt="Leather Bag" id="productImg" class="main-product-img">
        </div>
        <div class="product-thumbnails">
          <div class="thumbnail active">
            <img src="./images/bag2.jpeg" alt="Thumbnail 1" onclick="changeImage('./images/bag2.jpeg', this)">
          </div>
          <div class="thumbnail">
            <img src="./images/bag.jpeg" alt="Thumbnail 2" onclick="changeImage('./images/bag.jpeg', this)">
          </div>
          <div class="thumbnail">
            <img src="./images/download1.jpeg" alt="Thumbnail 3" onclick="changeImage('./images/download1.jpeg', this)">
          </div>
          <div class="thumbnail">
            <img src="./images/download2.jpeg" alt="Thumbnail 4" onclick="changeImage('./images/download2.jpeg', this)">
          </div>
        </div>
      </div>

      <!-- Product Info -->
      <div class="col-lg-6">
        <div class="product-info ps-lg-4 mt-4 mt-lg-0">
          <h1 class="product-title"><?php echo $productDetails["title"]?></h1>
          <!-- <div class="d-flex align-items-center mb-3">
            <div class="me-3">
              <i class="bi bi-star-fill text-warning"></i>
              <i class="bi bi-star-fill text-warning"></i>
              <i class="bi bi-star-fill text-warning"></i>
              <i class="bi bi-star-fill text-warning"></i>
              <i class="bi bi-star-half text-warning"></i>
            </div>
            <span class="text-muted">(24 reviews)</span>
          </div> -->
          <p class="product-price"><?php echo $productDetails["price"]?>
           <!-- <span class="text-decoration-line-through text-muted fs-5 ms-2">Rs.5,990</span> -->
          </p>
          <p class="product-description">
          <?php echo $productDetails["description"]?>
          </p>

          <!-- <div class="mb-4">
            <h6 class="fw-bold mb-2">Available Colors:</h6>
            <div class="d-flex gap-2">
              <div class="color-option bg-dark border rounded-circle p-3" data-color="Black"></div>
              <div class="color-option bg-danger border rounded-circle p-3" data-color="Red"></div>
              <div class="color-option bg-secondary border rounded-circle p-3" data-color="Gray"></div>
              <div class="color-option bg-warning border rounded-circle p-3" data-color="Brown"></div>
            </div>
          </div> -->

          <div class="quantity-selector">
            <button onclick="decrementQuantity()">-</button>
            <input type="number" id="quantity" value="1" min="1" max="10">
            <button onclick="incrementQuantity()">+</button>
          </div>

          <div class="d-flex justify-content-end gap-2 mb-4">
            <button class="btn btn-outline-danger ">Add to Cart</button>
            <!-- <button class="btn btn-danger px-4">Buy Now</button>
            <button class="btn btn-outline-dark px-3">
              <i class="bi bi-heart"></i>
            </button> -->
          </div>

          <div class="product-meta">
            <!-- <p><span>SKU:</span> BG-1234</p> -->
             <?php
              $query="SELECT * FROM categories WHERE id = ".$productDetails["category_id"];
              $result=mysqli_query($connect,$query);
              $category=mysqli_fetch_assoc($result);
              $categoryName=$category["name"];
             ?>
            <p class="text-capitalize"><span>Category:</span> <?php echo $categoryName?></p>
            <p><span>Tags:</span> Leather, Premium, Fashion</p>
            <p><span>Availability:</span> <span class="text-success">In Stock</span> (12 items)</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Product Details Tabs -->
  <section class="container pb-5 pt-3">
    <!-- <ul class="nav nav-tabs" id="productTabs" role="tablist">
      <li class="nav-item" role="presentation">
        <button class="nav-link active" id="description-tab" data-bs-toggle="tab" data-bs-target="#description" type="button" role="tab" aria-selected="true">Description</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="specifications-tab" data-bs-toggle="tab" data-bs-target="#specifications" type="button" role="tab" aria-selected="false">Specifications</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="reviews-tab" data-bs-toggle="tab" data-bs-target="#reviews" type="button" role="tab" aria-selected="false">Reviews (24)</button>
      </li>
    </ul> -->
    <div class="tab-content p-3 border mt-2" id="productTabsContent">
      <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
        <h4 class="mb-3">Product Description</h4>
        <p>This premium leather bag is designed for the modern individual who values both style and functionality. Crafted from genuine leather, it offers exceptional durability and a luxurious feel that improves with age.</p>
        <p>The bag features a spacious main compartment that can easily accommodate your daily essentials, including a laptop up to 15 inches. Multiple interior pockets help keep your belongings organized, while the exterior pocket provides quick access to frequently used items.</p>
        <p>The adjustable shoulder strap ensures comfortable carrying, and the sturdy handles offer an alternative carrying option. The bag's elegant design makes it versatile enough for both casual outings and professional settings.</p>
        <p>Each bag is meticulously handcrafted by skilled artisans, ensuring attention to detail and superior quality. The premium hardware adds a touch of sophistication and enhances the bag's durability.</p>
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
      <div class="col-6 col-md-3">
        <div class="related-product">
          <div class="product-image">
            <img src="./images/bag.jpeg" alt="Related Product">
            <span class="position-absolute top-0 start-0 bg-danger text-white px-2 py-1 m-2">- 15%</span>
          </div>
          <h5>Leather Messenger Bag</h5>
          <p class="price">Rs.3,990</p>
        </div>
      </div>

      <!-- Related Product 2 -->
      <div class="col-6 col-md-3">
        <div class="related-product">
          <div class="product-image">
            <img src="./images/download1.jpeg" alt="Related Product">
          </div>
          <h5>Canvas Backpack</h5>
          <p class="price">Rs.2,490</p>
        </div>
      </div>

      <!-- Related Product 3 -->
      <div class="col-6 col-md-3">
        <div class="related-product">
          <div class="product-image">
            <img src="./images/download2.jpeg" alt="Related Product">
            <span class="position-absolute top-0 start-0 bg-danger text-white px-2 py-1 m-2">New</span>
          </div>
          <h5>Travel Duffel Bag</h5>
          <p class="price">Rs.5,990</p>
        </div>
      </div>

      <!-- Related Product 4 -->
      <div class="col-6 col-md-3">
        <div class="related-product">
          <div class="product-image">
            <img src="./images/download3.jpeg" alt="Related Product">
          </div>
          <h5>Laptop Sleeve</h5>
          <p class="price">Rs.1,990</p>
        </div>
      </div>
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