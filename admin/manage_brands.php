<?php require './process/connection.php'; ?>
<?php require './process/security.php'; ?>
<?php
if (isset($_GET['search'])) {
    $search = $_GET['search'];
    $query = "SELECT * FROM brands WHERE name LIKE '%$search%'
                OR description LIKE '%$search%'
                OR created_by LIKE '%$search%'";
    $exe = mysqli_query($connect, $query);
    $brands = [];
    while ($fetch = mysqli_fetch_array($exe)) {
        $brands[] = $fetch;
    }
} else {
    $query = "SELECT * FROM brands";
    $exe = mysqli_query($connect, $query);
    $brands = [];
    while ($fetch = mysqli_fetch_array($exe)) {
        $brands[] = $fetch;
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
                <h4 class="page-title">Brands</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#" class="text-light-color">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Brands</li>
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
                                    <h4>Brands</h4>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <form action="">
                                                <input type="search" name="search" class="form-control" placeholder="Search...">
                                            </form>
                                            <a href="manage_brands.php"><i class="fa fa-refresh"></i></a>
                                        </div>
                                        <div class="col-md-4">
                                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#addBrands">Add Brand</button>
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
                                    foreach ($brands as $brand) : ?>
                                        <tr>
                                            <td><?php echo $index; ?></td>
                                            <td><?php echo $brand['name']; ?></td>
                                            <td><?php echo $brand['description']; ?></td>
                                            <td>
                                                <?php if ($brand['created_by'] == $_SESSION['ADMINID']) : ?>
                                                    <?php echo $_SESSION['ADMINNAME']; ?>
                                                <?php else : ?>
                                                    <?php echo "GUEST"; ?>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <a href="./brands/delete.php?id=<?php echo $brand['id']; ?>">
                                                    <button class="btn btn-danger" onclick="return confirm('are you sure want to delete this record')">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </a>
                                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#editBrands_<?php echo $brand['id']; ?>">
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
<div class="modal fade" id="addBrands" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="example-Modal3">Add New Brand</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="./brands/insert.php" method="post">
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
                <button type="submit" class="btn btn-primary">Add Brand</button>
            </div>
            <input type="hidden" name="brands" value="insert">
            </form>
        </div>
    </div>
</div>
<!-- add brand Modal -->

<?php foreach ($brands as $brand) : ?>
    <!-- edit brand Modal -->
    <div class="modal fade" id="editBrands_<?php echo $brand['id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="example-Modal3">Edit <?php echo $brand['name']; ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="./brands/update.php" method="post">
                        <div class="form-group">
                            <label for="name" class="form-control-label">Name:</label>
                            <input type="text" name="name" value="<?php echo $brand['name']; ?>" class="form-control" id="name" required>
                        </div>
                        <div class="form-group mb-0">
                            <label for="description" class="form-control-label">Description:</label>
                            <textarea class="form-control" name="description" id="description"><?php echo $brand['description']; ?></textarea>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="close" class="btn btn-success" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update Brand</button>
                </div>
                <input type="hidden" name="brands" value="update">
                <input type="hidden" name="id" value="<?php echo $brand['id']; ?>">
                </form>
            </div>
        </div>
    </div>
    <!-- edit brand Modal -->
<?php endforeach; ?>

<?php require './include/footer.php'; ?>