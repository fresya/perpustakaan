<?php
include'../koneksi.php';
include'../fpdf181/fpdf.php';

$pdf = new FPDF();
$pdf->AddPage('P','A4');

$tgl=date('Y/m/d');
$pdf->Image('../images/latar-kartu.png',5,5,100,56);
$pdf->Image('../images/foto-default.jpg',80,29,20,25);
$pdf->setFont('Arial','B',12);
$pdf->Cell(90,5,'PERPUSTAKAAN',0,0,'C');
$pdf->Cell(10,5,'',0,0,'C');
$pdf->setFont('Arial','B',10);
$pdf->Cell(90,5,'',0,1,'C');
$pdf->setFont('Arial','B',8);
$pdf->Cell(90,5,'SMA NEGERI 10 PEKANBARU',0,0,'C');
$pdf->Cell(10,5,'',0,0,'C');
$pdf->setFont('Arial','',7);
$pdf->Cell(90,5,'',0,1,'L');
$pdf->SetLineWidth(0.2);
$pdf->Line(10,20,100,20);
$pdf->setFont('Arial','B',10);
$pdf->Cell(90,5,'KARTU IDENTITAS ANGGOTA',0,0,'C');
$pdf->Cell(10,5,'',0,0,'C');
$pdf->setFont('Arial','',7);
$pdf->Cell(90,5,'',0,1,'L');
$pdf->SetLineWidth(0.2);
$pdf->Line(10,25,100,25);
$pdf->Ln(6);

$id_anggota=$_GET['id'];
$q_anggota=mysql_query(
	"SELECT * FROM data_anggota WHERE id_anggota='$id_anggota'"
);
$r_anggota=mysql_fetch_array($q_anggota);
$pdf->setFont('Arial','',10);
$pdf->Cell(14,5,'NIS',0,0,'L');
$pdf->Cell(76,5,'      : '.$r_anggota['id_anggota'],0,0,'L');
$pdf->Cell(10,5,'',0,1,'C');
$pdf->setFont('Arial','',10);
$pdf->Cell(14,5,'Nama',0,0,'L');
$pdf->Cell(36,5,'      : '.$r_anggota['nama_anggota'],0,1,'L');
$pdf->Cell(14,5,'Alamat',0,0,'L');
$pdf->Cell(36,5,'      : '.$r_anggota['alamat'],0,1,'L');
$pdf->Cell(14,5,'Kelas',0,0,'L');
$pdf->Cell(36,5,'      : '.$r_anggota['status'],0,1,'L');
$pdf->Ln(2);

$pdf->Output('KartuAnggota.pdf','I');
?>	