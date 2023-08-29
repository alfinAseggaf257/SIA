<div class="container-fluid px-4">
	<h3>Guru</h3>

	<!-- KONTEN TENGAH -->
	<div class="col-lg-12">
		<div class="card rounded">
			<div class="card-header">
				List Data Guru
			</div>
			<div class="card-body">
				<?php if ($_SESSION['level']=="Admin") : ?>
				<a href="?page=tambah_guru" class="btn btn-primary" style="color: #fff; text-decoration: none; float:left;"><i class="fa fa-plus"></i> Tambah</a>
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
									<th>NIP</th>
									<th>Nama </th>
									<?php if ($_SESSION['level']=="Admin") : ?>
									<th>Alamat</th>
									<th>Nomer Telphone</th>
									<?php endif ?>
									<th>Pengampu</th>
									<?php if ($_SESSION['level']=="Admin") : ?>
									<th width="70">Aksi</th>
									<?php endif ?>
								</tr>
							</thead>
							<tbody>
								<?php 
								require'../connect.php';
								require'function.php';
								$no=1;
								$query=mysqli_query($koneksi, "SELECT * FROM guru INNER JOIN mata_pelajaran ON guru.kd_mapel=mata_pelajaran.kd_mapel  ORDER BY kd_guru DESC")or die(mysqli_error($koneksi));
								while($data=mysqli_fetch_array($query)): 

									?>
									<tr>
										<td class="text-center"><?= $no++; ?></td>
										<td><?= $data['nip']; ?></td>
										<td><?= $data['nama_guru']; ?></td>
										<?php if ($_SESSION['level']=="Admin") : ?>
										<td><?= $data['alamat']; ?></td>
										<td><?= $data['no_telp']; ?></td>
										<?php endif ?>
										<td><?= $data['nama_mapel']; ?></td>
										<?php if ($_SESSION['level']=="Admin") : ?>
										<td>
											<a href="?page=edit_guru&kd_guru=<?php echo $data['kd_guru']; ?>" class="link"><img name="pencil" src="../assets/img/action/edit.png"></a>

											<a href="#hapus" data-href="index.php?page=hapus_guru&kd_guru=<?php echo $data['kd_guru']; ?>" data-bs-toggle="modal" data-target="#hapus"  class="link"><img name="delete" src="../assets/img/action/delete.png"></a>
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
					<a name="hapus_nis" class="btn btn-danger btn-yes">YES</a>
				</div>
			</div>
		</div>
	</div>
	<!-- tutupmodal -->


