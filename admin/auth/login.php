<?php
require './../process/connection.php';

if (isset($_POST['admin']) && $_POST['admin'] == 'login') {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $hashed_password = md5($password);


    $query = "SELECT * FROM users WHERE email='$email'  
              AND password = '$hashed_password' 
              AND status = '1'
              ";
    $login = mysqli_query($connect, $query);
    $number = mysqli_num_rows($login);
    if ($number > 0) {
        $Admin = mysqli_fetch_array($login);

        $_SESSION['ADMINNAME'] = $Admin['name'];
        $_SESSION['ADMINID'] = $Admin['id'];

        header('location:./../home.php?success');
        exit();
    } else {
        header('location:./../index.php?error');
        exit();
    }
}
