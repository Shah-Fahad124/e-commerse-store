<?php
include "./admin/process/connection.php";
include './components/head.php';
include "./components/header.php"
?>
<!-- Hero navigation Section -->
<?php include "./components/page-navigation.php";
pageNav("Shop");
?>



<!--********* Product title section *************** -->
<div class="pt-4">
    <div class="container-fluid py-4">
        <div class="row mb-4">
            <div class="col-6">
                <h2 class="fw-bold">
                    <span class="text-dark">All</span>
                    <?php
                    if (isset($_GET['category'])) {
                        $category_id = $_GET['category'];
                        $query = "SELECT * FROM products WHERE category_id = $category_id";
                        $category_id = $_GET['category'];
                        $categoryquery = "SELECT * FROM categories WHERE id = $category_id";
                        $execute = mysqli_query($connect, $categoryquery);
                        $category = mysqli_fetch_assoc($execute);
                        $categoryName = $category['name'];
                    }
                    ?>
                    <span class="text-danger text-capitalize"><?php echo $categoryName ?? "products" ?></span>
                </h2>
            </div>

            <!-- *************** search bar *********************  -->
            <div class="col-6 text-end d-flex justify-content-end align-items-center">
                <input type="search" class="form-control" id="searchInput" placeholder="Search products..." aria-label="Search products" style="border: 1px solid #dc3545;">
                <button class="btn btn-outline-danger ms-2" id="searchBtn" type="button" style="border: 1px solid #dc3545;">
                    <i class="bi bi-search"></i>
                </button>
            </div>

        </div>



        <div class="row">
            <!-- ************** Sidebar ****************-->
            <div class="col-lg-3">
                <!--******************* Categories Card *********************-->
                <div class="card shadow-sm mb-4">
                    <div class="card-body">
                        <h4 class="card-title fw-bold mb-3">Categories</h4>
                        <?php foreach ($categorys as $cateegory):
                            $cateegory_id = $cateegory["id"];
                            $productCountQuery = "SELECT COUNT(*) as count FROM products WHERE category_id = $cateegory_id";
                            $productCountResult = mysqli_query($connect, $productCountQuery);
                            $productCountData = mysqli_fetch_assoc($productCountResult);
                            $productCount = $productCountData['count'];
                        ?>
                            <div class="form-check mb-2">
                                <input class="form-check-input category-radio" type="radio" name="category_filter" value="<?php echo $cateegory_id; ?>" id="cat_<?php echo $cateegory_id; ?>">
                                <label class="form-check-label d-flex justify-content-between align-items-center w-100" for="cat_<?php echo $cateegory_id; ?>">
                                    <span><?php echo $cateegory["name"]; ?></span>
                                    <span class="badge bg-light text-dark rounded-pill"><?php echo $productCount; ?></span>
                                </label>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>


                <!--***************** Price Range card ************************* -->
                <div class="card shadow-sm mb-4">
                    <div class="card-body">
                        <h4 class="card-title fw-bold mb-3">Price</h4>
                        <form id="priceFilterForm">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="price_range" id="range1" value="0-500">
                                <label class="form-check-label" for="range1">Under 500</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="price_range" id="range2" value="500-1000">
                                <label class="form-check-label" for="range2">500 - 1000</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="price_range" id="range3" value="1000-2000">
                                <label class="form-check-label" for="range3">1000 - 2000</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="price_range" id="range4" value="2000-5000">
                                <label class="form-check-label" for="range4">2000 - 5000</label>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Additional Filters -->
                <!-- <div class="card shadow-sm mb-4">
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
                </div> -->

                <!-- Featured Products -->

                <div class="card shadow-sm mb-4">
                    <div class="card-body">
                        <h4 class="card-title fw-bold mb-3">
                            <?php
                            if (empty($featured)) {
                                echo '<span class="text-dark">Popular Picks</span>';
                                echo '<span class="text-danger"> For You</span>';
                            } else {
                                echo '<span class="text-dark">FEATURED</span>';
                                echo '<span class="text-danger"> PRODUCTS</span>';
                            }
                            ?>
                        </h4>

                        <!-- Featured Product 1 -->
                        <?php
                        $count = 0;
                        $productList = empty($featured) ? $randomProducts : $featured;
                        foreach ($productList as $product):
                            if ($count >= 4) break;
                            $imageQuery = "SELECT * FROM product_images WHERE product_id = '" . $product['id'] .                          "'";
                            $imageResult = mysqli_query($connect, $imageQuery);
                            $images = [];
                            while ($row = mysqli_fetch_array($imageResult)) {
                                $images[] = $row['product_images'];
                            }
                            $hasSecondImage = !empty($images[1]);
                            $count++;
                        ?>
                            <div class="d-flex mb-3">
                                <div class="flex-shrink-0">
                                    <div style="width: 70px;" class="custom-img-wrapper position-relative overflow-hidden <?php echo $hasSecondImage ? 'has-hover' : 'no-hover'; ?>">
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
                    
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6 class="fw-bold mb-1"><?php echo $product["title"]; ?></h6>
                                    <div class="text-warning mb-1">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star"></i>
                                    </div>
                                    <div>
                                        <span class="fw-bold text-success me-2">$<?php echo $product["price"]; ?></span>
                                        <span class="text-muted text-decoration-line-through">$<?php echo $product["price"]; ?></span>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        <!-- Featured Product 2 -->
                        <!-- <div class="d-flex mb-3">
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
                        </div> -->

                        <!-- <div class="mt-3">
                            <a href="#" class="btn btn-outline-success w-100 rounded-pill">View More</a>
                        </div> -->
                    </div>
                </div>

            </div>

            <!-- Product Grid -->
            <div class="col-lg-9">
                <?php
                if (empty($products)) {
                    echo '<div class="text-center bg-danger p-2 fs-2 text-white rounded w-75 mx-auto">No Products Found</div>';
                } else {  ?>
                    <div class="row row-cols-2 row-cols-md-3 row-cols-lg-3 g-4 ">
                        <!-- Product 1 -->
                        <?php foreach ($products as $product): ?>
                            <a href="product-detail.php?product=<?php echo $product["id"] ?>" class="text-decoration-none text-dark">
                                <div class="card h-100 border-0 shadow-sm  product-card overflow-hidden shopProductCard">
                                    <div class="position-relative mx-auto ImgParent">
                                        <?php
                                        $imageQuery = "SELECT * FROM product_images WHERE product_id = {$product['id']} LIMIT 1";
                                        $imageResult = mysqli_query($connect, $imageQuery);
                                        $images = mysqli_fetch_assoc($imageResult);
                                        $image = $images['product_images'];
                                        ?>
                                        <img src="./admin/assets/images/products/thumbnails/<?php echo $image ?>"
                                            class="card-img-top h-100 w-100" alt="Product Image">
                                    </div>
                                    <div class="card-body d-flex flex-column justify-content-between" style="height: 50%;">
                                        <div>
                                            <h5 class="card-title fw-bold"><?php echo $product["title"] ?></h5>
                                            <p class="card-text text-muted small"><?php echo $product["description"] ?></p>
                                        </div>

                                        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mt-2 mt-md-3">
                                            <span class="fw-md-bold text-danger"><?php echo $product["price"] ?></span>
                                            <button class="btn btn-outline-danger p-1 p-md-2">
                                                <i class="bi bi-bag me-1"></i> Add to cart
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </a>
                    <?php endforeach;
                    } ?>


                    </div>
            </div>
        </div>
    </div>


    <?php include "./components/footer.php" ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.category-radio').on('change', function() {
                let selectedCategory = $(this).val();
                let newUrl = window.location.pathname + '?category=' + selectedCategory;
                history.pushState(null, '', newUrl);

                $.ajax({
                    url: window.location.pathname,
                    method: 'GET',
                    data: {
                        category: selectedCategory
                    },
                    success: function(response) {
                        let productsHtml = $(response).find('.col-lg-9').html();
                        $('.col-lg-9').html(productsHtml);
                    }
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#searchBtn').on('click', function() {
                let searchValue = $('#searchInput').val().trim();

                if (searchValue === '') {
                    // Remove all query parameters (clean URL to 'shop.php')
                    const cleanUrl = window.location.pathname;
                    history.pushState(null, '', cleanUrl);

                    // AJAX Request to load all products
                    $.ajax({
                        url: cleanUrl,
                        type: 'GET',
                        success: function(response) {
                            const productsHtml = $(response).find('.col-lg-9').html();
                            $('.col-lg-9').html(productsHtml);
                        }
                    });
                } else {
                    // Update URL with search query
                    const newUrl = window.location.pathname + '?search=' + encodeURIComponent(searchValue);
                    history.pushState(null, '', newUrl);

                    // AJAX Request to load filtered products
                    $.ajax({
                        url: window.location.pathname,
                        type: 'GET',
                        data: {
                            search: searchValue
                        },
                        success: function(response) {
                            const productsHtml = $(response).find('.col-lg-9').html();
                            $('.col-lg-9').html(productsHtml);
                        }
                    });
                }
            });

            // Optional: Press Enter triggers search
            $('#searchInput').on('keypress', function(e) {
                if (e.which === 13) {
                    $('#searchBtn').click();
                }
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('input[name="price_range"]').on('change', function() {
                const priceRange = $(this).val();

                // Update URL without reloading the page
                const newUrl = window.location.pathname + '?price_range=' + encodeURIComponent(priceRange);
                history.pushState(null, '', newUrl);

                // Send AJAX request to filter products
                $.ajax({
                    url: window.location.pathname,
                    type: 'GET',
                    data: {
                        price_range: priceRange
                    },
                    success: function(response) {
                        const productsHtml = $(response).find('.col-lg-9').html();
                        $('.col-lg-9').html(productsHtml);
                    }
                });
            });
        });
    </script>

    </body>

    </html>