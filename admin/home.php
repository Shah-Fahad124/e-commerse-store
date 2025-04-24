<?php require './process/connection.php'; ?>
<?php require './process/security.php'; ?>
<?php require './include/head.php'; ?>

<?php 

$query1 = "SELECT *,COUNT(*) AS total_brands FROM brands";
    $exe1 = mysqli_query($connect, $query1);
    $res1 = mysqli_fetch_array($exe1);

    $query2 = "SELECT *,COUNT(*) AS total_categories FROM categories";
    $exe2 = mysqli_query($connect, $query2);
    $res2 = mysqli_fetch_array($exe2);

    $query3 = "SELECT *,COUNT(*) AS total_products FROM products";
    $exe3 = mysqli_query($connect, $query3);
    $res3 = mysqli_fetch_array($exe3);

    $query4 = "SELECT *,COUNT(*) AS total_orders FROM orders";
    $exe4 = mysqli_query($connect, $query4);
    $res4 = mysqli_fetch_array($exe4);

    $query5 = "SELECT *,COUNT(*) AS total_cancel_orders FROM orders WHERE status = 'cancel'";
    $exe5 = mysqli_query($connect, $query5);
    $res5 = mysqli_fetch_array($exe5);

    $query6 = "SELECT *,COUNT(*) AS total_pending_orders FROM orders WHERE status = 'pending'";
    $exe6 = mysqli_query($connect, $query6);
    $res6 = mysqli_fetch_array($exe6);

    $query7 = "SELECT *,COUNT(*) AS total_complete_orders FROM orders WHERE status = 'complete'";
    $exe7 = mysqli_query($connect, $query7);
    $res7 = mysqli_fetch_array($exe7);


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
    
    $query = "SELECT orders.*, products.title AS product, 
        customers.name AS customer, 
        customers.shipping_address AS address  
        FROM orders
        LEFT JOIN products ON products.id = orders.product_id
        LEFT JOIN customers ON customers.id = orders.customer_id
        ORDER BY orders.id DESC LIMIT 10";
    $exe = mysqli_query($connect, $query);
    $orders = [];
    while ($fetch = mysqli_fetch_array($exe)) {
        $orders[] = $fetch;
    }

?>

    <div class="main-wrapper">

        <?php require './include/nav.php'; ?>

        <?php require './include/aside.php'; ?>

        <!--app-content open-->
        <div class="app-content">
            <section class="section">

                <!--page-header open-->
                <div class="page-header pt-0">
                    <h4 class="page-title">Dashboard 01</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#" class="text-light-color">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Dashboard 01</li>
                    </ol>
                </div>
                <!--page-header closed-->

                <!--row open-->
                <div class="row">
                    <div class="col-lg-6 col-xl-3 col-md-6 col-12">
                        <div class="card">
                            <div class="card-body text-center">
                                <p class="text-muted mb-1">
                                    <a href="./manage_brands.php">Brands</a>
                                </p>
                                <div class="">
                                    <h4 class="mt-2 mb-3"><?php echo $res1['total_brands']; ?></h4>
                                    <div class="">
                                        <span class="sparkline_bar-1"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-3 col-md-6 col-12">
                        <div class="card">
                            <div class="card-body text-center">
                                <p class="text-muted mb-1">
                                    <a href="./manage_category.php">Categories</a>
                                </p>
                                <div class="">
                                    <h4 class="mt-2 mb-3"><?php echo $res2['total_categories']; ?></h4>
                                    <div class="">
                                        <span class="sparkline_pie"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-3 col-md-6 col-12">
                        <div class="card">
                            <div class="card-body text-center">
                                <p class="text-muted mb-1">
                                    <a href="./manage_products.php">Products</a>
                                </p>
                                <div class="">
                                    <h4 class="mt-2 mb-3"><?php echo $res3['total_products']; ?></h4>
                                    <div class="">
                                        <span class="sparkline_line1"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-3 col-md-6 col-12">
                        <div class="card">
                            <div class="card-body text-center">
                                <p class="text-muted mb-1">
                                    <a href="./manage_orders.php">Orders</a>
                                </p>
                                <div class="">
                                    <h4 class="mt-2 mb-3"><?php echo $res4['total_orders']; ?></h4>
                                    <div class="">
                                        <span class="sparkline_discreet"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-xl-3 col-md-6 col-12">
                        <div class="card">
                            <div class="card-body text-center">
                                <p class="text-muted mb-1">
                                    <a href="./cancel_orders.php">Cancel Orders</a>
                                </p>
                                <div class="">
                                    <h4 class="mt-2 mb-3"><?php echo $res5['total_cancel_orders']; ?></h4>
                                    <div class="">
                                        <span class="sparkline_discreet"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-xl-3 col-md-6 col-12">
                        <div class="card">
                            <div class="card-body text-center">
                                <p class="text-muted mb-1">
                                    <a href="./pending_orders.php">Pending Orders</a>
                                </p>
                                <div class="">
                                    <h4 class="mt-2 mb-3"><?php echo $res6['total_pending_orders']; ?></h4>
                                    <div class="">
                                        <span class="sparkline_discreet"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-3 col-md-6 col-12">
                        <div class="card">
                            <div class="card-body text-center">
                                <p class="text-muted mb-1">
                                    <a href="./complete_orders.php">Complete Orders</a>
                                </p>
                                <div class="">
                                    <h4 class="mt-2 mb-3"><?php echo $res7['total_complete_orders']; ?></h4>
                                    <div class="">
                                        <span class="sparkline_discreet"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--row open-->
                <div class="row">
                    <div class="col-12 col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Order Summary</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                <table class="table table-bordered mb-0 text-nowrap">
                                    <tr class="">
                                        <th>#</th>
                                        <th>Customer name</th>
                                        <th>Product ID</th>
                                        <th>Product</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total price</th>
                                        <th>Payment method</th>
                                        <th>Status</th>

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
                                                    <a href="./home.php?id=<?php echo $order['id']; ?>&&status=<?php echo $order['status']; ?>">
                                                        <span class="badge badge-orange">Pending</span>
                                                    </a>
                                                <?php } elseif ($order['status'] == 'cancel') { ?>
                                                    <a href="./home.php?id=<?php echo $order['id']; ?>&&status=<?php echo $order['status']; ?>">
                                                        <span class="badge badge-danger">Cancel</span>
                                                    </a>
                                                <?php } else { ?>
                                                    <a href="./home.php?id=<?php echo $order['id']; ?>&&status=<?php echo $order['status']; ?>">
                                                        <span class="badge badge-success">Delivered</span>
                                                    </a>
                                                <?php } ?>
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

<?php require './include/footer.php'; ?>