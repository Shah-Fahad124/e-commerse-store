<?php
require './../process/connection.php';

if (isset($_POST['products']) && $_POST['products'] == 'update') {

    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];
     $fee = $_POST['fee'];
    $quantity = $_POST['quantity'];
    $category = $_POST['category'];
    $brand = $_POST['brand'];
    $size = $_POST['size'];
    $color = $_POST['color'];
    $condition = $_POST['condition'];
    $created_by = $_SESSION['ADMINID'];
    $id = $_POST['id'];
    if($_FILES['image']['name'] != "")
    {
        $imageName = $_FILES['image']['name'];
        $imageSize = $_FILES['image']['size'];
        $imageType = $_FILES['image']['type'];
        $imageTamp = $_FILES['image']['tmp_name'];
        $upload = move_uploaded_file($imageTamp, "./../assets/images/products/$imageName");
    }
    else
    {
        $imageName = $_POST['newimage'];
    }

    $query = "UPDATE products SET
             title='$title' ,
             description = '$description',
             image = '$imageName',
             price = '$price',
              fee = '$fee',
             quantity = '$quantity',
             size = '$size',
             color = '$color',
             conditions = '$condition',
             category_id = '$category',
             brand_id = '$brand',
             created_by = '$created_by'
             WHERE id = '$id'";
 
    $exe = mysqli_query($connect, $query);
    if ($exe) {
        header('location:./../manage_products.php?success');
        exit();
    } else {
        header('location:./../manage_products.php?error');
        exit();
    }
}
