<?php
require './../process/connection.php';

if (isset($_GET['id'])) {

    $id = $_GET['id'];

    $query = "DELETE FROM products WHERE id = '$id'";
    $exe = mysqli_query($connect, $query);
    if ($exe) {
        header('location:./../manage_products.php?success');
        exit();
    } else {
        header('location:./../manage_products.php?error');
        exit();
    }
}
