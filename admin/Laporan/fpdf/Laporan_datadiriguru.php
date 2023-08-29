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
$pdf->SetTitle('Data Diri Guru');
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
$pdf ->Cell('C',7,'LAPORAN DATA DIRI GURU',0,1,'C');
$pdf ->Cell(10,7,'',0,1);
$pdf ->SetFont('Arial','B',12);
$pdf ->Cell('L',7,'Profil Guru :',0,1,'L');

//memberikan space ke bawah agar tidak terlalu rapat
$pdf ->Cell(10,2,'',0,1);




$pdf ->SetFont('Arial','',10);

//isi kolom rapot
$no=1;;
$kd_guru=$_GET['kd_guru'];
$query=mysqli_query($koneksi, "SELECT * FROM guru INNER JOIN mata_pelajaran ON guru.kd_mapel=mata_pelajaran.kd_mapel WHERE kd_guru='$kd_guru' ")or die(mysqli_error($koneksi));
while($data=mysqli_fetch_array($query)){
	$pdf ->Cell(28,13,'  NIP',0,0);
	$pdf ->Cell(5,13,'  :',0,0);
	$pdf ->Cell(28,13,  $data['nip'],0,1);
	$pdf ->Cell(28,13,'  Nama Siswa',0,0);
	$pdf ->Cell(5,13,'  :',0,0);
	$pdf ->Cell(28,13,  $data['nama_guru'],0,1);
	$pdf ->Cell(28,13,'  Jenis Kelamin',0,0);
	$pdf ->Cell(5,13,'  :',0,0);
	$pdf ->Cell(28,13,  $data['jenkel'],0,1);
	$pdf ->Cell(28,13,'  Agama',0,0);
	$pdf ->Cell(5,13,'  :',0,0);
	$pdf ->Cell(28,13,  $data['agama'],0,1);
	$pdf ->Cell(28,13,'  TTL',0,0);
	$pdf ->Cell(5,13,'  :',0,0);
	$pdf ->Cell(18,13,  $data['tempat_lahir'],0,0);
	$pdf ->Cell(3,13,',',0,0);
	$pdf ->Cell(28,13,  tgl($data['tanggal_lahir']),0,1);
	$pdf ->Cell(28,13,'  Alamat',0,0);
	$pdf ->Cell(5,13,'  :',0,0);
	$pdf ->Cell(28,13,  $data['alamat'],0,1);
	$pdf ->Cell(28,13,'  No.Telp',0,0);
	$pdf ->Cell(5,13,'  :',0,0);
	$pdf ->Cell(28,13,  $data['no_telp'],0,1);
	$pdf ->Cell(28,13,'  Pengampu',0,0);
	$pdf ->Cell(5,13,'  :',0,0);
	$pdf ->Cell(28,13,  $data['nama_mapel'],0,1);
	$pdf ->Cell(28,13,'  Foto',0,0);
	$pdf ->Cell(5,13,'  :',0,0);
	$pdf ->Image('../../../assets/img/Data/Guru/'.$data['foto'],47,175,50,60);
	
	$no++;
}




$pdf->Output();
?>