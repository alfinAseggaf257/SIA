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
$pdf->SetTitle('Data Siswa Perkelas');
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
$pdf ->Cell('C',7,'LAPORAN DATA SISWA PERKELAS',0,1,'C');

$pdf ->Cell('C',7,'LIST DATA',0,1,'C');


$kd_kelas=$_GET['kd_kelas'];
$nama_kelas=$_GET['nama_kelas'];
//memberikan space ke bawah agar tidak terlalu rapat
$pdf ->Cell(10,7,'',0,1);

$data_siswakelas = mysqli_query($koneksi,"SELECT * FROM data_siswakelas
	INNER JOIN siswa ON data_siswakelas.kd_siswa=siswa.kd_siswa
	INNER JOIN kelas ON data_siswakelas.kd_kelas=kelas.kd_kelas
	INNER JOIN guru ON kelas.kd_guru=guru.kd_guru  
	where nama_kelas='$nama_kelas'

	");
$jumlah_siswaperkelas = mysqli_num_rows($data_siswakelas);

$query=mysqli_query($koneksi, "SELECT * FROM data_siswakelas
	INNER JOIN siswa ON data_siswakelas.kd_siswa=siswa.kd_siswa
	INNER JOIN kelas ON data_siswakelas.kd_kelas=kelas.kd_kelas
	INNER JOIN guru ON kelas.kd_guru=guru.kd_guru  
	where data_siswakelas.kd_kelas='$kd_kelas'

	")or die(mysqli_error($koneksi));

while($datamilik=mysqli_fetch_array($query)){
//bagian nis,nama,kelas
	$pdf ->SetFont('Arial','B',10);
	$pdf ->Cell(30,6,'Kelas',0,0);
	$pdf ->Cell(4,6,':',0,0);
	$pdf ->Cell(10,6,$datamilik['nama_kelas'],0,1);

	$pdf ->Cell(30,6,'Jumlah Siswa',0,0);
	$pdf ->Cell(4,6,':',0,0);
	$pdf ->Cell(10,6,$jumlah_siswaperkelas,0,1);

	$pdf ->Cell(30,6,'Wali Kelas',0,0);
	$pdf ->Cell(4,6,':',0,0);
	$pdf ->Cell(10,6,$datamilik['nama_guru'],0,1);
	$pdf ->Cell(10,5,'',0,1);
	break;
}

//UNTUK TH TABLE
$pdf ->SetFont('Arial','B',10);
$pdf ->Cell(10,13,'  No.',1,0);
$pdf ->Cell(15,13,'  NIS.',1,0);
$pdf ->Cell(40,13,'  Nama Siswa',1,0);
$pdf ->Cell(30,13,'  Jenis Kelamin',1,0);
$pdf ->Cell(70,13,'  Alamat',1,0);
$pdf ->Cell(27,13,'  No. Telp',1,1);


$pdf ->SetFont('Arial','',10);

//isi kolom rapot
$no=1;;
$query=mysqli_query($koneksi, "SELECT * FROM data_siswakelas
	INNER JOIN siswa ON data_siswakelas.kd_siswa=siswa.kd_siswa
	INNER JOIN kelas ON data_siswakelas.kd_kelas=kelas.kd_kelas  
		where nama_kelas='$nama_kelas'
	ORDER BY nis ASC
	")or die(mysqli_error($koneksi));

while($data=mysqli_fetch_array($query)){
	$pdf ->Cell(10,7,$no,1,0);
	$pdf ->Cell(15,7,$data['nis'],1,0);
	$pdf ->Cell(40,7,$data['nama_siswa'],1,0);
	$pdf ->Cell(30,7,$data['jenkel'],1,0);
	$pdf ->Cell(70,7,$data['alamat'],1,0);
	$pdf ->Cell(27,7,$data['no_telp'],1,1);
	
	$no++;
}




$pdf->Output();
?>