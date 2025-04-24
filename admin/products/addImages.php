<?php
require './../process/connection.php';

if (isset($_POST['products']) && $_POST['products'] == 'images') {

    $productId = $_POST['id'];
    $created_by = $_SESSION['ADMINID'];

    $photo = $_FILES['images'];

    for ($i = 0; $i < count($photo['name']); $i++) {
		$tmp_name = $photo['tmp_name'][$i];
		$name = basename($photo['name'][$i]);
		$path = "./../assets/images/products/$name";
		if (move_uploaded_file($tmp_name, $path)) {
			$sql = "INSERT INTO product_images (product_id, product_images, created_by) VALUES ('$productId', '$name', '$created_by')";
			$execute = mysqli_query($connect, $sql);
	
		}
	}
      
    if ($execute) {
        header('location:./../manage_products.php?success');
        exit();
    } else {
        header('location:./../manage_products.php?error');
        exit();
    }
}
