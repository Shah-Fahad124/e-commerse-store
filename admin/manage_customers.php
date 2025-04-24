<?php require './process/connection.php'; ?>
<?php require './process/security.php'; ?>
<?php
if (isset($_GET['search'])) {
    $search = $_GET['search'];
    $query = "SELECT * FROM customers WHERE name LIKE '%$search%'
                OR email LIKE '%$search%'
                OR address LIKE '%$search%'";
    $exe = mysqli_query($connect, $query);
    $customers = [];
    while ($fetch = mysqli_fetch_array($exe)) {
        $customers[] = $fetch;
    }
} else {
    $query = "SELECT * FROM customers
    ";
    $exe = mysqli_query($connect, $query);
    $customers = [];
    while ($fetch = mysqli_fetch_array($exe)) {
        $customers[] = $fetch;
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
                <h4 class="page-title">Customers</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#" class="text-light-color">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Customers</li>
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
                                    <h4>Customers</h4>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <form action="">
                                                <input type="search" name="search" class="form-control" placeholder="Search...">
                                            </form>
                                            <a href="manage_customers.php"><i class="fa fa-refresh"></i></a>
                                        </div>
                                        <div class="col-md-4">
                                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#addcustomer">Add</button>
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
                                        <th>Email</th>
                                        <th>Address</th>
                                        <th>Action</th>

                                    </tr>
                                    <?php $index = 1;
                                    foreach ($customers as $customer) : ?>
                                        <tr>
                                            <td><?php echo $index; ?></td>
                                            <td><?php echo $customer['name']; ?></td>
                                            <td><?php echo $customer['email']; ?></td>
                                            <td><?php echo $customer['address']; ?></td>
                                            <td>
                                                <a href="./customers/delete.php?id=<?php echo $customer['id']; ?>">
                                                    <button class="btn btn-danger" onclick="return confirm('are you sure want to delete this record')">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </a>
                                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#editcustomer_<?php echo $customer['id']; ?>">
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
<div class="modal fade" id="addcustomer" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="example-Modal3">Add New Customer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="./customers/insert.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="name" class="form-control-label">Name:</label>
                        <input type="text" name="name" class="form-control" id="title" required>
                    </div>
                    <div class="form-group">
                        <label for="email" class="form-control-label">Emial:</label>
                        <input type="email" name="email" class="form-control" required id="price">
                    </div>
                    <div class="form-group">
                        <label for="address" class="form-control-label">Address:</label>
                        <textarea name="address" class="form-control"></textarea>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="close" class="btn btn-success" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Add Customer</button>
            </div>
            <input type="hidden" name="customers" value="insert">
            </form>
        </div>
    </div>
</div>
<!-- add brand Modal -->

<?php foreach ($customers as $customer) : ?>
    <!-- edit brand Modal -->
    <div class="modal fade" id="editcustomer_<?php echo $customer['id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="example-Modal3">Edit <?php echo $customer['name']; ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="./customers/update.php" method="post">
                        <div class="form-group">
                            <label for="name" class="form-control-label">Name:</label>
                            <input type="text" name="name" value="<?php echo $customer['name']; ?>" class="form-control" id="title" required>
                        </div>
                        <div class="form-group">
                            <label for="email" class="form-control-label">Email:</label>
                            <input type="email" name="email" value="<?php echo $customer['email']; ?>" class="form-control" required id="price">
                        </div>
                        <div class="form-group mb-0">
                            <label for="address" class="form-control-label">Address:</label>
                            <textarea class="form-control" name="address" id="description"><?php echo $customer['address']; ?></textarea>
                        </div>
                        <div class="form-group mb-0">
                            <label for="shipping_address" class="form-control-label">Shipping Address:</label>
                            <textarea class="form-control" name="shipping_address" id="description"><?php echo $customer['shipping_address']; ?></textarea>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="close" class="btn btn-success" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update Customer</button>
                </div>
                <input type="hidden" name="customers" value="update">
                <input type="hidden" name="id" value="<?php echo $customer['id']; ?>">
                </form>
            </div>
        </div>
    </div>
    <!-- edit brand Modal -->
<?php endforeach; ?>

<?php require './include/footer.php'; ?>