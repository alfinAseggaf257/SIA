<?php 
require'../connect.php';

?>
<div class="container-fluid px-4">
	<h3>Laporan siswa</h3>
	<!-- KONTEN TENGAH -->
	<div class="col-lg-12">
		<div class="card rounded">
			<div class="card-header ">
				List Data Siswa Kelas
			</div>
			<div class="card-body">
				<div class="mb-2 row">
					<div class="col-md-2">

					</div>
					<div class="col-md-8"></div>
					<div class="col-md-2" >  
					</div>
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
									<th>Tahun Ajaran</th>
									<th>Nama Wali Kelas</th>
									<th width="70">Laporan</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								
								
								// echo $cek;
								// exit();
								//$tes="WHERE nama_kelas='$cek'";
								$no=1;
								$tampildata=$_SESSION['pengajar'];
								$nama=$_SESSION['nama_guru'];
								$tampilsiswa=$_SESSION['nama_siswa'];

								if ($_SESSION['level']=="Admin") {
									$tampil="";
								}else if($_SESSION['level']=="Guru"){
									$tampil="WHERE nama_guru='$nama' ";
									$plus="AND nama_guru='$nama'";
								}else if($_SESSION['level']=="Siswa"){
									$tampil="WHERE nama_siswa='$tampilsiswa'";
									$plus=" ";
								}
								$query=mysqli_query($koneksi, "SELECT * FROM data_siswakelas 
									INNER JOIN kelas ON data_siswakelas.kd_kelas=kelas.kd_kelas
									INNER JOIN guru ON kelas.kd_guru=guru.kd_guru
									INNER JOIN siswa ON data_siswakelas.kd_siswa=siswa.kd_siswa
									 $tampil $plus
									")or die(mysqli_error($koneksi));
								while($data=mysqli_fetch_array($query)): 

									?>
									<tr>
										<td class="text-center"><?= $no++; ?></td>
										<td><?= $data['nis']; ?></td>
										<td><?= $data['nama_siswa']; ?></td>
										<td><?= $data['angkatan']; ?></td>
										<td><?= $data['nama_kelas']; ?></td>
										<td><?= $data['tahun_ajaran']; ?></td>
										<td><?= $data['nama_guru']; ?></td>
										<td style="text-align:center">
											<a href="Laporan/fpdf/Laporan_nilai.php?kd_dataSiswa=<?= $data['kd_dataSiswa']; ?>" class="btn btn-danger" target="_blank" style="color: #fff; text-decoration: none; float:left;">   <i class="fas fa-book me-2"></i> Lap.PDF</a>

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

