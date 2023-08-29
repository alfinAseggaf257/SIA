<?php 
//memanggil library FPDF
require 'fpdf.php';
require '../../akses.php';
require '../../function.php';
require '../../../connect.php';


class pdf extends FPDF{
	function letak($gambar){
		//memasukkan gambar untuk header
		$this->Image($gambar,11,9,23,23);
		//menggeser posisi sekarang
	}

	function judul($teks1, $teks2, $teks3, $teks4, $teks5){
		$this->Cell(25);
		$this->SetFont('Times','B','14');
		$this->Cell(0,5,$teks1,0,1,'C');
		$this->Cell(25);
		$this->Cell(0,5,$teks2,0,1,'C');
		$this->Cell(25);
		$this->SetFont('Times','B','15');
		$this->Cell(0,5,$teks3,0,1,'C');
		$this->Cell(25);
		$this->SetFont('Times','I','11');
		$this->Cell(0,5,$teks4,0,1,'C');
		$this->Cell(25);
		$this->Cell(0,2,$teks5,0,1,'C');
	}

	function garis(){
		$this->SetLineWidth(1);
		$this->Line(10,36,200,36);
		$this->SetLineWidth(0);
		$this->Line(10,37,200,37);
	}

	function garis2(){
		$this->SetLineWidth(1);
		$this->Line(10,36,50,36);
	}
	
}

//instantisasi objek
$pdf=new pdf();
$pdf->SetTitle('Data Admin Pengguna');
//Mulai dokumen
$pdf->AddPage('P', 'A4');
//meletakkan gambar
$pdf->letak('../../../assets/img/logo.png');
//meletakkan judul disamping logo diatas
$pdf->judul('PEMERINTAH KABUPATEN SLEMAN', 'DINAS PENDIDIKAN','SD NEGERI BATURAN 1','Jl. Kabupaten No.17, Nusupan, Trihanggo, Kec. Gamping, Kabupaten Sleman, D.I. Yogyakarta','Telp. (0274) 6415369  E-Mail:sdnbaturan1@yahoo.com');
//membuat garis ganda tebal dan tipis
$pdf->garis();


$pdf ->Cell(10,10,'',0,1);
$pdf ->SetFont('Arial','B',10);
$pdf ->Cell('C',7,'LAPORAN DATA PENGGUNA (ADMIN)',0,1,'C');

$pdf ->Cell('C',7,'LIST DATA',0,1,'C');

//memberikan space ke bawah agar tidak terlalu rapat
$pdf ->Cell(10,7,'',0,1);

//UNTUK TH TABLE
$pdf ->SetFont('Arial','B',10);
$pdf ->Cell(13,13,'  No.',1,0);
$pdf ->Cell(44,13,'  Nama Pengguna',1,0);
$pdf ->Cell(44,13,'  Username',1,0);
$pdf ->Cell(34,13,'  Level',1,0);
$pdf ->Cell(54,13,'  Tanggal Aktif',1,1);


$pdf ->SetFont('Arial','',10);

//isi kolom rapot
$no=1;;
$query=mysqli_query($koneksi, "SELECT * FROM admin ORDER BY kd_admin ASC ")or die(mysqli_error());
while($data=mysqli_fetch_array($query)){
	$pdf ->Cell(13,7,$no,1,0);
	$pdf ->Cell(44,7,$data['nama_admin'],1,0);
	$pdf ->Cell(44,7,$data['username'],1,0);
	$pdf ->Cell(34,7,$data['level'],1,0);
	$pdf ->Cell(54,7,$data['tanggal_dibuat'],1,1);
	
	$no++;
}




$pdf->Output();
?>