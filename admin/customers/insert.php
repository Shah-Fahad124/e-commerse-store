<?php
require './../process/connection.php';

if (isset($_POST['customers']) && $_POST['customers'] == 'insert') {
    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];

    $sql1 = "INSERT INTO customers (name, email, address) VALUES ('$name', '$email', '$address')";
    if ($connect->query($sql1) !== TRUE) {
        echo "Error: " . $sql1 . "<br>" . $connect->error;
    } else {
        header("Location:./../manage_customers.php");
        exit();
    }

    $connect->close();
}
?>