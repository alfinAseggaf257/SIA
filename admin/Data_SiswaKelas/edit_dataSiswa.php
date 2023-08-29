<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Kelas</title>
</head>
<body>
	<?php 
	require'../connect.php';
	$kd_dataSiswa =$_GET['kd_dataSiswa'];
	$query=mysqli_query($koneksi, "SELECT * FROM data_siswakelas 
									INNER JOIN kelas ON data_siswakelas.kd_kelas=kelas.kd_kelas
									INNER JOIN guru ON kelas.kd_guru=guru.kd_guru
									INNER JOIN siswa ON data_siswakelas.kd_siswa=siswa.kd_siswa
									WHERE kd_dataSiswa='$kd_dataSiswa' 
									")or die(mysqli_error($koneksi));
	while ($data=mysqli_fetch_array($query)) : 
		?>
		<div class="container-fluid px-4">
			<h3>Kelas</h3>
			<!-- KONTEN TENGAH -->
			<div class="col-lg-12">
			<div class="card rounded">
				<div class="card-header">
					Ubah Data Siswa Kelas
				</div>
				<br>
				<div class="container">
					<form action="?page=update_siswa_kelas" method="POST">
						<input type="hidden" name="kd_dataSiswa" value="<?= $data['kd_dataSiswa'] ?>" id="">
						<div class="container" style="margin-left: 2%;">						
							<div class="mb-3 row">
								<label for="kd_kelas" class="col-sm-2 col-form-label">Pilih Kelas<span class="text-danger">*</span></label>
								<div class="col-sm-4">
									<select class="form-select" name="kd_kelas" required aria-label="Default select example">
										<option selected value="">-- Pilih Salah Satu --</option>
										<?php 
											require'../connect.php';
											$result	= mysqli_query($koneksi,"SELECT * FROM kelas ORDER BY nama_kelas ASC")or die(mysqli_error($koneksi));
											while ($datas=mysqli_fetch_array($result)) {
												if ($data['kd_kelas']==$datas['kd_kelas']) {
													echo '<option value="'.$datas['kd_kelas'].'" selected="selected">'.$datas['nama_kelas'].'</option>';
												}else{
													echo '<option value="'.$datas['kd_kelas'].'">'.$datas['nama_kelas'].'</option>';
												}
											}	
											?>
									</select>
								</div>
							</div>
							<div class="mb-3 row">
								<label for="kd_siswa" class="col-sm-2 col-form-label">Nama Siswa<span class="text-danger">*</span></label>
								<div class="col-sm-4">
									<select class="form-select" name="kd_siswa" required aria-label="Default select example" >
										<option selected value="">-- Pilih Salah Satu --</option>
										<?php 
											require'../connect.php';
											$result	= mysqli_query($koneksi,"SELECT * FROM siswa ORDER BY nama_siswa ASC")or die(mysqli_error($koneksi));
											while ($datas=mysqli_fetch_array($result)) {
												if ($data['kd_siswa']==$datas['kd_siswa']) {
													echo '<option value="'.$datas['kd_siswa'].'" selected="selected">'.$datas['nama_siswa'].'</option>';
												}else{
													echo '<option value="'.$datas['kd_siswa'].'" disabled>'.$datas['nama_siswa'].'</option>';
												}
											}	
											?>
									</select>
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