<?php
require './../process/connection.php';

if (isset($_GET['id'])) {

    $id = $_GET['id'];

    $query = "DELETE FROM orders WHERE id = '$id'";
    $exe = mysqli_query($connect, $query);
    if ($exe) {
        header('location:./../manage_orders.php?success');
        exit();
    } else {
        header('location:./../manage_orders.php?error');
        exit();
    }
}
