<?php 
require '../connect.php'; 	
$query 		 = mysqli_query($koneksi,"SELECT max(kd_pengumuman) FROM pengumuman") or die(mysql_error());
$data 		 = mysqli_fetch_array($query);
if($data){
	$no   	 = substr($data[0],2);
	$kode 	 = (int) $no;
	$kode 	 = $kode+1;
	$kode_acak= "PG".str_pad($kode,3,"0", STR_PAD_LEFT);

}else{
	$kode_acak = "PG001";
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
		<h3>Pengumuman</h3>
		<!-- KONTEN TENGAH -->
		<div class="col-lg-12">
			<div class="card rounded">
				<div class="card-header">
					Pengumuman
				</div>
				<br>
				<div class="container">
					<form action="?page=simpan_pengumuman" method="POST">
						<div class="container" style="margin-left: 2%;">			
							<div class="mb-2 row" hidden>
								<label for="kd_pengumuman" class="col-sm-2 col-form-label">Kode Pengumuman<span class="text-danger">*</span></label>
								<div class="col-sm-4">
									<input type="text" name="kd_pengumuman" class="form-control" value="<?php echo $kode_acak; ?>" id="kd_pengumuman" readonly>
								</div>
							</div>					
							<div class="mb-2 row">
								<label for="judul" class="col-sm-2 col-form-label">Judul <span class="text-danger">*</span></label>
								<div class="col-sm-4">
									<input type="text" name="judul" class="form-control" id="judul" required autocomplete="off">
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
									<textarea class="form-control ckeditor" name="keterangan"  id="keterangan"></textarea>
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
