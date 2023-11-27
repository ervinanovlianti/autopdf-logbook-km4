<?php
    include 'koneksi.php';
    $id = $_GET['id'];
    $update = mysqli_query($conn, "SELECT * FROM anggota WHERE id_anggota = '".$_GET['id']."'");
    if(mysqli_num_rows($update) == 0){
        echo '<script>window.history.back()</script>';
    }else{
        $up = mysqli_fetch_assoc($update);
    }
    if(isset($_POST['submit'])){     
        
        $jurusan_anggota = $_POST['jurusan_anggota'];
        $nama_anggota = $_POST['nama_anggota'];    
        $tmp_lahir= $_POST['tmp_lahir'];
        $tgl_lahir= $_POST['tgl_lahir'];
        $jk_anggota = $_POST['jk_anggota'];
        $alamat_anggota    = $_POST['alamat_anggota'];    

        $update_data = mysqli_query ($conn, "UPDATE anggota SET jurusan_anggota='$jurusan_anggota', nama_anggota='$nama_anggota', tmp_lahir='$tmp_lahir', tgl_lahir='$tgl_lahir', jk_anggota='$jk_anggota', alamat_anggota='$alamat_anggota' WHERE id_anggota = '".$_GET['id']."'") or die(mysqli_error($conn));
        
        //jika query update sukses
        if($update_data){
            echo 'Data berhasil di simpan! ';        //Pesan jika proses simpan sukses
            echo '<script>window.location="report-update-berhasil.php?id='.$generateId.'"</script>';
        }else{
            echo 'Gagal menyimpan data! ';        //Pesan jika proses simpan gagal
            echo '<a href="crud-update-anggota.php?id='.$id.'">Kembali</a>';    //membuat Link untuk kembali ke halaman edit
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
    <title>Pendaftaran Anggota Baru Perpustakaan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="Wide selection of forms controls, using the Bootstrap 4 code base, but built with React." />
    <meta name="msapplication-tap-highlight" content="no" />

    <link href="./main.css" rel="stylesheet" />
  </head>
  <body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
      <div class="app-header header-shadow">
        <div class="app-header__logo">
          <div class="logo-src"></div>
          <div class="header__pane ml-auto">
            <div>
              <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                <span class="hamburger-box">
                  <span class="hamburger-inner"></span>
                </span>
              </button>
            </div>
          </div>
        </div>
        <div class="app-header__mobile-menu">
          <div>
            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
              <span class="hamburger-box">
                <span class="hamburger-inner"></span>
              </span>
            </button>
          </div>
        </div>
        <div class="app-header__menu">
          <span>
            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
              <span class="btn-icon-wrapper">
                <i class="fa fa-ellipsis-v fa-w-6"></i>
              </span>
            </button>
          </span>
        </div>
        <div class="app-header__content">
          <div class="app-header-left">
            <div class="search-wrapper">
             
              <button class="close"></button>
            </div>
          </div>
          <!-- Akhir Buttom -->
          <!-- Profil -->
        </div>
      </div>
      <!-- Awal -->
      <div class="app-main">
        <div class="app-sidebar sidebar-shadow">
          <div class="app-header__logo">
            <div class="logo-src"></div>
            <div class="header__pane ml-auto">
              <div>
                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                  <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                  </span>
                </button>
              </div>
            </div>
          </div>
          <div class="app-header__mobile-menu">
            <div>
              <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                <span class="hamburger-box">
                  <span class="hamburger-inner"></span>
                </span>
              </button>
            </div>
          </div>
          <div class="app-header__menu">
            <span>
              <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                <span class="btn-icon-wrapper">
                  <i class="fa fa-ellipsis-v fa-w-6"></i>
                </span>
              </button>
            </span>
          </div>
          <div class="scrollbar-sidebar">
            <div class="app-sidebar__inner">
              <ul class="vertical-nav-menu">
              <li class="app-sidebar__heading"><a href="index.php">Dashboards</a></li>
                
                <li class="app-sidebar__heading">Forms</li>
                <li>
                  <a href="crud-input-anggota.php"><i class="metismenu-icon pe-7s-add-user"></i>
                    Pendaftaran 
                  </a>
                </li>
                <li class="app-sidebar__heading">Report</li>
                <li>
                  <a href="crud-read-anggota.php"  class="mm-active"><i class="metismenu-icon pe-7s-notebook"></i>
                    Data Anggota  
                  </a>
                </li>
                <li class="app-sidebar__heading">Setting</li>
                <li>
                <a href="logout.php"><i class="metismenu-icon pe-7s-power"></i>
                    Logout
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="app-main__outer">
          <div class="app-main__inner">
            <div class="app-page-title">
              <div class="page-title-wrapper">
                <div class="page-title-heading">
                  <div class="page-title-icon">
                    <i class="pe-7s-display1 icon-gradient bg-premium-dark"> </i>
                  </div>
                  <!-- Awal Form -->
                  <div>
                    Form Pendaftaran Anggota
                    <div class="page-title-subheading"></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="tab-content">
              <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                <div class="row">
                  <div class="col-md-6">
                    <div class="main-card mb-3 card">
                      <div class="card-body">
                        <h5 class="card-title">BIODATA CALON ANGGOTA PERPUSTAKAAN</h5>
                        <form action="" method="post">
                          <div class="position-relative form-group"><label>Tahun Ajaran</label><input name="thn_ajaran" class="form-control" value="2021/2022" readonly /></div>
                          <div class="position-relative form-group">
                            <label>Jurusan</label>
                            <select name="jurusan_anggota" class="form-control">
                                <option value="">--Pilih--</option>
                                <option value="Sistem Informasi"<?php if($up['jurusan_anggota'] == 'Sistem Informasi'){ echo 'selected'; } ?>>Sistem Informasi</option>
                                <option value="Teknik Informatika"<?php if($up['jurusan_anggota'] == 'Teknik Informatika'){ echo 'selected'; } ?>>Teknik Informatika</option>
                                <option value="Manajemen Informatika"<?php if($up['jurusan_anggota'] == 'Manajemen Informatika'){ echo 'selected'; } ?>">Manajemen Informatika</option>
                            </select>
                        </div>
                          <div class="position-relative form-group"><label>Nama Lengkap</label>
                          <input name="nama_anggota" class="form-control" value="<?php echo $up['nama_anggota']; ?>" ></div>
                          
                          <div class="position-relative form-group"><label>Tempat Lahir</label>
                          <input name="tmp_lahir" class="form-control" value="<?php echo $up['tmp_lahir']; ?>" ></div>
                          
                          <div class="position-relative form-group"><label>Tanggal Lahir</label>
                          <input type="date" name="tgl_lahir" class="form-control" value="<?php echo $up['tgl_lahir']; ?>" required /></div>
                          
                          <div id="position-relative form-group">
                            <label>Jenis Kelamin</label>
                            <div class="form-check">
                              <input type="radio" name="jk_anggota" class="form-check-input" value="Laki-laki" <?php if($up['jk_anggota'] == 'Laki-laki'){ echo 'checked'; } ?> >
                              <label class="form-check-label" for="exampleRadios1"> Laki-laki </label>
                              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                              <input type="radio" name="jk_anggota" class="form-check-input" value="Perempuan" <?php if($up['jk_anggota'] == 'Perempuan'){ echo 'checked'; } ?> >
                              <label class="form-check-label" for="exampleRadios1"> Perempuan </label>
                            </div>
                          </div>
                         <div class="position-relative form-group"><label>Alamat Lengkap</label>
                          <input name="alamat_anggota" class="form-control" value="<?php echo $up['alamat_anggota']; ?>" >
                          </div>
                          <button class="btn btn-primary" type="submit" name="submit">Submit form</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="app-wrapper-footer">
            <div class="app-footer">
              <div class="app-footer__inner">
                <div class="app-footer-right">
                  <ul class="nav">
                    <li class="nav-item">
                      <a href="javascript:void(0);" class="nav-link">
                        copyright by @11194036 @11194048 2021
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script type="text/javascript" src="./assets/scripts/main.js"></script>
  </body>
</html>
