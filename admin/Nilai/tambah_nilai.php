<?php 
require '../connect.php'; 	
$query 		 = mysqli_query($koneksi,"SELECT max(kd_nilai) FROM nilai") or die(mysql_error());
$data 		 = mysqli_fetch_array($query);
if($data){
	$no   	 = substr($data[0],2);
	$kode 	 = (int) $no;
	$kode 	 = $kode+1;
	$kode_acak= "NL".str_pad($kode,3,"0", STR_PAD_LEFT);

}else{
	$kode_acak = "NL001";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
	<div class="container-fluid px-4">
		<h3>Nilai</h3>

		<!-- KONTEN TENGAH -->
		<div class="col-lg-12">
			<div class="card rounded">
				<div class="card-header">
					Tambah Data Nilai
				</div>
				<br>
				<div class="container">
					<form action="?page=simpan_nilai" method="POST">
						<div class="container" style="margin-left: 2%;">						
						<div class="mb-2 row" hidden>
								<label for="kd_nilai" class="col-sm-2 col-form-label">Kode Nilai<span class="text-danger">*</span></label>
								<div class="col-sm-4">
									<input type="text" name="kd_nilai" class="form-control" value="<?php echo $kode_acak; ?>" id="kd_nilai" readonly required>
								</div>
							</div>
							<div class="mb-2 row">
								<label for="kd_dataSiswa" class="col-sm-2 col-form-label">Nama Siswa<span class="text-danger">*</span></label>
								<div class="col-sm-4">
									<select class="form-select" name="kd_dataSiswa" required aria-label="Default select example">
										<option selected value="">-- Pilih Salah Satu --</option>
										<?php
										require"../connect.php";
										$result = mysqli_query($koneksi, "SELECT * FROM data_siswakelas 
											INNER JOIN siswa ON data_siswakelas.kd_siswa=siswa.kd_siswa  
											INNER JOIN kelas ON data_siswakelas.kd_kelas=kelas.kd_kelas ORDER BY nama_siswa ASC
               
											")or die(mysqli_error());
										while($data=mysqli_fetch_array($result)){
											echo '<option value="'.$data['kd_dataSiswa'].'">'.$data['nis'].' - '.$data['nama_siswa'].' - '.$data['nama_kelas'].' </option>';
										}
										?>
									</select>
								</div>
							</div>
							<div class="mb-2 row">
								<label for="semester" class="col-sm-2 col-form-label">Semester<span class="text-danger">*</span></label>
								<div class="col-sm-4">
									<input type="text" name="semester" class="form-control" id="semester" required>
								</div>
							</div>
							<?php if ($_SESSION['level']=="Admin"){ ?>
								<div class="mb-2 row">
									<label for="kd_guru" class="col-sm-2 col-form-label">Mapel<span class="text-danger">*</span></label>
									<div class="col-sm-4">
										<select class="form-select" name="kd_guru" required aria-label="Default select example">
											<option selected value="">-- Pilih Salah Satu --</option>
											<?php
											require"../connect.php";
											$result = mysqli_query($koneksi, "SELECT * FROM guru INNER JOIN mata_pelajaran ON guru.kd_mapel=mata_pelajaran.kd_mapel ORDER BY nama_mapel ASC")or die(mysqli_error());
											while($data=mysqli_fetch_array($result)){
												echo '<option value="'.$data['kd_guru'].'">'.$data['nama_mapel'].' </option>';
											}
											?>
										</select>
									</div>
								</div>

							<?php }else if($_SESSION['level']=="Guru") {  ?>
								<div class="mb-2 row">
									<label for="kkm" class="col-sm-2 col-form-label">Mapel<span class="text-danger">*</span></label>
									<div class="col-sm-4">
										<input type="text" name=""  class="form-control" value="<?php echo $_SESSION['pengajar']; ?>" readonly required>
										<input type="hidden" name="kd_guru"  class="form-control" value="<?php echo $_SESSION['kd']; ?>" required>
									</div>
								</div>
							<?php } ?>
							<div class="mb-2 row">
								<label for="nilai_tugas1" class="col-sm-2 col-form-label">Nilai Tugas 1<span class="text-danger">*</span></label>
								<div class="col-sm-4">
									<input type="text" name="nilai_tugas1" class="form-control" id="nilai_tugas1" required autocomplete="off">
								</div>
							</div>
							<div class="mb-2 row">
								<label for="nilai_tugas2" class="col-sm-2 col-form-label">Nilai Tugas 2<span class="text-danger">*</span></label>
								<div class="col-sm-4">
									<input type="text" name="nilai_tugas2" class="form-control" id="nilai_tugas2" required autocomplete="off">
								</div>
							</div>
							<div class="mb-2 row">
								<label for="nilai_tugas3" class="col-sm-2 col-form-label">Nilai Tugas 3<span class="text-danger">*</span></label>
								<div class="col-sm-4">
									<input type="text" name="nilai_tugas3" class="form-control" id="nilai_tugas3" required autocomplete="off">
								</div>
							</div>
							<div class="mb-2 row">
								<label for="nilai_tugas4" class="col-sm-2 col-form-label">Nilai Tugas 4<span class="text-danger">*</span></label>
								<div class="col-sm-4">
									<input type="text" name="nilai_tugas4" class="form-control" id="nilai_tugas4" required autocomplete="off">
								</div>
							</div>
							<div class="mb-2 row">
								<label for="nilai_tugas5" class="col-sm-2 col-form-label">Nilai Tugas 5<span class="text-danger">*</span></label>
								<div class="col-sm-4">
									<input type="text" name="nilai_tugas5" class="form-control" id="nilai_tugas5" required autocomplete="off">
								</div>
							</div>
							<div class="mb-2 row">
								<label for="nilai_uts" class="col-sm-2 col-form-label">Nilai UTS<span class="text-danger">*</span></label>
								<div class="col-sm-4">
									<input type="text" name="nilai_uts" class="form-control" id="nilai_uts" required autocomplete="off">
								</div>
							</div>
							<div class="mb-2 row">
								<label for="nilai_uas" class="col-sm-2 col-form-label">Nilai UAS<span class="text-danger">*</span></label>
								<div class="col-sm-4">
									<input type="text" name="nilai_uas" class="form-control" id="nilai_uas" required autocomplete="off">
								</div>
							</div>
							<div class="mb-2 row" hidden >
								<label for="total_nilai" class="col-sm-2 col-form-label">Total Nilai<span class="text-danger">*</span></label>
								<div class="col-sm-4">
									<input type="text" name="total_nilai" class="form-control" id="total_nilai">
								</div>
							</div>

							<br>
							<button type="reset" class="btn btn-danger">Reset</button>
							<button type="submit" class="btn btn-primary">Submit</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
