<?php require './process/connection.php'; ?>
<?php require './process/security.php'; ?>
<?php

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $status = $_GET['status'];
    if ($status == 'pending') {
        $query = "UPDATE orders SET status = 'complete' WHERE id = '$id'";
        $exe = mysqli_query($connect, $query);
    } elseif ($status == 'complete') {
        $query = "UPDATE orders SET status = 'cancel' WHERE id = '$id'";
        $exe = mysqli_query($connect, $query);
    } else {
        $query = "UPDATE orders SET status = 'pending' WHERE id = '$id'";
        $exe = mysqli_query($connect, $query);
    }
}
if (isset($_GET['search'])) {
    $search = $_GET['search'];
    $query = "SELECT orders.*, products.title AS product, 
    customers.name AS customer, 
    customers.shipping_address AS address  
    FROM orders
    LEFT JOIN products ON products.id = orders.product_id
    LEFT JOIN customers ON customers.id = orders.customer_id
    WHERE orders.status = 'complete'
    AND (products.title LIKE '%$search%'
    OR products.id LIKE '%$search%'
    OR products.price LIKE '%$search%'
    OR orders.quantity LIKE '%$search%'
    OR customers.name LIKE '%$search%'
    OR orders.status LIKE '%$search%')
    ";
    $exe = mysqli_query($connect, $query);
    $orders = [];
    while ($fetch = mysqli_fetch_array($exe)) {
        $orders[] = $fetch;
    }
} else {
    $query = "SELECT orders.*, products.title AS product, 
    customers.name AS customer, 
    customers.shipping_address AS address  
    FROM orders
    LEFT JOIN products ON products.id = orders.product_id
    LEFT JOIN customers ON customers.id = orders.customer_id
    WHERE orders.status = 'complete'";
    $exe = mysqli_query($connect, $query);
    $orders = [];
    while ($fetch = mysqli_fetch_array($exe)) {
        $orders[] = $fetch;
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
                <h4 class="page-title">Complete Orders</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#" class="text-light-color">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Complete Orders</li>
                </ol>
            </div>
            <!--page-header closed-->
            <!--row open-->
            <div class="row">

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="col-md-10">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h4>Complete Orders</h4>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <form action="">
                                                    <input type="search" name="search" class="form-control" placeholder="Search...">
                                                </form>
                                            </div>
                                            <div class="col-md-4">
                                                <a href="complete_orders.php"><i class="fa fa-refresh"></i></a>
                                            </div>
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
                                        <th>Customer name</th>
                                        <th>Product ID</th>
                                        <th>Product</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total price</th>
                                        <th>Payment method</th>
                                        <th>Status</th>
                                        <th>Action</th>

                                    </tr>
                                    <?php $index = 1;
                                    foreach ($orders as $order) : ?>
                                        <tr>
                                            <td><?php echo $index; ?></td>
                                            <td><?php echo $order['customer']; ?></td>
                                            <td><?php echo $order['product_id']; ?></td>
                                            <td><?php echo $order['product']; ?></td>
                                            <td><?php echo $order['price']; ?></td>
                                            <td><?php echo $order['quantity']; ?></td>
                                            <td><?php echo $order['total_price']; ?></td>
                                            <td><?php echo $order['payment_method']; ?></td>
                                            <td>
                                                <?php if ($order['status'] == 'pending') { ?>
                                                    <a href="./complete_orders.php?id=<?php echo $order['id']; ?>&&status=<?php echo $order['status']; ?>">
                                                        <span class="badge badge-orange">Pending</span>
                                                    </a>
                                                <?php } elseif ($order['status'] == 'cancel') { ?>
                                                    <a href="./complete_orders.php?id=<?php echo $order['id']; ?>&&status=<?php echo $order['status']; ?>">
                                                        <span class="badge badge-danger">Cancel</span>
                                                    </a>
                                                <?php } else { ?>
                                                    <a href="./complete_orders.php?id=<?php echo $order['id']; ?>&&status=<?php echo $order['status']; ?>">
                                                        <span class="badge badge-success">Delivered</span>
                                                    </a>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <a href="./orders/delete.php?id=<?php echo $order['id']; ?>">
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
    </div>
    <!--row closed-->

    </section>
</div>
<!--app-content closed-->

</div>


<?php require './include/footer.php'; ?>