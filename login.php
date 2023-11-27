<?php
session_start();
include 'koneksi.php';
error_reporting(0);

if (isset($_SESSION['username'])) {
  header("Location: index.php");
}

if (isset($_POST['submit'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
  $result = mysqli_query($conn, $sql);
  if ($result->num_rows > 0) {
    $row = mysqli_fetch_assoc($result);
    $_SESSION['username'] = $row['username'];
    $_SESSION['id'] = $row['id'];
    $_SESSION['nama_lengkap'] = $row['nama_lengkap'];

    header("Location: index.php");
  } else {
    echo "<script>alert('Email atau password Anda salah. Silahkan coba lagi!')</script>";
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login</title>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
</head>
<body>
  <div class="main">
    <section class="sign-in">
      <div class="container">
        <div class="signin-content">
          <div class="signin-image">
            <figure><img src="images/signin-image.jpg" alt="sing up image"></figure>
            <a href="register.php" class="signup-image-link">Buat Akun Baru</a>
          </div>
          <div class="signin-form">
            <h2 class="form-title">Login</h2>
            <form method="POST" class="register-form" id="login-form">
              <div class="form-group">
                <label for="username"><i class="zmdi zmdi-account material-icons-name"></i></label>
                <input type="text" name="username" id="username" placeholder="User Name" />
              </div>
              <div class="form-group">
                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                <input type="password" name="password" id="password" placeholder="Password" />
              </div>
              <div class="form-group form-button">
                <input type="submit" name="submit" id="submit" class="form-submit" value="Log in" />
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
  </div>
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="js/main.js"></script>
</body>

</html>