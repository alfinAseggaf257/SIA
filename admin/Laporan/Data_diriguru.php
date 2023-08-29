<div class="container-fluid px-4">
	<h3>Guru</h3>

	<!-- KONTEN TENGAH -->
	<div class="col-lg-12">
		<div class="card rounded">
			<div class="card-header">
				List Data Diri Guru
			</div>
			<div class="card-body">
				<a href="?page=tambah_guru" class="btn btn-primary" style="color: #fff; text-decoration: none; float:left;"><i class="fa fa-plus"></i> Tambah</a>
				<div class="card-title mb-4">
					<br>
				</div>
				<div class="table-responsive">
					<div class="overflow-auto">
						<table class="table table-striped table-bordered table-hover display nowrap" id="data-table" width="100%" >
							<thead>
								<tr>
									<th class="text-center">No</th>
									<th>NIP</th>
									<th>Nama </th>
									<th>Alamat</th>
									<th>Nomer Telphone</th>
									<th>Pengampu</th>
									<th width="70">Laporan</th>
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
										<td><?= $data['alamat']; ?></td>
										<td><?= $data['no_telp']; ?></td>
										<td><?= $data['nama_mapel']; ?></td>
										<td>
											  <a href="Laporan/fpdf/Laporan_datadiriguru.php?kd_guru=<?= $data['kd_guru']; ?>" class="btn btn-danger" target="_blank" style="color: #fff; text-decoration: none; float:left;">   <i class="fas fa-book me-2"></i> Lap.PDF</a>
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
