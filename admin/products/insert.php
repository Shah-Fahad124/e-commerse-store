<?php
require './../process/connection.php';

if (isset($_POST['products']) && $_POST['products'] == 'insert') {

    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $category = $_POST['category'];
    $brand = $_POST['brand'];
    $size = $_POST['size'];
    $color = $_POST['color'];
    $condition = $_POST['condition'];
    $created_by = $_SESSION['ADMINID'];

        $imageName = $_FILES['image']['name'];
        $imageSize = $_FILES['image']['size'];
        $imageType = $_FILES['image']['type'];
        $imageTamp = $_FILES['image']['tmp_name'];
        $upload = move_uploaded_file($imageTamp, "./../assets/images/products/$imageName");
        

    $query = "INSERT INTO products SET
             title='$title'  ,
             description = '$description',
             image = '$imageName',
             price = '$price',
             quantity = '$quantity',
             size = '$size',
             color = '$color',
             conditions = '$condition',
             category_id = '$category',
             brand_id = '$brand',
             created_by = '$created_by'";
    $exe = mysqli_query($connect, $query);
    if ($exe) {
        header('location:./../manage_products.php?success');
        exit();
    } else {
        header('location:./../manage_products.php?error');
        exit();
    }
}
