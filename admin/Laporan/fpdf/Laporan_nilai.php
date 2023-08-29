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
$pdf->SetTitle('Data Nilai');
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
$pdf ->Cell('C',7,'LAPORAN HASIL BELAJAR',0,1,'C');

$pdf ->Cell('C',7,'RAPORT SISWA',0,1,'C');

if ($_SESSION['level']=="Siswa") {
	
//bagian nis,nama,kelas
$pdf ->SetFont('Arial','B',10);
$pdf ->Cell(15,6,'NIS',0,0);
$pdf ->Cell(4,6,':',0,0);
$pdf ->Cell(10,6,$_SESSION['nis'],0,1);

$pdf ->Cell(15,6,'Nama',0,0);
$pdf ->Cell(4,6,':',0,0);
$pdf ->Cell(10,6,$_SESSION['nama_siswa'],0,1);

$pdf ->Cell(15,6,'Kelas',0,0);
$pdf ->Cell(4,6,':',0,0);
$pdf ->Cell(10,6,$_SESSION['nama_kelas'],0,1);
$pdf ->Cell(10,5,'',0,1);

//UNTUK TH TABLE
$pdf ->SetFont('Arial','B',10);
$pdf ->Cell(10,13,'  No.',1,0);
$pdf ->Cell(40,13,'  Mata Pelajaran',1,0);
$pdf ->Cell(12,13,' KKM',1,0);
$pdf ->Cell(17,13,' Tugas 1',1,0);
$pdf ->Cell(17,13,' Tugas 2',1,0);
$pdf ->Cell(17,13,' Tugas 3',1,0);
$pdf ->Cell(13,13,'  UTS',1,0);
$pdf ->Cell(13,13,'  UAS',1,0);
$pdf ->Cell(20,13,' Rata-rata',1,0);
$pdf ->Cell(30,13,'  Keterangan',1,1);


$pdf ->SetFont('Arial','',10);

//isi kolom rapot
$no=1;;
$tampilsiswa=$_SESSION['nama_siswa'];
if($_SESSION['level']=="Siswa"){
	$tampil="WHERE nama_siswa='$tampilsiswa'";
	$plus=" ";
}
$query=mysqli_query($koneksi, "SELECT * FROM nilai 
	INNER JOIN data_siswakelas ON nilai.kd_dataSiswa=data_siswakelas.kd_dataSiswa 
	INNER JOIN kelas ON data_siswakelas.kd_kelas=kelas.kd_kelas
	INNER JOIN siswa ON data_siswakelas.kd_siswa=siswa.kd_siswa 
	INNER JOIN guru ON nilai.kd_guru=guru.kd_guru 
	INNER JOIN mata_pelajaran ON mata_pelajaran.kd_mapel=guru.kd_mapel 
	$tampil $plus ORDER BY kd_nilai DESC 
	")or die(mysqli_error($koneksi));

while($data=mysqli_fetch_array($query)){

	// $pdf ->Cell(10,7,$no,1,0);
	// $pdf ->Cell(40,7,$data['nama_mapel'],1,0);
	// $pdf ->Cell(12,7,$data['kkm'],1,0);
	// $pdf ->Cell(17,7,$data['nilai_tugas1'],1,0);
	// $pdf ->Cell(17,7,$data['nilai_tugas2'],1,0);
	// $pdf ->Cell(17,7,$data['nilai_tugas3'],1,0);
	// $pdf ->Cell(13,7,$data['nilai_uts'],1,0);
	// $pdf ->Cell(13,7,$data['nilai_uas'],1,0);
	// $pdf ->Cell(20,7,ceil($data['total_nilai']),1,0);
	
	// $nilai=ceil($data['total_nilai']);

	// if ($nilai < $data['kkm']) {
	// 	$keterangan="Remidial";
	// }elseif ($nilai >= $data['kkm']){
	// 	$keterangan="Lulus";
	// }
	// $pdf ->Cell(30,7,$keterangan,1,1);
	
	// $no++;
}

}else{

$kd_dataSiswa=$_GET['kd_dataSiswa'];
//memberikan space ke bawah agar tidak terlalu rapat
$pdf ->Cell(10,7,'',0,1);
$query=mysqli_query($koneksi, "SELECT * FROM data_siswakelas
	INNER JOIN siswa ON data_siswakelas.kd_siswa=siswa.kd_siswa
	INNER JOIN kelas ON data_siswakelas.kd_kelas=kelas.kd_kelas  
	where kd_dataSiswa='$kd_dataSiswa'

	")or die(mysqli_error($koneksi));

while($datamilik=mysqli_fetch_array($query)){
//bagian nis,nama,kelas
	$pdf ->SetFont('Arial','B',10);
	$pdf ->Cell(15,6,'NIS',0,0);
	$pdf ->Cell(4,6,':',0,0);
	$pdf ->Cell(10,6,$datamilik['nis'],0,1);

	$pdf ->Cell(15,6,'Nama',0,0);
	$pdf ->Cell(4,6,':',0,0);
	$pdf ->Cell(10,6,$datamilik['nama_siswa'],0,1);

	$pdf ->Cell(15,6,'Kelas',0,0);
	$pdf ->Cell(4,6,':',0,0);
	$pdf ->Cell(10,6,$datamilik['nama_kelas'],0,1);
	$pdf ->Cell(10,5,'',0,1);
}

//UNTUK TH TABLE

$pdf->Cell(10,10,'No',1,0); 
$pdf->Cell(40,10,'Mapel',1,0);

$pdf->Cell(86,5,'Nilai',1,0,'C'); 
$pdf->Cell(12,10,'KKM',1,0);
$pdf->Cell(18,10,'Rata-rata',1,0); 
$pdf->Cell(23,10,'Keterangan',1,0);

$pdf->Cell(0,5,'',0,1); 

$pdf->Cell(50,5,'',0,0); 
$pdf->Cell(12,5,'T1',1,0);
$pdf->Cell(12,5,'T2',1,0);
$pdf->Cell(12,5,'T3',1,0);
$pdf->Cell(12,5,'T4',1,0);
$pdf->Cell(12,5,'T5',1,0);
$pdf->Cell(13,5,'UTS',1,0);
$pdf->Cell(13,5,'UAS',1,1);


$pdf ->SetFont('Arial','',10);

//isi kolom rapot
$no=1;;
$query=mysqli_query($koneksi, "SELECT * FROM nilai 
	INNER JOIN data_siswakelas ON nilai.kd_dataSiswa=data_siswakelas.kd_dataSiswa 
	INNER JOIN kelas ON data_siswakelas.kd_kelas=kelas.kd_kelas
	INNER JOIN siswa ON data_siswakelas.kd_siswa=siswa.kd_siswa 
	INNER JOIN guru ON nilai.kd_guru=guru.kd_guru 
	INNER JOIN mata_pelajaran ON mata_pelajaran.kd_mapel=guru.kd_mapel 
	WHERE nilai.kd_dataSiswa ='$kd_dataSiswa'
	ORDER BY nama_mapel ASC
	")or die(mysqli_error($koneksi));

while($data=mysqli_fetch_array($query)){

	//data rows
	$pdf->Cell(10,5,$no,1,0);
	$pdf->Cell(40,5,$data['nama_mapel'],1,0);

	$pdf->Cell(12,5,$data['nilai_tugas1'],1,0);
	$pdf->Cell(12,5,$data['nilai_tugas2'],1,0);
	$pdf->Cell(12,5,$data['nilai_tugas3'],1,0);
	$pdf->Cell(12,5,$data['nilai_tugas4'],1,0);
	$pdf->Cell(12,5,$data['nilai_tugas5'],1,0);
	$pdf->Cell(13,5,$data['nilai_uts'],1,0);
	$pdf->Cell(13,5,$data['nilai_uas'],1,0);
	$pdf->Cell(12,5,$data['kkm'],1,0);
	$pdf->Cell(18,5,ceil($data['total_nilai']),1,0);


	$nilai=ceil($data['total_nilai']);

	if ($nilai < $data['kkm']) {
		$keterangan="Remidial";
	}elseif ($nilai >= $data['kkm']){
		$keterangan="Lulus";
	}
	$pdf->Cell(23,5,$keterangan,1,1);
	
	
	$no++;
}


}
//pemisah
$pdf ->Cell(10,0,'',0,1);

//bagian catatan
$pdf ->Cell(10,7,'',0,1);

$pdf ->SetFont('Arial','',10);
$pdf ->Cell(35,6,'Catatan Wali Kelas ',0,0);
$pdf ->Cell(4,6,':',0,1);
$pdf ->Cell(189,30,'',1,0);
$pdf ->Cell(10,50,'',0,1);

//bagian mengetahui


$pdf ->SetFont('Arial','',10);
$pdf ->Cell(150,6,'',0,0);
$pdf ->Cell(20,6,'Yogyakarta,',0,0);
$pdf ->Cell(25,6,tgl(date('Y-m-d')),0,1);
$pdf ->SetFont('Arial','B',10);
$pdf ->Cell(170,6,'Mengetahui,',0,1);
$pdf ->SetFont('Arial','',10);
$pdf ->Cell(170,6,'Orang tua/Wali murid',0,0);
$pdf ->Cell(25,6,'Wali Kelas',0,1);
$pdf ->Cell(170,6,'',0,0);

$pdf->Output();
?>