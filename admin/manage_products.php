<?php require './process/connection.php'; ?>
<?php require './process/security.php'; ?>
<?php
if (isset($_GET['search'])) {
    $search = $_GET['search'];
    $query = "SELECT products.*, categories.name as category, brands.name as brand  
    FROM products
    LEFT JOIN categories ON categories.id = products.category_id
    LEFT JOIN brands ON brands.id = products.brand_id
    WHERE products.title LIKE '%$search%'
    OR products.price LIKE '%$search%'
    OR products.quantity LIKE '%$search%'
    OR categories.name LIKE '%$search%'
    OR brands.name LIKE '%$search%'
    ";
    $exe = mysqli_query($connect, $query);
    $products = [];
    while ($fetch = mysqli_fetch_array($exe)) {
        $products[] = $fetch;
    }
} else {
    $query = "SELECT products.*, categories.name as category, brands.name as brand
    FROM products
    inner JOIN categories ON categories.id = products.category_id
    inner JOIN brands ON brands.id = products.brand_id
    ";
    $exe = mysqli_query($connect, $query);
    $products = [];
    while ($fetch = mysqli_fetch_array($exe)) {
        $products[] = $fetch;
    }
}
?>

<?php require './include/head.php'; ?>



<div class="main-wrapper">

    <?php require './include/nav.php'; ?>

    <?php require './include/aside.php'; ?>

    <!--app-content open-->
    <div class="app-content">
        <section class="section">

            <!--page-header open-->
            <div class="page-header pt-0">
                <h4 class="page-title">Products</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#" class="text-light-color">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Products</li>
                </ol>
            </div>
            <!--page-header closed-->
            <!--row open-->
            <div class="row">

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4>Products</h4>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <form action="">
                                                <input type="search" name="search" class="form-control" placeholder="Search...">
                                            </form>
                                            <a href="manage_products.php"><i class="fa fa-refresh"></i></a>
                                        </div>
                                        <div class="col-md-4">
                                            <button type="button" class="btn btn-info w-100" data-toggle="modal" data-target="#addproducts">Add new product</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered mb-0 text-nowrap">
                                    <tr class="bg-primary">
                                        <th>#</th>
                                        <th>Title</th>
                                        <th class="d-none">Description</th>
                                        <th>Images</th>
                                        <th>Price</th>

                                        <th class="d-none">Quantity</th>
                                        <th class="d-none">Category</th>
                                        <th class="d-none">Brand</th>
                                        <th>Created by</th>
                                        <th>Action</th>

                                    </tr>
                                    <?php $index = 1;
                                    foreach ($products as $product) : ?>
                                        <tr>
                                            <td><?php echo $index; ?></td>
                                            <td><?php echo $product['title']; ?></td>
                                            <td class="d-none"><?php echo $product['description']; ?></td>
                                            <td>
                                                <?php
                                                $query = "select product_images from product_images where product_id ='" . $product['id'] . "'";
                                                $ex = mysqli_query($connect, $query);
                                                while ($image = mysqli_fetch_array($ex)) {

                                                ?>
                                                    <img src="./assets/images/products/thumbnails/<?php echo $image['product_images']; ?>" class="img-fluid" alt="no-img" height="40" width="30">
                                                <?php } ?>
                                            </td>
                                            <td><?php echo $product['price']; ?></td>
                                            <td class="d-none"><?php echo $product['quantity']; ?></td>
                                            <td class="d-none"><?php echo $product['category']; ?></td>
                                            <td class="d-none"><?php echo $product['brand']; ?></td>
                                            <td>
                                                <?php if ($product['created_by'] == $_SESSION['ADMINID']) : ?>
                                                    <?php echo $_SESSION['ADMINNAME']; ?>
                                                <?php else : ?>
                                                    <?php echo "GUEST"; ?>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#viewproducts_<?php echo $product['id']; ?>">
                                                    <i class="fa fa-eye"></i>
                                                </button>

                                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#editproducts_<?php echo $product['id']; ?>">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#addProductImages_<?php echo $product['id']; ?>">
                                                    Add more images
                                                </button>
                                                <a href="./products/delete.php?id=<?php echo $product['id']; ?>">
                                                    <button class="btn btn-danger" onclick="return confirm('are you sure want to delete this record')">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php $index++;
                                    endforeach; ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--row closed-->

        </section>
    </div>
    <!--app-content closed-->

