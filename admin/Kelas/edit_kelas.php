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
	$kd_kelas =$_GET['kd_kelas'];
	$query	=mysqli_query($koneksi,"SELECT * FROM kelas INNER JOIN guru ON kelas.kd_guru=guru.kd_guru WHERE kd_kelas='$kd_kelas'");
	while ($data=mysqli_fetch_array($query)) : 
		?>
		<div class="container-fluid px-4">
			<h3>Kelas</h3>
			<!-- KONTEN TENGAH -->
			<div class="col-lg-12">
				<div class="card rounded">
					<div class="card-header">
						Ubah Data Kelas
					</div>
					<br>
					<div class="container">
						<form action="?page=update_kelas" method="POST">
							<div class="container" style="margin-left: 2%;">						
								<div class="mb-3 row">
									<label for="kd_kelas" class="col-sm-2 col-form-label">kd Kelas<span class="text-danger">*</span></label>
									<div class="col-sm-4">
										<input type="text"  name="kd_kelas" value="<?= $data['kd_kelas'];?>" class="form-control" id="kd_kelas" readonly>
									</div>
								</div>
								<div class="mb-3 row">
									<label for="nama_kelas" class="col-sm-2 col-form-label">Nama Kelas<span class="text-danger">*</span></label>
									<div class="col-sm-4">
										<input type="text" name="nama_kelas" value="<?= $data['nama_kelas'];?>" class="form-control" id="nama_kelas" required>
									</div>
								</div>
								<div class="mb-3 row">
									<label for="tahun_ajaran" class="col-sm-2 col-form-label">Tahun Ajaran<span class="text-danger">*</span></label>
									<div class="col-sm-4">
										<input type="text" name="tahun_ajaran" value="<?= $data['tahun_ajaran'];?>" class="form-control" id="nama_kelas" required>
									</div>
								</div>
								<div class="mb-3 row">
									<label for="kd_guru" class="col-sm-2 col-form-label">Wali Kelas<span class="text-danger">*</span></label>
									<div class="col-sm-4">
										<select class="form-select" name="kd_guru" required="" aria-label="Default select example">
											<option selected value="">-- Pilih Salah Satu --</option>
											<?php 
											require'../connect.php';
											$result	= mysqli_query($koneksi,"SELECT * FROM guru ORDER BY nama_guru ASC")or die(mysqli_error($koneksi));
											while ($datas=mysqli_fetch_array($result)) {
												if ($data['kd_guru']==$datas['kd_guru']) {
													echo '<option value="'.$datas['kd_guru'].'" selected="selected">'.$datas['nama_guru'].'</option>';
												}else{
													echo '<option value="'.$datas['kd_guru'].'">'.$datas['nama_guru'].'</option>';
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