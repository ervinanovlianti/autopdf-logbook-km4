<?php
session_start();
include 'koneksi.php';

if (isset($_POST['submit'])) {
  $tanggal = $_POST['tanggal'];
  $nama = $_POST['nama'];
  $id_user = $_SESSION['id'];
  $pertama = $_POST['pertama'];
  $kedua = $_POST['kedua'];
  $ketiga = $_POST['ketiga'];
  //variabel query adalah variabel yang menyimpan perintah sql dml
  $query = mysqli_query($conn, "INSERT INTO logbook_harian (id, id_user, tanggal, nama, pertama, kedua, ketiga) VALUES (NULL, $id_user, '$tanggal','$nama','$pertama','$kedua','$ketiga')");

  if ($query) {
    echo '<script>window.location="index.php"</script>';
  }
}
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

  <title>Logbook</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <section class="container">
      <a class="navbar-brand" href="#"><img src="images/logo-km.png" width="100px"></a>

      <ul class="navbar-nav ">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Harian</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">About</a>
        </li>
      </ul>
      <form class="d-flex">
        <a href="logout.php" class="btn btn-light" type="submit">Logout</a>
      </form>
    </section>

  </nav>
  <div class="container mt-2 mb-2">
    <h3>Tambah Logbook Baru</h3>
    <div class="card">
      <div class="card-body">
        <form action="" method="POST">
          <div class="position-relative form-group"><label>Tanggal Laporan</label>
            <input type="date" name="tanggal" class="form-control" required />
          </div>
          <div class=" position-relative form-group"><label>Nama Lengkap</label>
            <input name="nama" class="form-control" value="<?php echo  $_SESSION['nama_lengkap']  ?>" required />
          </div>
          <div class="position-relative form-group"><label>Jelaskan hal baik yang dilakukan oleh mahasiswa hari ini selama berada di sekolah!</label><textarea name="pertama" class="form-control" cols="40" rows="5" required></textarea></div>
          <div class="position-relative form-group"><label> Jelaskan tantangan yang dihadapi saat melakukan kegiatan di sekolah!
            </label><textarea name="kedua" class="form-control" cols="40" rows="5" required></textarea>
          </div>
          <div class="position-relative form-group"><label> Jelaskan pembelajaran yang didapatkan mahasiswa selama berada di
              sekolah hari ini!</label><textarea name="ketiga" class="form-control" cols="40" rows="5" required></textarea>
          </div>
          <button type="submit" name="submit" class="btn btn-primary mt-3">Submit</button>
        </form>
      </div>
    </div>

  </div>

  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>

</html>