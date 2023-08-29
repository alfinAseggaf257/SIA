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
						Detail Pengumuman
					</div>
					<br>
					<div class="container">
						<div class="container">
						<input type="hidden" name="kd_pengumuman" value="<?= $data['kd_pengumuman'] ?>" >
						<center>
							<h1><?= $data['judul'];?></h1>
						</center>
						<br>
						<p><?= $data['keterangan']; ?></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php endwhile; ?>
</body>
</html>