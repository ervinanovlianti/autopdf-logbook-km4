<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['nama_lengkap'])) {

    header("Location: login.php");
}

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <link rel="stylesheet" href="css/style-table.css">
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
    <div class="container mb-5">
        <h2>Selamat Datang, <?php echo $_SESSION['nama_lengkap'] ?></h2>
        <div class="row">
            <div class="col-md-12">
                <a class="btn btn-primary" href="tambah-logbook.php" role="button">Tambah Logbook</a>
                <div class="table-wrap">
                    <table class="table myaccordion table-hover" id="accordion">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">No.</th>
                                <th class="text-center">Tanggal</th>
                                <th class="text-center">Nama Lengkap</th>
                                <th class="text-center" colspan="2">Action</th>
                            </tr>

                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $my_id = $_SESSION['id'];
                            $list_logbook = mysqli_query($conn, "SELECT * FROM logbook_harian WHERE id_user=$my_id ORDER BY tanggal DESC ");

                            while ($row = mysqli_fetch_array($list_logbook)) {
                            ?>
                                <tr class="text-center" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    <td>
                                        <i class="fa" aria-hidden="true"></i>
                                    </td>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $row['tanggal'] ?></td>
                                    <td><?php echo $row['nama'] ?></td>


                                    <td>
                                        <a class="btn btn-outline-primary" href="report-fpdf-logbook.php?id=<?php echo $row['id'] ?>" role="button"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
                                                <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
                                                <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z" />
                                            </svg></a>
                                        <a class="btn btn-danger" href="hapus-logbook.php?id=<?php echo $row['id'] ?>">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                                <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z" />
                                            </svg></a>
                                    </td>


                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="6" id="collapseOne" class="collapse show acc" data-parent="#accordion">
                                        <p>
                                            <b>Hal Baik : </b> <?php echo $row['pertama'] ?>
                                        </p>
                                        <p>
                                            <b>Tantangan : </b> <?php echo $row['pertama'] ?>
                                        </p>
                                        <p>
                                            <b>Pembelajaran : </b> <?php echo $row['pertama'] ?>
                                        </p>

                                    </td>
                                </tr>
                            <?php } ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main-table.js"></script>
    <!-- <script src="js/main.js"></script> -->
</body>

</html>