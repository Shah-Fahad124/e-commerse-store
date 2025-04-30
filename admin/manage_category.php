<?php require './process/connection.php'; ?>
<?php require './process/security.php'; ?>
<?php
if (isset($_GET['search'])) {
    $search = $_GET['search'];
    $query = "SELECT * FROM categories WHERE name LIKE '%$search%'
                OR description LIKE '%$search%'
                OR created_by LIKE '%$search%'";
    $exe = mysqli_query($connect, $query);
    $categorys = [];
    while ($fetch = mysqli_fetch_array($exe)) {
        $categorys[] = $fetch;
    }
} else {
    $query = "SELECT * FROM categories";
    $exe = mysqli_query($connect, $query);
    $categorys = [];
    while ($fetch = mysqli_fetch_array($exe)) {
        $categorys[] = $fetch;
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
                <h4 class="page-title">Categories</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="home.php" class="text-light-color">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Categories</li>
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
                                    <h4>Categories</h4>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <form action="">
                                                <input type="search" name="search" class="form-control" placeholder="Search...">
                                            </form>
                                            <a href="manage_category.php"><i class="fa fa-refresh"></i></a>
                                        </div>
                                        <div class="col-md-4">
                                            <button type="button" class="btn btn-info w-100" data-toggle="modal" data-target="#addcategory">Add New Category</button>
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
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Created by</th>
                                        <th>Action</th>

                                    </tr>
                                    <?php $index = 1;
                                    foreach ($categorys as $category) : ?>
                                        <tr>
                                            <td><?php echo $index; ?></td>
                                            <td><?php echo $category['name']; ?></td>
                                            <td><?php echo $category['description']; ?></td>
                                            <td>
                                                <?php if ($category['created_by'] == $_SESSION['ADMINID']) : ?>
                                                    <?php echo $_SESSION['ADMINNAME']; ?>
                                                <?php else : ?>
                                                    <?php echo "GUEST"; ?>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <a href="./category/delete.php?id=<?php echo $category['id']; ?>">
                                                    <button class="btn btn-danger" onclick="return confirm('are you sure want to delete this record')">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </a>
                                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#editcategory_<?php echo $category['id']; ?>">
                                                    <i class="fa fa-edit"></i>
                                                </button>
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
<div class="modal fade" id="addcategory" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="example-Modal3">Add New Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="./category/insert.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                        <label for="name" class="form-control-label">Image: ( jpg,jpeg,png )</label>
                        <input type="file" name="image" class="form-control" id="name" required>
                    </div>
                    <div class="form-group">
                        <label for="name" class="form-control-label">Name:</label>
                        <input type="text" name="name" class="form-control" id="name" required>
                    </div>
                    <div class="form-group mb-0">
                        <label for="description" class="form-control-label">Description:</label>
                        <textarea class="form-control" name="description" id="description"></textarea>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="close" class="btn btn-success" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Add Category</button>
            </div>
            <input type="hidden" name="category" value="insert">
    </form>
        </div>
    </div>
</div>
<!-- add brand Modal -->

<?php foreach ($categorys as $category) : ?>
    <!-- edit brand Modal -->
    <div class="modal fade" id="editcategory_<?php echo $category['id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="example-Modal3">Edit <?php echo $category['name']; ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="./category/update.php" method="post">
                        <div class="form-group">
                            <label for="name" class="form-control-label">Name:</label>
                            <input type="text" name="name" value="<?php echo $category['name']; ?>" class="form-control" id="name" required>
                        </div>
                        <div class="form-group mb-0">
                            <label for="description" class="form-control-label">Description:</label>
                            <textarea class="form-control" name="description" id="description"><?php echo $category['description']; ?></textarea>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="close" class="btn btn-success" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update Brand</button>
                </div>
                <input type="hidden" name="category" value="update">
                <input type="hidden" name="id" value="<?php echo $category['id']; ?>">
                </form>
            </div>
        </div>
    </div>
    <!-- edit brand Modal -->
<?php endforeach; ?>

<?php require './include/footer.php'; ?>