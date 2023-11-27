<?php

require('fpdf181/fpdf.php');

$pdf = new FPDF('P', 'mm', 'A4');
$pdf->SetMargins(30, 30, 30);
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 12);
$pdf->MultiCell(0, 5, 'LAPORAN HARIAN MAHASISWA PROGRAM KAMPUS MENGAJAR ANGKATAN 4 TAHUN 2022',0, 'C');

$pdf->MultiCell(0, 5, '');

$pdf->SetFont('Times', 'B', 11);

include 'koneksi.php';

$pertanyaan1 = "1.	Jelaskan hal baik yang dilakukan oleh mahasiswa hari ini selama berada di sekolah!";
$pertanyaan2 = "2.	Jelaskan tantangan yang dihadapi saat melakukan kegiatan di sekolah!";
$pertanyaan3 = "3.	Jelaskan pembelajaran yang didapatkan mahasiswa selama berada di sekolah hari ini!";

$logbook = mysqli_query($conn, "select * from logbook");
$no = 1;
$list_logbook = mysqli_query($conn, "SELECT * FROM logbook_harian WHERE id = '" . $_GET['id'] . "'");
while ($row = mysqli_fetch_array($list_logbook)) {
    $date = date('d F Y');

    $pdf->SetFont('Arial', '', 11);
    $pdf->write(10, 'Nama :  ');
    $pdf->write(10, $row['nama']);
    $pdf->MultiCell(0, 5, '');
    $pdf->write(10, 'Tanggal Laporan :  ');
    $pdf->write(10, $date);

    $pdf->MultiCell(0, 15, '');

    $pdf->SetFont('Arial', 'B', 11);
    $pdf->MultiCell(0, 5, $pertanyaan1); 
    $pdf->MultiCell(0, 3, '');
    $pdf->SetFont('Arial', '', 11);
    $pdf->MultiCell(0, 5, $row['pertama']); 
    
    $pdf->MultiCell(0, 5, '');
    $pdf->SetFont('Arial', 'B', 11);
    $pdf->MultiCell(0, 5, $pertanyaan2);
    $pdf->MultiCell(0, 3, '');
    $pdf->SetFont('Arial', '', 11);
    $pdf->MultiCell(0, 5, $row['kedua']); 

    $pdf->MultiCell(0, 5, '');
    $pdf->SetFont('Arial', 'B', 11);
    $pdf->MultiCell(0, 5, $pertanyaan3);
    $pdf->MultiCell(0, 3, '');
    $pdf->SetFont('Arial', '', 11);
    $pdf->MultiCell(0, 5, $row['ketiga']); 
}
//menampilkan tulisan
$pdf->Output();
