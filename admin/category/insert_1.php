<?php
require './../process/connection.php';

if (isset($_POST['category']) && $_POST['category'] == 'insert') {

    $name = $_POST['name'];
    $description = $_POST['description'];
    $created_by = $_SESSION['ADMINID'];

    $query = "INSERT INTO categories SET
             name='$name'  ,
             description = '$description',
             created_by = '$created_by'";
    $exe = mysqli_query($connect, $query);
    if ($exe) {
        header('location:./../manage_category.php?success');
        exit();
    } else {
        header('location:./../manage_category.php?error');
        exit();
    }
}
