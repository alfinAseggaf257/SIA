<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
	<?php 
	require'../connect.php';
	$kd_nilai =$_GET['kd_nilai'];
	$query	=mysqli_query($koneksi,"SELECT * FROM nilai 
		INNER JOIN data_siswakelas ON nilai.kd_dataSiswa=data_siswakelas.kd_dataSiswa
		INNER JOIN siswa ON data_siswakelas.kd_siswa=siswa.kd_siswa
		INNER JOIN guru ON nilai.kd_guru=guru.kd_guru
		INNER JOIN mata_pelajaran ON guru.kd_mapel=mata_pelajaran.kd_mapel 
	WHERE kd_nilai='$kd_nilai'");
	while ($data=mysqli_fetch_array($query)) : 
	?>
	<div class="container-fluid px-4">
		<h3>Nilai</h3>

		<!-- KONTEN TENGAH -->
		<div class="col-lg-12">
			<div class="card rounded">
				<div class="card-header">
					Ubah Data Nilai
				</div>
				<br>
				<div class="container">
					<form action="?page=update_nilai" method="POST">
						<div class="container" style="margin-left: 2%;">						
							<div class="mb-2 row">
								<input type="hidden" name="kd_nilai" value="<?= $data['kd_nilai']; ?>">
								<label for="kd_dataSiswa" class="col-sm-2 col-form-label">Nama Siswa<span class="text-danger">*</span></label>
								<div class="col-sm-4">
									<input type="text" name="" value="<?= $data['nis'].' - '.$data['nama_siswa']; ?>" readonly class="form-control" id="kd_dataSiswa" required>
									<input type="hidden" name="kd_dataSiswa" value="<?= $data['kd_dataSiswa']; ?>" class="form-control" id="kd_dataSiswa" >
								</div>
							</div>
							<div class="mb-2 row">
								<label for="semester" class="col-sm-2 col-form-label">Semester<span class="text-danger">*</span></label>
								<div class="col-sm-4">
									<input type="text" name="semester" value="<?= $data['semester'] ?>" class="form-control" id="semester" readonly="">
								</div>
							</div>
							<div class="mb-2 row">
								<label for="kd_guru" class="col-sm-2 col-form-label">Mapel<span class="text-danger">*</span></label>
								<div class="col-sm-4">
									<input type="text" name="" value="<?= $data['nama_mapel']; ?>" class="form-control" id="kd_guru" readonly>
									<input type="hidden" name="kd_guru" value="<?= $data['kd_guru']; ?>" class="form-control" id="kd_guru" >
								</div>
							</div>
							<div class="mb-2 row">
								<label for="nilai_tugas1" class="col-sm-2 col-form-label">Nilai Tugas 1<span class="text-danger">*</span></label>
								<div class="col-sm-4">
									<input type="text" name="nilai_tugas1" value="<?= $data['nilai_tugas1'];?>" class="form-control" id="nilai_tugas1" required>
								</div>
							</div>
				
							<div class="mb-2 row">
								<label for="nilai_tugas2" class="col-sm-2 col-form-label">Nilai Tugas 2<span class="text-danger">*</span></label>
								<div class="col-sm-4">
									<input type="text" name="nilai_tugas2" value="<?= $data['nilai_tugas2'];?>" class="form-control" id="nilai_tugas2" required>
								</div>
							</div>
							<div class="mb-2 row">
								<label for="nilai_tugas3" class="col-sm-2 col-form-label">Nilai Tugas 3<span class="text-danger">*</span></label>
								<div class="col-sm-4">
									<input type="text" name="nilai_tugas3" value="<?= $data['nilai_tugas3'];?>" class="form-control" id="nilai_tugas3" required>
								</div>
							</div>
							<div class="mb-2 row">
								<label for="nilai_tugas4" class="col-sm-2 col-form-label">Nilai Tugas 4<span class="text-danger">*</span></label>
								<div class="col-sm-4">
									<input type="text" name="nilai_tugas4" value="<?= $data['nilai_tugas4'];?>" class="form-control" id="nilai_tugas4" required>
								</div>
							</div>
							<div class="mb-2 row">
								<label for="nilai_tugas5" class="col-sm-2 col-form-label">Nilai Tugas 5<span class="text-danger">*</span></label>
								<div class="col-sm-4">
									<input type="text" name="nilai_tugas5" value="<?= $data['nilai_tugas5'];?>" class="form-control" id="nilai_tugas5" required>
								</div>
							</div>
							<div class="mb-2 row">
								<label for="nilai_uts" class="col-sm-2 col-form-label">Nilai UTS<span class="text-danger">*</span></label>
								<div class="col-sm-4">
									<input type="text" name="nilai_uts" value="<?= $data['nilai_uts'];?>" class="form-control" id="nilai_uts" required>
								</div>
							</div>
							<div class="mb-2 row">
								<label for="nilai_uas" class="col-sm-2 col-form-label">Nilai UAS<span class="text-danger">*</span></label>
								<div class="col-sm-4">
									<input type="text" name="nilai_uas" value="<?= $data['nilai_uas'];?>" class="form-control" id="nilai_uas" required>
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
		
	<?php endwhile; ?>
</body>
</html>