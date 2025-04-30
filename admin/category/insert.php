<?php
require './../process/connection.php';
// session_start();

// 🔧 Compress Function
function compressImage($source, $destination, $quality) {
    $info = getimagesize($source);
    if ($info['mime'] == 'image/jpeg') {
        $image = imagecreatefromjpeg($source);
    } elseif ($info['mime'] == 'image/png') {
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
    if ($info['mime'] == 'image/jpeg') {
        $source = imagecreatefromjpeg($src);
    } elseif ($info['mime'] == 'image/png') {
        $source = imagecreatefrompng($src);
    } else {
        return false;
    }

    imagecopyresampled($thumb, $source, 0, 0, 0, 0, $targetWidth, $targetHeight, $width, $height);
    imagejpeg($thumb, $dest, 80); // 80% quality
    imagedestroy($thumb);
    imagedestroy($source);
}

if (isset($_POST['category']) && $_POST['category'] == 'insert') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $created_by = $_SESSION['ADMINID'];

    $uploadDir = '../assets/images/categories/original/';
    $thumbDir = '../assets/images/categories/thumbnails/';
    if (!file_exists($uploadDir)) mkdir($uploadDir, 0777, true);
    if (!file_exists($thumbDir)) mkdir($thumbDir, 0777, true);

    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $imageName = time() . '_' . basename($_FILES['image']['name']);
        $imageTmp = $_FILES['image']['tmp_name'];

        // Save compressed image
        $compressedPath = $uploadDir . $imageName;
        compressImage($imageTmp, $compressedPath, 75);

        // Save thumbnail
        $thumbPath = $thumbDir . $imageName;
        createThumbnail($imageTmp, $thumbPath, 300, 300);

        // Save to database
        $query = "INSERT INTO categories SET
                 name='$name',
                 description='$description',
                 image='$imageName',
                 created_by='$created_by'";

        $exe = mysqli_query($connect, $query);

        if ($exe) {
            header('location:./../manage_category.php?success');
            exit();
        } else {
            header('location:./../manage_category.php?error');
            exit();
        }
    } else {
        header('location:./../manage_category.php?error=noimage');
        exit();
    }
}
?>
