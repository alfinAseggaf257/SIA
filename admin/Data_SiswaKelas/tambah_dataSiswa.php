<?php 
require '../connect.php'; 	
$query 		 = mysqli_query($koneksi,"SELECT max(kd_dataSiswa) FROM data_siswakelas") or die(mysql_error());
$data 		 = mysqli_fetch_array($query);
if($data){
	$no   	 = substr($data[0],2);
	$kode 	 = (int) $no;
	$kode 	 = $kode+1;
	$kode_acak= "DS".str_pad($kode,3,"0", STR_PAD_LEFT);

}else{
	$kode_acak = "DS001";
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
		<h3>Siswa Kelas</h3>

		<!-- KONTEN TENGAH -->
		<div class="col-lg-12">
			<div class="card rounded">
				<div class="card-header">
					Tambah Data Siswa Kelas
				</div>
				<br>
				<div class="container">
					<form action="?page=simpan_siswa_kelas" method="POST">
						<div class="container" style="margin-left: 2%;">	
							<div class="mb-2 row" hidden>
								<label for="kd_dataSiswa" class="col-sm-2 col-form-label">Kode Guru<span class="text-danger">*</span></label>
								<div class="col-sm-4">
									<input type="text" name="kd_dataSiswa" class="form-control" value="<?php echo $kode_acak; ?>" id="kd_dataSiswa" readonly>
								</div>
							</div>								
							<div class="mb-3 row">
								<label for="kd_kelas" class="col-sm-2 col-form-label">Pilih Kelas<span class="text-danger">*</span></label>
								<div class="col-sm-4">
									<select class="form-select" name="kd_kelas" required aria-label="Default select example">
										<option selected value="">-- Pilih Salah Satu --</option>
										<?php
										require"../connect.php";
										$result = mysqli_query($koneksi, "SELECT * FROM kelas ORDER BY nama_kelas ASC")or die(mysqli_error());
										while($data=mysqli_fetch_array($result)){
											echo '<option value="'.$data['kd_kelas'].'">'.$data['nama_kelas'].' </option>';
										}
										?>
									</select>
								</div>
							</div>
							<div class="mb-3 row">
								<label for="kd_siswa" class="col-sm-2 col-form-label">Nama Siswa<span class="text-danger">*</span></label>
								<div class="col-sm-4">
									<select class="form-select" name="kd_siswa" required aria-label="Default select example">
										<option selected value="">-- Pilih Salah Satu --</option>
										<?php
										require"../connect.php";
										$result = mysqli_query($koneksi, "SELECT * FROM siswa ORDER BY nama_siswa ASC")or die(mysqli_error());
										while($data=mysqli_fetch_array($result)){
											echo '<option value="'.$data['kd_siswa'].'">'.$data['nis'].' - '.$data['nama_siswa'].' </option>';
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
</body>
</html>