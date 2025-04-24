<?php include './components/head.php' ?>
<!-- Add this CSS to enhance the design -->
<style>
    .product-card {
        transition: all 0.3s ease;
    }

    .product-card:hover {
        transform: translateY(-5px);
    }

    .product-actions {
        opacity: 0;
        transition: all 0.3s ease;
    }

    .product-card:hover .product-actions {
        opacity: 1;
    }

    .page-link:focus {
        box-shadow: none;
    }

    /* .form-range::-webkit-slider-thumb {
            background: #198754;
        }

        .form-range::-moz-range-thumb {
            background: #198754;
        }

        .form-range::-ms-thumb {
            background: #198754;
        } */

    .form-control:focus {
        box-shadow: 0 0 0 0.25rem rgba(238, 57, 75, 0.25);


    }

    .product-card:hover {
        border-bottom: 3px solid #dc3545 !important;
        border-radius: 0 !important;
    }
</style>

</head>

<body>
    <!-- navbar  -->
    <?php include "./components/header.php" ?>
    <!-- Hero navigation Section -->
    <?php include "./components/page-navigation.php";
    pageNav("Shop");
    ?>

    <!-- Product Section -->
    <div class="pt-4">
        <div class="container py-4">
            <div class="row mb-4">
                <div class="col-6">
                    <h2 class="fw-bold">
                        <span class="text-dark">All</span>
                        <span class="text-danger">PRODUCTS</span>
                    </h2>
                </div>
                <div class="col-6 text-end d-flex justify-content-end align-items-center">
                    <input type="search" class="form-control" placeholder="Search products..." aria-label="Search products" style="border: 1px solid #dc3545;">
                    <button class="btn btn-outline-danger ms-2" type="button" style="border: 1px solid #dc3545;">
                        <i class="bi bi-search"></i>
                    </button>
                </div>
            </div>

            <!-- Search and Sort -->
            <!-- <div class="row mb-4">
            <div class="col-md-6 mb-3 mb-md-0">
                <div class="input-group">
                    <input type="search" class="form-control" placeholder="Search products..." aria-label="Search products">
                    <button class="btn btn-outline-success" type="button">
                        <i class="bi bi-search"></i>
                    </button>
                </div>
            </div>
            <div class="col-md-6">
                <div class="input-group bg-light rounded p-2">
                    <label class="input-group-text bg-transparent border-0">Default Sorting:</label>
                    <select class="form-select border-0 bg-transparent">
                        <option value="default">Nothing</option>
                        <option value="popularity">Popularity</option>
                        <option value="organic">Organic</option>
                        <option value="fantastic">Fantastic</option>
                    </select>
                </div>
            </div>
        </div> -->

            <div class="row">
                <!-- Sidebar -->
                <div class="col-lg-3">
                    <!-- Categories -->
                    <div class="card shadow-sm mb-4">
                        <div class="card-body">
                            <h4 class="card-title fw-bold mb-3">Categories</h4>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item border-0 px-0 py-2">
                                    <a href="#" class="d-flex justify-content-between align-items-center text-decoration-none text-dark">
                                        <span><i class="bi bi-apple text-success me-2"></i>Apples</span>
                                        <span class="badge bg-light text-dark rounded-pill">3</span>
                                    </a>
                                </li>
                                <li class="list-group-item border-0 px-0 py-2">
                                    <a href="#" class="d-flex justify-content-between align-items-center text-decoration-none text-dark">
                                        <span><i class="bi bi-apple text-success me-2"></i>Oranges</span>
                                        <span class="badge bg-light text-dark rounded-pill">5</span>
                                    </a>
                                </li>
                                <li class="list-group-item border-0 px-0 py-2">
                                    <a href="#" class="d-flex justify-content-between align-items-center text-decoration-none text-dark">
                                        <span><i class="bi bi-apple text-success me-2"></i>Strawberry</span>
                                        <span class="badge bg-light text-dark rounded-pill">2</span>
                                    </a>
                                </li>
                                <li class="list-group-item border-0 px-0 py-2">
                                    <a href="#" class="d-flex justify-content-between align-items-center text-decoration-none text-dark">
                                        <span><i class="bi bi-apple text-success me-2"></i>Banana</span>
                                        <span class="badge bg-light text-dark rounded-pill">8</span>
                                    </a>
                                </li>
                                <li class="list-group-item border-0 px-0 py-2">
                                    <a href="#" class="d-flex justify-content-between align-items-center text-decoration-none text-dark">
                                        <span><i class="bi bi-apple text-success me-2"></i>Pumpkin</span>
                                        <span class="badge bg-light text-dark rounded-pill">5</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Price Range -->
                    <!-- <div class="card shadow-sm mb-4">
                    <div class="card-body">
                        <h4 class="card-title fw-bold mb-3">Price</h4>
                        <div class="mb-3">
                            <input type="range" class="form-range" min="0" max="500" id="priceRange" oninput="this.nextElementSibling.querySelector('output').value = this.value">
                            <div class="d-flex justify-content-between align-items-center mt-2">
                                <span class="text-muted">$0</span>
                                <div class="badge bg-light text-dark"><output>0</output></div>
                                <span class="text-muted">$500</span>
                            </div>
                        </div>
                    </div>
                </div> -->

                    <!-- Additional Filters -->
                    <div class="card shadow-sm mb-4">
                        <div class="card-body">
                            <h4 class="card-title fw-bold mb-3">Additional</h4>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="radio" name="filter" id="organic">
                                <label class="form-check-label" for="organic">Organic</label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="radio" name="filter" id="fresh">
                                <label class="form-check-label" for="fresh">Fresh</label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="radio" name="filter" id="sales">
                                <label class="form-check-label" for="sales">Sales</label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="radio" name="filter" id="discount">
                                <label class="form-check-label" for="discount">Discount</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="filter" id="expired">
                                <label class="form-check-label" for="expired">Expired</label>
                            </div>
                        </div>
                    </div>

                    <!-- Featured Products -->
                    <div class="card shadow-sm mb-4">
                        <div class="card-body">
                            <h4 class="card-title fw-bold mb-3">Featured Products</h4>

                            <!-- Featured Product 1 -->
                            <div class="d-flex mb-3">
                                <div class="flex-shrink-0">
                                    <img src="https://images.unsplash.com/photo-1571771894821-ce9b6c11b08e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1160&q=80"
                                        alt="Banana" class="img-fluid rounded" style="width: 80px; height: 80px; object-fit: cover;">
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6 class="fw-bold mb-1">Big Banana</h6>
                                    <div class="text-warning mb-1">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star"></i>
                                    </div>
                                    <div>
                                        <span class="fw-bold text-success me-2">$2.99</span>
                                        <span class="text-muted text-decoration-line-through">$4.11</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Featured Product 2 -->
                            <div class="d-flex mb-3">
                                <div class="flex-shrink-0">
                                    <img src="https://images.unsplash.com/photo-1550258987-190a2d41a8ba?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1374&q=80"
                                        alt="Strawberries" class="img-fluid rounded" style="width: 80px; height: 80px; object-fit: cover;">
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6 class="fw-bold mb-1">Strawberries</h6>
                                    <div class="text-warning mb-1">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                    </div>
                                    <div>
                                        <span class="fw-bold text-success me-2">$3.99</span>
                                        <span class="text-muted text-decoration-line-through">$5.11</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Featured Product 3 -->
                            <div class="d-flex mb-3">
                                <div class="flex-shrink-0">
                                    <img src="https://images.unsplash.com/photo-1601493700631-2b16ec4b4716?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80"
                                        alt="Avocado" class="img-fluid rounded" style="width: 80px; height: 80px; object-fit: cover;">
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6 class="fw-bold mb-1">Fresh Avocado</h6>
                                    <div class="text-warning mb-1">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star"></i>
                                    </div>
                                    <div>
                                        <span class="fw-bold text-success me-2">$2.99</span>
                                        <span class="text-muted text-decoration-line-through">$4.11</span>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-3">
                                <a href="#" class="btn btn-outline-success w-100 rounded-pill">View More</a>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Product Grid -->
                <div class="col-lg-9">
                <?php
                          if (empty($products)) {
                            echo '<div class="text-center bg-danger p-2 fs-2 text-white rounded w-75 mx-auto">No Products Found</div>';
                        }else{  ?>
                    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                        <!-- Product 1 -->                                
                       <?php  foreach ($products as $product): ?>
                            <a href="product-detail.php?product=<?php echo $product["id"]?>" class="text-decoration-none text-dark">
                                <div class="card h-100 border-0 shadow-sm product-card">
                                    <div class="position-relative">
                                        <img src="./admin/assets/images/products/<?php echo $product["image"]?>"
                                            class="card-img-top" alt="Strawberries" style="height: 220px; object-fit: cover;">
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title fw-bold"><?php echo $product["title"]?></h5>
                                        <p class="card-text text-muted small"><?php echo $product["description"]?></p>
                                        <div class="d-flex justify-content-between align-items-center mt-3">
                                            <span class="fw-bold text-danger"><?php echo $product["price"]?></span>
                                            <button class="btn btn-outline-danger rounded-pill">
                                                <i class="bi bi-bag me-1"></i> Add to cart
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        <?php endforeach;  } ?>
                        
                        <!-- Product 2 -->
                        <!-- <a href="product-detail.php" class="text-decoration-none text-dark">
                            <div class="card h-100 border-0 shadow-sm product-card">
                                <div class="position-relative">
                                    <img src="./images/shoes.jpeg"
                                        class="card-img-top" alt="Strawberries" style="height: 220px; object-fit: cover;">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title fw-bold">Strawberries</h5>
                                    <p class="card-text text-muted small">Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
                                    <div class="d-flex justify-content-between align-items-center mt-3">
                                        <span class="fw-bold text-danger">$ 4.99</span>
                                        <button class="btn btn-outline-danger rounded-pill">
                                            <i class="bi bi-bag me-1"></i> Add to cart
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </a> -->


                        <!-- Product 3 -->
                        <!-- <a href="product-detail.php" class="text-decoration-none text-dark">
                            <div class="card h-100 border-0 shadow-sm product-card">
                                <div class="position-relative">
                                    <img src="./images/shoes.jpeg"
                                        class="card-img-top" alt="Strawberries" style="height: 220px; object-fit: cover;">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title fw-bold">Strawberries</h5>
                                    <p class="card-text text-muted small">Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
                                    <div class="d-flex justify-content-between align-items-center mt-3">
                                        <span class="fw-bold text-danger">$ 4.99</span>
                                        <button class="btn btn-outline-danger rounded-pill">
                                            <i class="bi bi-bag me-1"></i> Add to cart
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </a> -->
                        <!-- Product 4 -->
                        <!-- <a href="product-detail.php" class="text-decoration-none text-dark">
                            <div class="card h-100 border-0 shadow-sm product-card">
                                <div class="position-relative">
                                    <img src="./images/shoes.jpeg"
                                        class="card-img-top" alt="Strawberries" style="height: 220px; object-fit: cover;">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title fw-bold">Strawberries</h5>
                                    <p class="card-text text-muted small">Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
                                    <div class="d-flex justify-content-between align-items-center mt-3">
                                        <span class="fw-bold text-danger">$ 4.99</span>
                                        <button class="btn btn-outline-danger rounded-pill">
                                            <i class="bi bi-bag me-1"></i> Add to cart
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </a> -->

                        <!-- Product 5 -->
                        <!-- <a href="product-detail.php" class="text-decoration-none text-dark">
                            <div class="card h-100 border-0 shadow-sm product-card">
                                <div class="position-relative">
                                    <img src="./images/shoes.jpeg"
                                        class="card-img-top" alt="Strawberries" style="height: 220px; object-fit: cover;">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title fw-bold">Strawberries</h5>
                                    <p class="card-text text-muted small">Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
                                    <div class="d-flex justify-content-between align-items-center mt-3">
                                        <span class="fw-bold text-danger">$ 4.99</span>
                                        <button class="btn btn-outline-danger rounded-pill">
                                            <i class="bi bi-bag me-1"></i> Add to cart
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </a> -->
                        <!-- Product 5 -->
                        <!-- <a href="product-detail.php" class="text-decoration-none text-dark">
                            <div class="card h-100 border-0 shadow-sm product-card">
                                <div class="position-relative">
                                    <img src="./images/shoes.jpeg"
                                        class="card-img-top" alt="Strawberries" style="height: 220px; object-fit: cover;">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title fw-bold">Strawberries</h5>
                                    <p class="card-text text-muted small">Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
                                    <div class="d-flex justify-content-between align-items-center mt-3">
                                        <span class="fw-bold text-danger">$ 4.99</span>
                                        <button class="btn btn-outline-danger rounded-pill">
                                            <i class="bi bi-bag me-1"></i> Add to cart
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </a> -->
                        <!-- Product 5 -->
                        <!-- <a href="product-detail.php" class="text-decoration-none text-dark">
                            <div class="card h-100 border-0 shadow-sm product-card">
                                <div class="position-relative">
                                    <img src="./images/shoes.jpeg"
                                        class="card-img-top" alt="Strawberries" style="height: 220px; object-fit: cover;">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title fw-bold">Strawberries</h5>
                                    <p class="card-text text-muted small">Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
                                    <div class="d-flex justify-content-between align-items-center mt-3">
                                        <span class="fw-bold text-danger">$ 4.99</span>
                                        <button class="btn btn-outline-danger rounded-pill">
                                            <i class="bi bi-bag me-1"></i> Add to cart
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </a> -->
                        <!-- </div> -->
                        <!-- Product 6 -->
                        <!-- <a href="product-detail.php" class="text-decoration-none text-dark">
                            <div class="card h-100 border-0 shadow-sm product-card">
                                <div class="position-relative">
                                    <img src="./images/shoes.jpeg"
                                        class="card-img-top" alt="Strawberries" style="height: 220px; object-fit: cover;">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title fw-bold">Strawberries</h5>
                                    <p class="card-text text-muted small">Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
                                    <div class="d-flex justify-content-between align-items-center mt-3">
                                        <span class="fw-bold text-danger">$ 4.99</span>
                                        <button class="btn btn-outline-danger rounded-pill">
                                            <i class="bi bi-bag me-1"></i> Add to cart
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </a> -->

                        <!-- Pagination -->
                        <!-- <nav class="mt-5">
                        <ul class="pagination justify-content-center">
                            <li class="page-item">
                                <a class="page-link rounded-circle mx-1 text-success" href="#" aria-label="Previous">
                                    <i class="bi bi-chevron-left"></i>
                                </a>
                            </li>
                            <li class="page-item active"><a class="page-link rounded-circle mx-1 bg-success border-success" href="#">1</a></li>
                            <li class="page-item"><a class="page-link rounded-circle mx-1 text-success" href="#">2</a></li>
                            <li class="page-item"><a class="page-link rounded-circle mx-1 text-success" href="#">3</a></li>
                            <li class="page-item"><a class="page-link rounded-circle mx-1 text-success" href="#">4</a></li>
                            <li class="page-item"><a class="page-link rounded-circle mx-1 text-success" href="#">5</a></li>
                            <li class="page-item">
                                <a class="page-link rounded-circle mx-1 text-success" href="#" aria-label="Next">
                                    <i class="bi bi-chevron-right"></i>
                                </a>
                            </li>
                        </ul>
                    </nav> -->
                    </div>
                </div>
            </div>
        </div>


        <?php include "./components/footer.php" ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</body>

</html>