</div>


<!-- add brand Modal -->
<div class="modal fade" id="addproducts" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="example-Modal3">Add New Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="./products/insert.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                        <label for="image" class="form-control-label">Image: ( jpg,jpeg,png )</label>
                        <input type="file" name="image[]" class="form-control" multiple accept="image/*">
                    </div>
                    
                    <div class="form-group">
                        <label for="title" class="form-control-label">Title:</label>
                        <input type="text" name="title" class="form-control" id="title" required>
                    </div>
                    <div class="form-group">
                        <label for="description" class="form-control-label">Description:</label>
                        <textarea class="form-control" name="description" id="description"></textarea>
                    </div>                  

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="price" class="form-control-label">Price:</label>
                                <input type="number" name="price" class="form-control" required id="price">
                            </div>
                        </div>

                        <!-- <div class="col-md-4">
                            <div class="form-group">
                                <label for="price" class="form-control-label">Fee:</label>
                                <input type="number" name="fee" class="form-control" required id="price">
                            </div>
                        </div> -->

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="quantity" class="form-control-label">Quantity:</label>
                                <input type="number" name="quantity" class="form-control" id="quantity">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="size" class="form-control-label">Size:</label>
                                <input type="text" name="size" class="form-control" id="size">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="color" class="form-control-label">Color:</label>
                                <input type="text" name="color" class="form-control" id="color">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="condition" class="form-control-label">Condition:</label>
                                <input type="text" name="condition" class="form-control" id="condition">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="featured" class="form-control-label">Featured Product:</label>
                                <select name="featured" class="form-control" id="featured">
                                    <option value="0">No</option>
                                    <option value="1">Yes</option>
                                </select>
                            </div>
                        </div>
                    </div>
             

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="category" class="form-control-label">Category:</label>
                                <select name="category" class="form-control">
                                    <option value="">Select Category</option>
                                    <?php
                                    $query = "SELECT * FROM categories";
                                    $exe = mysqli_query($connect, $query);
                                    while ($fetch = mysqli_fetch_array($exe)) {
                                    ?>
                                        <option value="<?php echo $fetch['id']; ?>"><?php echo $fetch['name']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="brand" class="form-control-label">Brand:</label>
                                <select name="brand" class="form-control">
                                    <option value="">Select Category</option>
                                    <?php
                                    $query = "SELECT * FROM brands";
                                    $exe = mysqli_query($connect, $query);
                                    while ($fetch = mysqli_fetch_array($exe)) {
                                    ?>
                                        <option value="<?php echo $fetch['id']; ?>"><?php echo $fetch['name']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="close" class="btn btn-success" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Add Product</button>
            </div>
            <input type="hidden" name="products" value="insert">
            </form>
        </div>
    </div>
</div>
<!-- add brand Modal -->

<?php foreach ($products as $product) : ?>
    <!-- edit brand Modal -->
    <div class="modal fade" id="editproducts_<?php echo $product['id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="example-Modal3">Edit <?php echo $product['title']; ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="./products/update.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="title" class="form-control-label">Title:</label>
                            <input type="text" name="title" value="<?php echo $product['title']; ?>" class="form-control" id="title" required>
                        </div>
                        <div class="form-group mb-0">
                            <label for="description" class="form-control-label">Description:</label>
                            <textarea class="form-control" name="description" id="description"><?php echo $product['description']; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="image" class="form-control-label">Image:</label>
                            <input type="file" name="image" class="form-control" id="image">
                            <img src="./assets/images/products/<?php echo $product['image']; ?>" class="img-thumbnail" width="10%" alt="">
                            <input type="hidden" name="newimage" value="<?php echo $product['image']; ?>">
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="price" class="form-control-label">Price:</label>
                                    <input type="number" name="price" value="<?php echo $product['price']; ?>" class="form-control" required id="price">
                                </div>
                            </div>

                            <!-- <div class="col-md-4">
                            <div class="form-group">
                                <label for="price" class="form-control-label">Fee:</label>
                                <input type="number" name="fee" class="form-control" value="<?php echo $product['fee']; ?>" required id="price">
                            </div> -->
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="quantity" class="form-control-label">Quantity:</label>
                                <input type="number" name="quantity" value="<?php echo $product['quantity']; ?>" class="form-control" id="quantity">
                            </div>
                        </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="size" class="form-control-label">Size:</label>
                            <input type="text" name="size" value="<?php echo $product['size']; ?>" class="form-control" id="size">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="color" class="form-control-label">Color:</label>
                            <input type="text" name="color" value="<?php echo $product['color']; ?>" class="form-control" id="color">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="condition" class="form-control-label">Condition:</label>
                            <input type="text" name="condition" value="<?php echo $product['conditions']; ?>" class="form-control" id="condition">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="category" class="form-control-label">Category:</label>
                            <select name="category" class="form-control">
                                <option value="">Select Category</option>
                                <?php
                                $query = "SELECT * FROM categories";
                                $exe = mysqli_query($connect, $query);
                                while ($fetch = mysqli_fetch_array($exe)) {
                                ?>
                                    <option value="<?php echo $fetch['id']; ?>" <?php echo ($fetch['id'] == $product['category_id']) ? 'selected' : ''; ?>><?php echo $fetch['name']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="brand" class="form-control-label">Brand:</label>
                            <select name="brand" class="form-control">
                                <option value="">Select Brand</option>
                                <?php
                                $query = "SELECT * FROM brands";
                                $exe = mysqli_query($connect, $query);
                                while ($fetch = mysqli_fetch_array($exe)) {
                                ?>
                                    <option value="<?php echo $fetch['id']; ?>" <?php echo ($fetch['id'] == $product['brand_id']) ? 'selected' : ''; ?>><?php echo $fetch['name']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="close" class="btn btn-success" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update Product</button>
            </div>
            <input type="hidden" name="products" value="update">
            <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
            </form>
        </div>
    </div>
    </div>
    <!-- edit brand Modal -->
<?php endforeach; ?>


<?php foreach ($products as $product) : ?>
    <div class="modal fade" id="viewproducts_<?php echo $product['id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="example-Modal3">Details of <?php echo $product['title']; ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-bordered mb-0 text-nowrap">
                            <tr>
                                <th>Title</th>
                                <td><?php echo $product['title']; ?></td>
                            </tr>
                            <tr>
                                <th>Description</th>
                                <td><?php echo $product['description']; ?></td>
                            </tr>
                            <tr>
                                <th>Image</th>
                                <td>
                                    <img src="./assets/images/products/<?php echo $product['image']; ?>" width="50" class="img-fluid" alt="no-img">
                                </td>
                            </tr>
                            <tr>
                                <th>Price</th>
                                <td><?php echo $product['price']; ?></td>
                            </tr>

                            <tr>
                                <th>Fee</th>
                                <td><?php echo $product['fee']; ?></td>
                            </tr>

                            <tr>
                                <th>Quantity</th>
                                <td><?php echo $product['quantity']; ?></td>
                            </tr>
                            <tr>
                                <th>Size</th>
                                <td><?php echo $product['size']; ?></td>
                            </tr>
                            <tr>
                                <th>Condition</th>
                                <td><?php echo $product['conditions']; ?></td>
                            </tr>
                            <tr>
                                <th>Color</th>
                                <td><?php echo $product['color']; ?></td>
                            </tr>
                            <tr>
                                <th>Category</th>
                                <td><?php echo $product['category']; ?></td>
                            </tr>
                            <tr>
                                <th>Brand</th>
                                <td><?php echo $product['brand']; ?></td>
                            </tr>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<?php foreach ($products as $product) : ?>
    <div class="modal fade" id="addProductImages_<?php echo $product['id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="example-Modal3">Add images for <?php echo $product['title']; ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <?php
                        $images = "SELECT * FROM product_images WHERE product_id = " . $product['id'];
                        $imgquery = mysqli_query($connect, $images);
                        ?>
                        <?php while ($imgfetch = mysqli_fetch_array($imgquery)) { ?>
                            <div class="col-md-4 position-relative">
                                <img src="./assets/images/products/<?php echo $imgfetch['product_images']; ?>" width="50%" alt="">
                                <a href="./products/deleteImages.php?id=<?php echo $imgfetch['id']; ?>" class="text text-danger text-decoration-none font-weight-bolder position-absolute top-0 end-0">X</a>
                            </div>
                        <?php } ?>
                    </div>
                    <form action="./products/addImages.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="images" class="form-control-label">Images:</label>
                            <input type="file" name="images[]" multiple class="form-control" required>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="close" class="btn btn-success" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
                <input type="hidden" name="products" value="images">
                <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<?php require './include/footer.php'; ?>