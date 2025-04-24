<?php 
include_once '../process/connection.php';
// registration process
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];
    $alreadyExists = "select * from users where email='$email'";
    $execute = mysqli_query($connect, $alreadyExists);
    $count = mysqli_num_rows($execute);
    if ($count > 0) {
      echo '<script>
                  toaster("warning","Email already exists", "Please use another email")
                  </script>';
    } else {
      if ($password !== $confirm_password) {
        echo '<script>
                  toaster("warning","Password not matched", "Please check your password");               
                  </script>';
      } else {
        $hash_password =  md5($confirm_password);
        $query = "INSERT INTO users (name, email, password) VALUES ('$name','$email', '$hash_password')";
        $execute = mysqli_query($connect, $query);
        if ($execute) {
          $_SESSION['email'] = $email;
          $_SESSION['success'] = "registration successful";
          header("Location: ../index.php");
          exit();
        } else {
          $_SESSION['error'] = "registration failed";
            header("Location: ../index.php?error");
            exit();
        }
      }
    }
  }
?>