<?php
session_start();
include 'koneksi.php';

error_reporting(0);


if (isset($_SESSION['username'])) {
  header("Location: login.php");
}

if (isset($_POST['submit'])) {
  $nama_lengkap = $_POST['nama_lengkap'];
  $username = $_POST['username'];
  $password = $_POST['password'];
  $role = 2;
  $query = mysqli_query($conn, "INSERT INTO user (id, nama_lengkap, username, password, role) VALUES (NULL,'$nama_lengkap','$username','$password','$role')");

  if ($query) {
    function alertWindow($msg)
    {
      echo "<script type ='text/JavaScript'>";
      echo "alert('$msg')";
      echo "</script>";
    }

    alertWindow("Pendaftaran Berhasil, Silahkan Login");
    echo '<script>window.location="login.php"</script>';
  }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta http-equiv="Content-Language" content="en" />
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
  <meta name="description" content="This is an example dashboard created using build-in elements and components." />
  <meta name="msapplication-tap-highlight" content="no" />

  <link href="css/style.css" rel="stylesheet" />
</head>

<body>
  <div class="main">
    <section class="signup">
      <div class="container">
        <div class="signup-content">
          <div class="signup-form">
            <h2 class="form-title">Daftar Akun</h2>
            <form method="POST" class="register-form" id="register-form">
              <div class="form-group">
                <label for="nama_lengkap"><i class="zmdi zmdi-account material-icons-name"></i></label>
                <input type="text" name="nama_lengkap" id="nama_lengkap" placeholder="Nama Lengkap" />
              </div>
              <div class="form-group">
                <label for="username"><i class="zmdi zmdi-email"></i></label>
                <input type="text" name="username" id="username" placeholder="Username" />
              </div>
              <div class="form-group">
                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                <input type="password" name="password" id="password" placeholder="Password" />
              </div>

              <div class="form-group form-button">
                <input type="submit" name="submit" id="submit" class="form-submit" value="Daftar" />
              </div>
            </form>
          </div>
          <div class="signup-image">
            <figure><img src="images/signup-image.jpg" alt="sing up image"></figure>
            <a href="login.php" class="signup-image-link">Sudah Punya Akun?</a>
          </div>
        </div>
      </div>
    </section>
  </div>
</body>

</html>