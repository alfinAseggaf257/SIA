<?php 
require '../connect.php'; 	
$query 		 = mysqli_query($koneksi,"SELECT max(kd_admin) FROM admin") or die(mysql_error());
$data 		 = mysqli_fetch_array($query);
if($data){
	$no   	 = substr($data[0],2);
	$kode 	 = (int) $no;
	$kode 	 = $kode+1;
	$kode_acak= "KD".str_pad($kode,3,"0", STR_PAD_LEFT);

}else{
	$kode_acak = "KD001";
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
		<h3>Pengguna</h3>

		<!-- KONTEN TENGAH -->
		<div class="col-lg-12">
			<div class="card rounded">
				<div class="card-header">
					Tambah Data Admin
				</div>
				<br>
				<div class="container">
					<form action="?page=simpan_pengguna" method="POST">
						<div class="container" style="margin-left: 2%;">
							<div class="mb-2 row">
								<label for="kd_admin" class="col-sm-2 col-form-label">Kode Admin<span class="text-danger">*</span></label>
								<div class="col-sm-4">
									<input type="text" name="kd_admin" class="form-control" value="<?php echo $kode_acak; ?>" id="kd_admin" readonly>
								</div>
							</div>						
							<div class="mb-2 row">
								<label for="nama_admin" class="col-sm-2 col-form-label">Nama Admin<span class="text-danger">*</span></label>
								<div class="col-sm-4">
									<input type="text" name="nama_admin" class="form-control" id="nama_admin" required>
								</div>
							</div>
							<div class="mb-2 row">
								<label for="username" class="col-sm-2 col-form-label">Username<span class="text-danger">*</span></label>
								<div class="col-sm-4">
									<input type="text" name="username" class="form-control" autocomplete="off" id="username" required>
								</div>
							</div>
							<div class="mb-2 row">
								<label for="password" class="col-sm-2 col-form-label">Password<span class="text-danger">*</span></label>
								<div class="col-sm-4">
									<input type="text" name="password" class="form-control" autocomplete="off" id="password" required>
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
</body>
</html>
