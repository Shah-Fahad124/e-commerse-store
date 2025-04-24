<?php 
include "../admin/process/connection.php";
// login process
if (isset($_POST['user']) && $_POST['user'] == 'login') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hashed_password = md5($password);
  
    $query = "SELECT * FROM users WHERE email='$email'  
                  AND password = '$hashed_password' 
                  AND status = '0'
                  ";
    $login = mysqli_query($connect, $query);
    $number = mysqli_num_rows($login);
    if ($number > 0) {
      $User = mysqli_fetch_array($login);
      $_SESSION['email'] = $User['email'];
      $_SESSION['USERNAME'] = $User['name'];
      header('location:../index.php?success');
      exit();
    } else {
      header('location:../index.php?error');
      exit();
    }
  }
?>