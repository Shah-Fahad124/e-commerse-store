<?php
require './process/connection.php';
function seedData($conn) {
    $password = md5('admin');
    $sql = "INSERT INTO users (name, email, password, status) VALUES 
            ('Admin', 'admin@admin.com', '$password', '1')";
    
    if (mysqli_query($conn, $sql)) {
        echo "Data seeded successfully.";
    } else {
        echo "Error seeding data: " . mysqli_error($conn);
    }
}

seedData($connect);
mysqli_close($connect);

?>