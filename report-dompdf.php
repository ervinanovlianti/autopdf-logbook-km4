<?php

include('koneksi.php');

require_once("dompdf_0-8-3/dompdf/autoload.inc.php");

use Dompdf\Dompdf;

$dompdf = new Dompdf();

$anggota = mysqli_query($conn, "select * from anggota");

$list_peserta = mysqli_query($conn, "SELECT * FROM anggota ");

$html = '<center><h3>Daftar Anggota Perpustakaan</h3></center><hr/><br/>';

$html .= '<table border="1" width="100%">

 <tr>

 <th>No</th>

 <th>Tahun Ajaran</th>

 <th>Jurusan</th>

 <th>Nama Anggota</th>

 <th>Tempat, Tanggal Lahir</th>

 <th>Jenis Kelamin</th>

 <th>No. Telpon</th>

 <th>Alamat</th>

 </tr>';

$no = 1;
while($row = mysqli_fetch_array($list_peserta))

{

 $html .= "<tr>

 <td>".$no."</td>

 <td>".$row['thn_ajaran']."</td>

 <td>".$row['jurusan_anggota']."</td>

 <td>".$row['nama_anggota']."</td>

 <td>".$row['tmp_lahir'].",".$row['tgl_lahir']."</td>

 <td>".$row['jk_anggota']."</td>

 <td>".$row['notelp_anggota']."</td>
 <td>".$row['alamat_anggota']."</td>
 </tr>";

 $no++;

}

$html .= "</html>";

$dompdf->loadHtml($html);

// Setting ukuran dan orientasi kertas

$dompdf->setPaper('A4', 'landscape');

// Rendering dari HTML Ke PDF

$dompdf->render();

// Melakukan output file Pdf

$dompdf->stream('laporan_data_anggota.pdf');

?>