<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
	<?php 
		require'../connect.php';
		$kd_admin =$_GET['kd_admin'];
		$query	=mysqli_query($koneksi,"SELECT * FROM admin WHERE kd_admin='$kd_admin'");
		while ($data=mysqli_fetch_array($query)) : 
 	?>
		<div class="container-fluid px-4">
			<h3>Pengguna</h3>
			<!-- KONTEN TENGAH -->
			<div class="col-lg-12">
				<div class="card rounded">
					<div class="card-header">
						Ubah Data Admin
					</div>
					<br>
					<div class="container">
						<form action="?page=update_pengguna" method="POST">
						<div class="container" style="margin-left: 2%;">						
							<div class="mb-2 row">
								<input type="hidden"  name="kd_admin" value="<?= $data['kd_admin']; ?>" readonly class="form-control" id="level" required>
								<label for="nama_admin" class="col-sm-2 col-form-label">Nama Admin<span class="text-danger">*</span></label>
								<div class="col-sm-4">
									<input type="text" name="nama_admin" value="<?= $data['nama_admin'];?>" class="form-control" id="nama_admin" required>
								</div>
							</div>
							<div class="mb-2 row">
								<label for="username" class="col-sm-2 col-form-label">Username<span class="text-danger">*</span></label>
								<div class="col-sm-4">
									<input type="text" name="username" value="<?= $data['username'];?>" class="form-control" autocomplete="off" id="username" required>
								</div>
							</div>
							<div class="mb-2 row">
								<label for="password" class="col-sm-2 col-form-label">Password<span class="text-danger">*</span></label>
								<div class="col-sm-4">
									<input type="text" name="password" autocomplete="off"  class="form-control" id="password" >
									<input type="hidden" name="passwordLama" autocomplete="off" value="<?= $data['password']; ?>" class="form-control" id="password" >
									<div id="#" class="form-text text-danger">*Kosongkan jika tidak diganti</div>
								</div>
							</div>
							<div class="mb-2 row " hidden>
								<label hidden for="level" class="col-sm-2 col-form-label">level<span class="text-danger">*</span></label>
								<div class="col-sm-4" hidden>
									<input type="hidden" name="level" value="<?php echo "Admin"; ?>" readonly class="form-control" id="level" required>
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
