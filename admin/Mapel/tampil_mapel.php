<div class="container-fluid px-4">
	<h3>Mata Pelajaran</h3>
	<!-- KONTEN TENGAH -->
	<div class="col-lg-12">
		<div class="card rounded">
			<div class="card-header ">
				List Data Mapel
			</div>
			<div class="card-body">
				<?php if ($_SESSION['level']=="Admin") : ?>
				<a href="?page=tambah_mapel" class="btn btn-primary" style="color: #fff; text-decoration: none; float:left;">   <i class="fa fa-plus"></i> Tambah</a>
					<br>
				<?php endif ?>
				<div class="card-title mb-4">
				</div>
				<div class="table-responsive">
					<div class="overflow-auto">
						<table class="table table-striped table-bordered table-hover display nowrap" id="data-table" width="100%" >
							<thead>
								<tr>
									<th class="text-center">No</th>
									<th>Kode Mata Pelajaran</th>
									<th>Nama Mata Pelajaran</th>
									<th>KKM</th>
									<th>Keterangan</th>
									<?php if ($_SESSION['level']=="Admin") : ?>
									<th width="70">Aksi</th>
									<?php endif ?>
								</tr>
							</thead>
							<tbody>
								<?php 
								require'../connect.php';
								$no=1;
								$query=mysqli_query($koneksi, "SELECT * FROM mata_pelajaran ORDER BY kd_mapel DESC ")or die(mysqli_error());
								while($data=mysqli_fetch_array($query)): 

									?>
									<tr>
										<td class="text-center"><?= $no++; ?></td>
										<td><?= $data['kd_mapel']; ?></td>
										<td><?= $data['nama_mapel']; ?></td>
										<td><?= $data['kkm']; ?></td>
										<td><?= $data['keterangan']; ?></td>
										<?php if ($_SESSION['level']=="Admin") : ?>
										<td style="text-align:center">
											<a href="?page=edit_mapel&kd_mapel=<?php echo $data['kd_mapel']; ?>" class="link"><img name="pencil" src="../assets/img/action/edit.png"></a>

											<a href="#hapus" data-href="index.php?page=hapus_mapel&kd_mapel=<?php echo $data['kd_mapel']; ?>" data-bs-toggle="modal" data-target="#hapus"  class="link"><img name="delete" src="../assets/img/action/delete.png"></a>
										</td>
										<?php endif ?>
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
					<a name="hapus_kode_mapel" class="btn btn-danger btn-yes">YES</a>
				</div>
			</div>
		</div>
	</div>
	<!-- tutupmodal -->
