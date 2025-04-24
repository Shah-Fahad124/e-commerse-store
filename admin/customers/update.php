<?php
require './../process/connection.php';

if (isset($_POST['customers']) && $_POST['customers'] == 'update') {
    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $shipping_address = $_POST['shipping_address'];
    $id = $_POST['id'];

    $sql1 = "UPDATE customers SET 
    name = '$name', 
    email = '$email', 
    address = '$address',
    shipping_address = '$shipping_address'
    WHERE id = '$id'
    ";
    if ($connect->query($sql1) !== TRUE) {
        echo "Error: " . $sql1 . "<br>" . $connect->error;
    } else {
        header("Location:./../manage_customers.php");
        exit();
    }

    $connect->close();
}
?>