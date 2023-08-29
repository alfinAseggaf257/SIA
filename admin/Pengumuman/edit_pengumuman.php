<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
	<?php 
		require'../connect.php';
		$kd_pengumuman =$_GET['kd_pengumuman'];
		$query	=mysqli_query($koneksi,"SELECT * FROM pengumuman WHERE kd_pengumuman='$kd_pengumuman'");
		while ($data=mysqli_fetch_array($query)) : 
	?>
	<div class="container-fluid px-4">
		<h3>Pengumuman</h3>
		<!-- KONTEN TENGAH -->
		<div class="col-lg-12">
			<div class="card rounded">
				<div class="card-header">
					Pengumuman
				</div>
				<br>
				<div class="container">
					<form action="?page=update_pengumuman" method="POST">
						<div class="container" style="margin-left: 2%;">
							<input type="hidden" name="kd_pengumuman" value="<?= $data['kd_pengumuman']; ?>" id="">						
							<div class="mb-2 row">
								<label for="judul" class="col-sm-2 col-form-label">Judul <span class="text-danger">*</span></label>
								<div class="col-sm-4">
									<input type="text" name="judul" class="form-control" id="judul" value="<?= $data['judul']; ?>" required autocomplete="off">
								</div>
							</div>
							<div class="mb-2 row" hidden>
								<label for="tanggal" class="col-sm-2 col-form-label">Tanggal<span class="text-danger">*</span></label>
								<div class="col-sm-4">
									<input type="date" name="tanggal" class="form-control" id="tanggal"  value="<?php echo date('Y-m-d'); ?>"  required autocomplete="off">
								</div>
							</div>
							<div class="mb-2 row">
								<label for="keterangan" class="col-sm-2 col-form-label">Keterangan<span class="text-danger">*</span></label>
								<div class="col-sm-8">
									<textarea class="form-control ckeditor" name="keterangan"  id="keterangan" name="keterangan" ><?= $data['keterangan'] ?></textarea>
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
