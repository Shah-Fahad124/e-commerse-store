<?php
require './../process/connection.php';

if (isset($_POST['products']) && $_POST['products'] == 'images') {

    $productId = $_POST['id'];
    $created_by = $_SESSION['ADMINID'];
    $photos = $_FILES['images'];

    $originalDir = '../assets/images/products/original/';
    $thumbDir = '../assets/images/products/thumbnails/';

    if (!file_exists($originalDir)) mkdir($originalDir, 0777, true);
    if (!file_exists($thumbDir)) mkdir($thumbDir, 0777, true);

    for ($i = 0; $i < count($photos['name']); $i++) {
        $tmp_name = $photos['tmp_name'][$i];
        $originalName = time() . '_' . basename($photos['name'][$i]);

        $originalPath = $originalDir . $originalName;
        $thumbPath = $thumbDir . $originalName;

        // Compress and save original
        compressImage($tmp_name, $originalPath, 75);

        // Create and save thumbnail
        createThumbnail($tmp_name, $thumbPath, 300, 300);

        // Insert into database
        $sql = "INSERT INTO product_images (product_id, product_images) VALUES ('$productId', '$originalName')";
        $execute = mysqli_query($connect, $sql);
    }

    if ($execute) {
        header('location:./../manage_products.php?success');
        exit();
    } else {
        header('location:./../manage_products.php?error');
        exit();
    }
}

// 🔧 Compress Function
function compressImage($source, $destination, $quality = 75) {
    $info = getimagesize($source);
    if ($info['mime'] === 'image/jpeg') {
        $image = imagecreatefromjpeg($source);
    } elseif ($info['mime'] === 'image/png') {
        $image = imagecreatefrompng($source);
    } else {
        return false;
    }
    imagejpeg($image, $destination, $quality);
    imagedestroy($image);
}

// 🖼️ Thumbnail Function
function createThumbnail($src, $dest, $targetWidth, $targetHeight) {
    $info = getimagesize($src);
    list($width, $height) = $info;

    $thumb = imagecreatetruecolor($targetWidth, $targetHeight);

    if ($info['mime'] === 'image/jpeg') {
        $source = imagecreatefromjpeg($src);
    } elseif ($info['mime'] === 'image/png') {
        $source = imagecreatefrompng($src);
    } else {
        return false;
    }

    imagecopyresampled($thumb, $source, 0, 0, 0, 0, $targetWidth, $targetHeight, $width, $height);
    imagejpeg($thumb, $dest, 80);
    imagedestroy($thumb);
    imagedestroy($source);
}
?>
