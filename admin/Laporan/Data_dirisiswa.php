
<div class="container-fluid px-4">
    <h3>Siswa</h3>

    <!-- KONTEN TENGAH -->
    <div class="col-lg-12">
        <div class="card rounded">
            <div class="card-header">
                List Data Diri Siswa
            </div>
            <div class="card-body">
                <a href="?page=tambah_siswa" class="btn btn-primary" style="color: #fff; text-decoration: none; float:left;"><i class="fa fa-plus"></i> Tambah</a>
                <div class="card-title mb-4">
                    <br>
                </div>
                <div class="table-responsive">
                    <div class="overflow-auto">
                        <table class="table table-striped table-bordered table-hover display nowrap" id="data-table" width="100%" >
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th>NIS</th>
                                    <th>Nama Siswa</th>
                                    <th>Alamat</th>
                                    <th>Nomer Telphone</th>
                                    <th>Angkatan</th>
                                    <th width="70">Laporan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                require'../connect.php';
                                require'function.php';
                                $no=1;
                                $query=mysqli_query($koneksi, "SELECT * FROM siswa ORDER BY kd_siswa DESC")or die(mysqli_error($koneksi));
                                while($data=mysqli_fetch_array($query)): 

                                 ?>
                                 <tr>
                                   <td class="text-center"><?= $no++; ?></td>
                                   <td><?= $data['nis']; ?></td>
                                   <td><?= $data['nama_siswa']; ?></td>
                                   <td><?= $data['alamat']; ?></td>
                                   <td><?= $data['no_telp']; ?></td>
                                   <td><?= $data['angkatan']; ?></td>
                                   <td>
                                    <a href="Laporan/fpdf/Laporan_datadirisiswa.php?kd_siswa=<?= $data['kd_siswa']; ?>" class="btn btn-danger" target="_blank" style="color: #fff; text-decoration: none; float:left;">   <i class="fas fa-book me-2"></i> Lap.PDF</a>
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