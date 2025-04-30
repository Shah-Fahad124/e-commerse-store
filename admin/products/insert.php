<?php
// require './../process/connection.php';

// if (isset($_POST['products']) && $_POST['products'] == 'insert') {

//     $title = $_POST['title'];
//     $description = $_POST['description'];
//     $price = $_POST['price'];
//     $quantity = $_POST['quantity'];
//     $category = $_POST['category'];
//     $brand = $_POST['brand'];
//     $size = $_POST['size'];
//     $color = $_POST['color'];
//     $condition = $_POST['condition'];
//     $created_by = $_SESSION['ADMINID'];

//         $imageName = $_FILES['image']['name'];
//         $imageSize = $_FILES['image']['size'];
//         $imageType = $_FILES['image']['type'];
//         $imageTamp = $_FILES['image']['tmp_name'];
//         $upload = move_uploaded_file($imageTamp, "./../assets/images/products/$imageName");
        

//     $query = "INSERT INTO products SET
//              title='$title'  ,
//              description = '$description',
//              image = '$imageName',
//              price = '$price',
//              fee = '$fee',
//              quantity = '$quantity',
//              size = '$size',
//              color = '$color',
//              conditions = '$condition',
//              category_id = '$category',
//              brand_id = '$brand',
//              created_by = '$created_by'";
//     $exe = mysqli_query($connect, $query);
//     if ($exe) {
//         header('location:./../manage_products.php?success');
//         exit();
//     } else {
//         header('location:./../manage_products.php?error');
//         exit();
//     }
// }

require './../process/connection.php';

if (isset($_POST['products']) && $_POST['products'] == 'insert') {

    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    // $fee = $_POST['fee']; // You forgot to fetch fee before
    $quantity = $_POST['quantity'];
    $category = $_POST['category'];
    $brand = $_POST['brand'];
    $size = $_POST['size'];
    $color = $_POST['color'];
    $featured = $_POST['featured'];
    $condition = $_POST['condition'];
    $created_by = $_SESSION['ADMINID'];

    $query = "INSERT INTO products SET
             title='$title',
             description='$description',
             price='$price',
             quantity='$quantity',
             size='$size',
             color='$color',
             conditions='$condition',
              featured='$featured',
             category_id='$category',
             brand_id='$brand',
             created_by='$created_by'"; 

    $exe = mysqli_query($connect, $query);
    $product_id = mysqli_insert_id($connect); // get the newly inserted product id

    if ($exe && isset($_FILES['image'])) {
      
        $uploadDir = '../assets/images/products/original/';
        $thumbDir = '../assets/images/products/thumbnails/';
        if (!file_exists($uploadDir)) mkdir($uploadDir, 0777, true);
        if (!file_exists($thumbDir)) mkdir($thumbDir, 0777, true);
        foreach ($_FILES['image']['tmp_name'] as $key => $tmp_name) {
            $imageName = time() . '_' . basename($_FILES['image']['name'][$key]);
            $imageTmp = $_FILES['image']['tmp_name'][$key];

            // Compress and save original
            $compressedPath = $uploadDir . $imageName;
            compressImage($imageTmp, $compressedPath, 75); // compress with 75% quality

            // Create thumbnail
            $thumbPath = $thumbDir . $imageName;
            createThumbnail($imageTmp, $thumbPath, 300, 300); // 300x300 thumbnail
            // Save image record in database (assuming you have product_images table)
            mysqli_query($connect, "INSERT INTO product_images (product_id, product_images) VALUES ('$product_id', '$imageName')");
        }

        header('location:./../manage_products.php?success');
        exit();
    } else {
        header('location:./../manage_products.php?error');
        exit();
    }
}

// 🔧 Compress Function
function compressImage($source, $destination, $quality) {
    $info = getimagesize($source);
    if ($info['mime'] == 'image/jpeg') $image = imagecreatefromjpeg($source);
    elseif ($info['mime'] == 'image/png') $image = imagecreatefrompng($source);
    else return false;

    imagejpeg($image, $destination, $quality);
    imagedestroy($image);
}

// 🖼️ Thumbnail Function
function createThumbnail($src, $dest, $targetWidth, $targetHeight) {
    $info = getimagesize($src);
    list($width, $height) = $info;

    $thumb = imagecreatetruecolor($targetWidth, $targetHeight);
    if ($info['mime'] == 'image/jpeg') $source = imagecreatefromjpeg($src);
    elseif ($info['mime'] == 'image/png') $source = imagecreatefrompng($src);
    else return false;

    imagecopyresampled($thumb, $source, 0, 0, 0, 0, $targetWidth, $targetHeight, $width, $height);
    imagejpeg($thumb, $dest, 80); // 80% quality
    imagedestroy($thumb);
    imagedestroy($source);
}
?>

