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
$pdf->SetTitle('Data Mapel');
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
$pdf ->Cell('C',7,'LAPORAN DATA MATA PELAJARAN',0,1,'C');

$pdf ->Cell('C',7,'LIST DATA',0,1,'C');

//memberikan space ke bawah agar tidak terlalu rapat
$pdf ->Cell(10,7,'',0,1);

//UNTUK TH TABLE
$pdf ->SetFont('Arial','B',10);
$pdf ->Cell(13,13,'  No.',1,0);
$pdf ->Cell(44,13,'  Kode Mapel',1,0);
$pdf ->Cell(44,13,'  Nama Mapel',1,0);
$pdf ->Cell(34,13,'  KKM',1,0);
$pdf ->Cell(54,13,'  Keterangan',1,1);


$pdf ->SetFont('Arial','',10);

//isi kolom rapot
$no=1;;
$query=mysqli_query($koneksi, "SELECT * FROM mata_pelajaran ORDER BY nama_mapel ASC ")or die(mysqli_error());
while($data=mysqli_fetch_array($query)){
	$pdf ->Cell(13,7,$no,1,0);
	$pdf ->Cell(44,7,$data['kd_mapel'],1,0);
	$pdf ->Cell(44,7,$data['nama_mapel'],1,0);
	$pdf ->Cell(34,7,$data['kkm'],1,0);
	$pdf ->Cell(54,7,$data['keterangan'],1,1);
	
	$no++;
}




$pdf->Output();
?>