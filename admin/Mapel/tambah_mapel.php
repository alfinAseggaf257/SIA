<?php 
require '../connect.php'; 	
$query 		 = mysqli_query($koneksi,"SELECT max(kd_mapel) FROM mata_pelajaran") or die(mysql_error());
$data 		 = mysqli_fetch_array($query);
if($data){
	$no   	 = substr($data[0],2);
	$kode 	 = (int) $no;
	$kode 	 = $kode+1;
	$kode_acak= "MP".str_pad($kode,3,"0", STR_PAD_LEFT);

}else{
	$kode_acak = "MP001";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Mata Pelajaran</title>
</head>
<body>
<div class="container-fluid px-4">
		<h3>Mata Pelajaran</h3>

		<!-- KONTEN TENGAH -->
		<div class="col-lg-12">
			<div class="card rounded">
				<div class="card-header">
					Tambah Data Mapel
				</div>
				<br>
				<div class="container">
					<form action="?page=simpan_mapel" method="POST">
						<div class="container" style="margin-left: 2%;">						
							<div class="mb-2 row">
								<label for="kd_mapel" class="col-sm-2 col-form-label">Kode Mapel<span class="text-danger">*</span></label>
								<div class="col-sm-4">
									<input type="text"  name="kd_mapel" value="<?php echo $kode_acak; ?>" class="form-control" id="kd_mapel" readonly>
								</div>
							</div>
							<div class="mb-2 row">
								<label for="nama_mapel" class="col-sm-2 col-form-label">Nama Mapel<span class="text-danger">*</span></label>
								<div class="col-sm-4">
									<input type="text" name="nama_mapel" class="form-control" id="nama_mapel" required>
								</div>
							</div>
							<div class="mb-2 row">
								<label for="kkm" class="col-sm-2 col-form-label">KKM<span class="text-danger">*</span></label>
								<div class="col-sm-4">
									<input type="text" name="kkm" class="form-control" id="nama_mapel" required>
								</div>
							</div>
							<div class="mb-2 row">
								<label for="keterangan" class="col-sm-2 col-form-label" >Keterangan<span class="text-danger">*</span></label>
								<div class="col-sm-2">
									<div class="form-check form-check-inline">
										<input class="form-check-input" type="radio" name="keterangan" id="keterangan" value="Wajib" required >
										<label class="form-check-label" for="inlineRadio1">Wajib</label>
									</div>
									<div class="form-check form-check-inline">
										<input class="form-check-input" type="radio" name="keterangan" id="keterangan" value="Non-wajib">
										<label class="form-check-label" for="inlineRadio2">Non-wajib</label>
									</div>
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
