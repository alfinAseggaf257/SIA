<?php 
	require'../connect.php';
	
?>
<div class="container-fluid px-4">
	<h3>Data Siswa Kelas</h3>
	<!-- KONTEN TENGAH -->
	<div class="col-lg-12">
		<div class="card rounded">
			<div class="card-header ">
				List Data Siswa Kelas
			</div>
			<div class="card-body">
				<div class="mb-2 row">
                <div class="col-md-2">
                    <select class="form-select" id="namaKelas" aria-label="Default select example" required>
                        <option selected value="">Pilih Kelas</option>
                       	<?php 	
                       	
               			$no=1;
						$querycari=mysqli_query($koneksi, "SELECT * FROM kelas ORDER BY nama_kelas ASC
											")or die(mysqli_error($koneksi));
						while($rows=mysqli_fetch_array($querycari)): 
                       	?>
                       	<option value="<?php echo $rows["nama_kelas"]; ?>"><?php echo $rows["nama_kelas"]; ?></option>
						<?php endwhile;	?>
                    </select>
                </div>
                <div class="col-md-8"></div>
                <div class="col-md-2" >  
                <?php if ($_SESSION['level']=="Admin") : ?>
                <a href="?page=tambah_siswa_kelas" class="btn btn-primary" style="color: #fff; float: right; text-decoration: none; ">   <i class="fa fa-plus"></i> Tambah</a>
                </div>
           		<?php endif ?>
                </div>
                <div class="card-title mb-4">
                
                </div>
				<div class="table-responsive">
					<div class="overflow-auto">
						<table class="table table-striped table-bordered table-hover display nowrap" id="data-table" width="100%" >
							<thead>
								<tr>
									<th class="text-center">No</th>
									<th>NIS</th>
									<th>Nama Siswa</th>
									<th>Angkatan</th>
									<th>Kelas</th>
									<?php if ($_SESSION['level']=="Admin") : ?>
									<th width="70">Aksi</th>
									<?php endif; ?>
									<!-- untuk select option guru agar dapat jalan -->
									<th hidden width="70">Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								
								
								// echo $cek;
								// exit();
								//$tes="WHERE nama_kelas='$cek'";
								$no=1;
								$query=mysqli_query($koneksi, "SELECT * FROM data_siswakelas 
									INNER JOIN kelas ON data_siswakelas.kd_kelas=kelas.kd_kelas
									INNER JOIN siswa ON data_siswakelas.kd_siswa=siswa.kd_siswa")or die(mysqli_error($koneksi));
								while($data=mysqli_fetch_array($query)): 

									?>
									<tr>
										<td class="text-center"><?= $no++; ?></td>
										<td><?= $data['nis']; ?></td>
										<td><?= $data['nama_siswa']; ?></td>
										<td><?= $data['angkatan']; ?></td>
										<td><?= $data['nama_kelas']; ?></td>
										<?php if ($_SESSION['level']=="Admin") : ?>
										<td style="text-align:center">
											<a href="?page=edit_siswa_kelas&kd_dataSiswa=<?php echo $data['kd_dataSiswa']; ?>" class="link"><img name="pencil" src="../assets/img/action/edit.png"></a>

											<a href="#hapus" data-href="index.php?page=hapus_siswa_kelas&kd_dataSiswa=<?php echo $data['kd_dataSiswa']; ?>" data-bs-toggle="modal" data-target="#hapus"  class="link"><img name="delete" src="../assets/img/action/delete.png"></a>
										</td>
										<?php endif ?>
										<!-- untuk select option guru agar dapat jalan -->
										<td hidden style="text-align:center">
											<a href="?page=edit_siswa_kelas&kd_dataSiswa=<?php echo $data['kd_dataSiswa']; ?>" class="link"><img name="pencil" src="../assets/img/action/edit.png"></a>

											<a href="#hapus" data-href="index.php?page=hapus_siswa_kelas&kd_dataSiswa=<?php echo $data['kd_dataSiswa']; ?>" data-bs-toggle="modal" data-target="#hapus"  class="link"><img name="delete" src="../assets/img/action/delete.png"></a>
										</td>
									</tr>
								<?php endwhile; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- tutup KONTEN TENGAH -->
	<!-- Modal -->
	<div class="modal fade" id="hapus" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog ">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">



					Apakah Anda Yakin ingin menghapus data ini?
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
					<a name="hapus_kd_dataSiswa" class="btn btn-danger btn-yes">YES</a>
				</div>
			</div>
		</div>
	</div>
	<!-- tutupmodal -->

