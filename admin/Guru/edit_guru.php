<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
	<?php 
		require'../connect.php';
		$kd_guru =$_GET['kd_guru'];
		$query	=mysqli_query($koneksi,"SELECT * FROM guru WHERE kd_guru='$kd_guru'");
		while ($data=mysqli_fetch_array($query)) : 
	?>
	<div class="container-fluid px-4">
		<h3>Guru</h3>

		<!-- KONTEN TENGAH -->
		<div class="col-lg-12">
			<div class="card rounded formtambah">
				<div class="card-header">
					Ubah Data Guru
				</div>
				<br>
				<div class="container">
					<form action="?page=update_guru" method="POST" enctype="multipart/form-data">
						<div class="container" style="margin-left: 2%;">
							<input type="hidden"  name="kd_guru" value="<?= $data['kd_guru']; ?>" readonly class="form-control" id="level" required>
							<input type="hidden"  name="fotoLama" value="<?= $data['foto']; ?>" readonly class="form-control" id="level" required>								
							<div class="mb-2 row">
								<label for="nip" class="col-sm-2 col-form-label">NIP<span class="text-danger">*</span></label>
								<div class="col-sm-4">
									<input type="text" name="nip" class="form-control" id="nip" autocomplete="off" value="<?= $data['nip'] ?>" readonly required>
								</div>
							</div>
							<div class="mb-2 row">
								<label for="nama_guru" class="col-sm-2 col-form-label">Nama Guru<span class="text-danger">*</span></label>
								<div class="col-sm-4">
									<input type="text" name="nama_guru" class="form-control" autocomplete="off" value="<?= $data['nama_guru'] ?>" id="nama_guru" required>
								</div>
							</div>
							<div class="mb-2 row">
								<label for="jenkel" class="col-sm-2 col-form-label" >Jenip Kelamin<span class="text-danger">*</span></label>
								<div class="col-sm-4">

									<?php if($data['jenkel']=="Laki-laki"){ ?>
										<div class="form-check form-check-inline">
											<input class="form-check-input" type="radio" name="jenkel" checked="checked" id="jenkel" value="Laki-laki" required >
											<label class="form-check-label" for="inlineRadio1" >Laki-laki</label>
										</div>
										<div class="form-check form-check-inline">
											<input class="form-check-input" type="radio" name="jenkel" id="jenkel" value="Perempuan">
											<label class="form-check-label" for="inlineRadio2">Perempuan</label>
										</div>
									<?php }else if ($data['jenkel']=="Perempuan") { ?>
										<div class="form-check form-check-inline">
											<input class="form-check-input" type="radio" name="jenkel" id="jenkel" value="Laki-laki" required >
											<label class="form-check-label" for="inlineRadio1" >Laki-laki</label>
										</div>
										<div class="form-check form-check-inline">
											<input class="form-check-input" type="radio" name="jenkel" checked="checked" id="jenkel" value="Perempuan">
											<label class="form-check-label" for="inlineRadio2">Perempuan</label>
										</div>
									<?php }else { ?>
										<div class="form-check form-check-inline">
											<input class="form-check-input" type="radio" name="jenkel" id="jenkel" value="Laki-laki" required >
											<label class="form-check-label" for="inlineRadio1" >Laki-laki</label>
										</div>
										<div class="form-check form-check-inline">
											<input class="form-check-input" type="radio" name="jenkel" id="jenkel" value="Perempuan">
											<label class="form-check-label" for="inlineRadio2">Perempuan</label>
										</div>
									<?php }?>
								</div>
							</div>
							<div class="mb-2 row">
								<label for="agama" class="col-sm-2 col-form-label">Agama<span class="text-danger">*</span></label>
								<div class="col-sm-4">
									<?php 
										$agama_guru = array('Islam','Kristen','Hindu','Budha','Konghucu'); 
									?>
									<select class="form-select" name="agama" required aria-label="Default select example">
										<option selected value="">-- Pilih Salah Satu --</option>
										<?php 
											foreach($agama_guru as $key){
												if($key == $data['agama']){

												?>
												<option value="<?= $key; ?>" selected="selected">&nbsp; <?= $key; ?></option>
												<?php }else{ ?>

												<option value="<?= $key; ?>">&nbsp; <?= $key; ?></option>
												<?php }
												} 
											?>
									</select>
								</div>
							</div>
							<div class="mb-2 row form-group">
								<label for="TTL" class="col-sm-2 col-form-label">TTL<span class="text-danger">*</span></label>
								<div class="col-sm-2">
									<input type="text" name="tempat_lahir"  autocomplete="off" value="<?= $data['tempat_lahir'] ?>" class="form-control" id="TTL" required>
								</div>
								<div class="col-sm-2">
									<input type="date" name="tanggal_lahir" class="form-control" autocomplete="off" value="<?= $data['tanggal_lahir'] ?>" id="TTL" required>
								</div>
							</div>
							<div class="mb-2 row">
								<label for="alamat" class="col-sm-2 col-form-label">Alamat<span class="text-danger">*</span></label>
								<div class="col-sm-4">
									<textarea class="form-control" name="alamat"  id="alamat" name="alamat" ><?= $data['alamat']; ?></textarea>
								</div>
							</div>
							<div class="mb-2 row">
								<label for="no_telp" class="col-sm-2 col-form-label">No. Telp<span class="text-danger">*</span></label>
								<div class="col-sm-4">
									<input type="text" name="no_telp" autocomplete="off" value="<?= $data['no_telp'] ?>" class="form-control" id="no_telp" required>
								</div>
							</div>
							<div class="mb-2 row">
								<label for="kd_mapel" class="col-sm-2 col-form-label">Pengampu<span class="text-danger">*</span></label>
								<div class="col-sm-4">
										<select class="form-select" name="kd_mapel" required="" aria-label="Default select example">
											<option selected value="">-- Pilih Salah Satu --</option>
											<?php 
											require'../connect.php';
											$result	= mysqli_query($koneksi,"SELECT * FROM mata_pelajaran ORDER BY nama_mapel ASC")or die(mysqli_error($koneksi));
											while ($datas=mysqli_fetch_array($result)) {
												if ($data['kd_mapel']==$datas['kd_mapel']) {
													echo '<option value="'.$datas['kd_mapel'].'" selected="selected">'.$datas['nama_mapel'].'</option>';
												}else{
													echo '<option value="'.$datas['kd_mapel'].'">'.$datas['nama_mapel'].'</option>';
												}
											}	
											?>
										</select>
									</div>
							</div>
							<div class="mb-2 row">
								<label for="username" class="col-sm-2 col-form-label">Username<span class="text-danger">*</span></label>
								<div class="col-sm-4">
									<input type="text" name="username" autocomplete="off" value="<?= $data['username'] ?>" class="form-control" id="username" required>
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
									<input type="hidden" name="level" value="<?php echo "guru"; ?>" readonly class="form-control" id="level" required>

								</div>
							</div>
							<div class="mb-2 row">
								<label for="foto" class="col-sm-2 col-form-label">Foto<span class="text-danger">*</span></label>
								<div class="col-sm-4">
									<img src="../assets/img/Data/Guru/<?= $data['foto']; ?>" class="img-thumbnail" style="width: 177px ; height: 236px;" alt="..."><br>
									<input type="file" name="foto" class="form-control" id="foto">

								</div>
							</div>
							<br>
							<button type="reset" class="btn btn-danger">Batal</button>
							<button type="submit" class="btn btn-primary">Edit</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<?php endwhile; ?>
</body>
</html>