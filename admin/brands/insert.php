<?php
require './../process/connection.php';

if (isset($_POST['brands']) && $_POST['brands'] == 'insert') {

    $name = $_POST['name'];
    $description = $_POST['description'];
    $created_by = $_SESSION['ADMINID'];

    $query = "INSERT INTO brands SET
             name='$name'  ,
             description = '$description',
             created_by = '$created_by'";
    $exe = mysqli_query($connect, $query);
    if ($exe) {
        header('location:./../manage_brands.php?success');
        exit();
    } else {
        header('location:./../manage_brands.php?error');
        exit();
    }
}
