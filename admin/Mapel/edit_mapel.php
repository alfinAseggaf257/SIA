<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
	<?php 
	require'../connect.php';
	$kd_mapel =$_GET['kd_mapel'];
	$query	=mysqli_query($koneksi,"SELECT * FROM mata_pelajaran WHERE kd_mapel='$kd_mapel'");
	while ($data=mysqli_fetch_array($query)) : 
		?>
		<div class="container-fluid px-4">
			<h3>Kelas</h3>
			<!-- KONTEN TENGAH -->
			<div class="col-lg-12">
				<div class="card rounded">
					<div class="card-header">
						Edit Data Kelas
					</div>
					<br>
					<div class="container">
						<form action="?page=update_mapel" method="POST">
							<div class="container" style="margin-left: 2%;">						
							<div class="mb-2 row">
								<label for="kd_mapel" class="col-sm-2 col-form-label">Kode Mapel<span class="text-danger">*</span></label>
								<div class="col-sm-4">
									<input type="text"  name="kd_mapel" value="<?= $data['kd_mapel']; ?>" class="form-control" id="kd_mapel" readonly>
								</div>
							</div>
							<div class="mb-2 row">
								<label for="nama_mapel" class="col-sm-2 col-form-label">Nama Mapel<span class="text-danger">*</span></label>
								<div class="col-sm-4">
									<input type="text" name="nama_mapel" value="<?= $data['nama_mapel']; ?>" class="form-control" id="nama_mapel" required>
								</div>
							</div>
							<div class="mb-2 row">
								<label for="kkm" class="col-sm-2 col-form-label">KKM<span class="text-danger">*</span></label>
								<div class="col-sm-4">
									<input type="text" name="kkm" value="<?= $data['kkm']; ?>" class="form-control" id="nama_mapel" required>
								</div>
							</div>
							<div class="mb-2 row">
								<label for="keterangan" class="col-sm-2 col-form-label" >Keterangan<span class="text-danger">*</span></label>
								<div class="col-sm-2">
									<?php if($data['keterangan']=="Wajib"){ ?>
										<div class="form-check form-check-inline">
											<input class="form-check-input" type="radio" name="keterangan" checked="checked" id="keterangan" value="Wajib" required >
											<label class="form-check-label" for="inlineRadio1" >Wajib</label>
										</div>
										<div class="form-check form-check-inline">
											<input class="form-check-input" type="radio" name="keterangan" id="keterangan" value="Non-Wajib">
											<label class="form-check-label" for="inlineRadio2">Non-Wajib</label>
										</div>
									<?php }else if ($data['keterangan']=="Non-Wajib") { ?>
										<div class="form-check form-check-inline">
											<input class="form-check-input" type="radio" name="keterangan" id="keterangan" value="Wajib" required >
											<label class="form-check-label" for="inlineRadio1" >Wajib</label>
										</div>
										<div class="form-check form-check-inline">
											<input class="form-check-input" type="radio" name="keterangan" checked="checked" id="keterangan" value="Non-Wajib">
											<label class="form-check-label" for="inlineRadio2">Non-Wajib</label>
										</div>
									<?php }else { ?>
										<div class="form-check form-check-inline">
											<input class="form-check-input" type="radio" name="keterangan" id="keterangan" value="Wajib" required >
											<label class="form-check-label" for="inlineRadio1" >Wajib</label>
										</div>
										<div class="form-check form-check-inline">
											<input class="form-check-input" type="radio" name="keterangan" id="keterangan" value="Non-Wajib">
											<label class="form-check-label" for="inlineRadio2">Non-Wajib</label>
										</div>
									<?php }?>
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