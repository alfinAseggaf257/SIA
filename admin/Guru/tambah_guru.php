<?php 
require '../connect.php'; 	
$query 		 = mysqli_query($koneksi,"SELECT max(kd_guru) FROM guru") or die(mysql_error());
$data 		 = mysqli_fetch_array($query);
if($data){
	$no   	 = substr($data[0],2);
	$kode 	 = (int) $no;
	$kode 	 = $kode+1;
	$kode_acak= "GR".str_pad($kode,3,"0", STR_PAD_LEFT);

}else{
	$kode_acak = "GR001";
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
		<h3>Guru</h3>

		<!-- KONTEN TENGAH -->
		<div class="col-lg-12">
			<div class="card rounded formtambah">
				<div class="card-header">
					Tambah Data Guru
				</div>
				<br>
				<div class="container">
					<form action="?page=simpan_guru" method="POST" enctype="multipart/form-data">
						<div class="container" style="margin-left: 2%;">	
							<div class="mb-2 row" hidden>
								<label for="kd_guru" class="col-sm-2 col-form-label">Kode Guru<span class="text-danger">*</span></label>
								<div class="col-sm-4">
									<input type="text" name="kd_guru" class="form-control" value="<?php echo $kode_acak; ?>" id="kd_guru" readonly>
								</div>
							</div>					
							<div class="mb-2 row">
								<label for="nip" class="col-sm-2 col-form-label">NIP<span class="text-danger">*</span></label>
								<div class="col-sm-4">
									<input type="text" name="nip" class="form-control" id="nip" autocomplete="off" required>
								</div>
							</div>
							<div class="mb-2 row">
								<label for="nama_guru" class="col-sm-2 col-form-label">Nama guru<span class="text-danger">*</span></label>
								<div class="col-sm-4">
									<input type="text" name="nama_guru" class="form-control" id="nama_guru" autocomplete="off" required>
								</div>
							</div>
							<div class="mb-2 row">
								<label for="jenkel" class="col-sm-2 col-form-label" >Jenis Kelamin<span class="text-danger">*</span></label>
								<div class="col-sm-4">
									<div class="form-check form-check-inline">
										<input class="form-check-input" type="radio" name="jenkel" id="jenkel" value="Laki-laki" required >
										<label class="form-check-label" for="inlineRadio1">Laki-laki</label>
									</div>
									<div class="form-check form-check-inline">
										<input class="form-check-input" type="radio" name="jenkel" id="jenkel" value="Perempuan">
										<label class="form-check-label" for="inlineRadio2">Perempuan</label>
									</div>
								</div>
							</div>
							<div class="mb-2 row">
								<label for="agama" class="col-sm-2 col-form-label">Agama<span class="text-danger">*</span></label>
								<div class="col-sm-4">
									<select class="form-select" name="agama" required aria-label="Default select example">
										<option selected value="">-- Pilih Salah Satu --</option>
										<option value="Islam">Islam</option>
										<option value="Kristen">Kristen</option>
										<option value="Hindu">Hindu</option>
										<option value="Budha">Budha</option>
										<option value="Konghucu">Konghucu</option>
									</select>
								</div>
							</div>
							<div class="mb-2 row form-group">
								<label for="TTL" class="col-sm-2 col-form-label">TTL<span class="text-danger">*</span></label>
								<div class="col-sm-2">
									<input type="text" name="tempat_lahir" class="form-control" autocomplete="off" id="TTL" required>
								</div>
								<div class="col-sm-2">
									<input type="date" name="tanggal_lahir" class="form-control" format='yy-mm-dd' id="TTL" required>
								</div>
							</div>
							<div class="mb-2 row">
								<label for="alamat" class="col-sm-2 col-form-label">Alamat<span class="text-danger">*</span></label>
								<div class="col-sm-4">
									<textarea class="form-control" name="alamat"  id="alamat" name="alamat" ></textarea>
								</div>
							</div>
							<div class="mb-2 row">
								<label for="no_telp" class="col-sm-2 col-form-label">No. Telp<span class="text-danger">*</span></label>
								<div class="col-sm-4">
									<input type="text" name="no_telp" class="form-control" autocomplete="off" id="no_telp" required>
								</div>
							</div>
							<div class="mb-2 row">
								<label for="kd_mapel" class="col-sm-2 col-form-label">Mapel yang diampu<span class="text-danger">*</span></label>
								<div class="col-sm-4">
									<select class="form-select" name="kd_mapel" required aria-label="Default select example">
										<option selected value="">-- Pilih Salah Satu --</option>
										<?php
										require"../connect.php";
										$result = mysqli_query($koneksi, "SELECT * FROM mata_pelajaran ORDER BY nama_mapel ASC")or die(mysqli_error());
										while($data=mysqli_fetch_array($result)){
											echo '<option value="'.$data['kd_mapel'].'">'.$data['nama_mapel'].' </option>';
										}
										?>
									</select>
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
									<input type="hidden" name="level" value="<?php echo "Guru"; ?>" readonly class="form-control" id="level" required>
								</div>
							</div>
							<div class="mb-2 row">
								<label for="foto" class="col-sm-2 col-form-label">Foto<span class="text-danger">*</span></label>
								<div class="col-sm-4">
									<input type="file" name="foto" class="form-control" id="foto">

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