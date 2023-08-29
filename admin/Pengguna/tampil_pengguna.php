
<div class="container-fluid px-4">
    <h3>Pengguna</h3>
    <!-- KONTEN TENGAH -->
    <div class="col-lg-12">
        <div class="card rounded">
            <div class="card-header ">
                List Data Admin
            </div>
            <div class="card-body">
                <a href="?page=tambah_pengguna" class="btn btn-primary" style="color: #fff; text-decoration: none; float:left;">   <i class="fa fa-plus"></i> Tambah</a>
                
                <div class="card-title mb-4">
                    <br>
                </div>
                <div class="table-responsive">
                    <div class="overflow-auto">
                        <table class="table table-striped table-bordered table-hover display nowrap" id="data-table" width="100%" >
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th>Nama</th>
                                    <th>Username</th>
                                    <th>Tanggal</th>
                                    <th width="70">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                               <?php 
                               require'../connect.php';
                               $no=1;
                               $query=mysqli_query($koneksi, "SELECT * FROM admin ")or die(mysqli_error($koneksi));
                               while($data=mysqli_fetch_array($query)): 

                                   ?>
                                   <tr>
                                    <td class="text-center"><?= $no++; ?></td>
                                    <td><?= $data['nama_admin']; ?></td>
                                    <td><?= $data['username']; ?></td>
                                    <td><?= $data['tanggal_dibuat']; ?></td>
                                    <td style="text-align:center">
                                        <a href="?page=edit_pengguna&kd_admin=<?php echo $data['kd_admin']; ?>" class="link"><img name="pencil" src="../assets/img/action/edit.png"></a>

                                        <a href="#hapus" data-href="index.php?page=hapus_pengguna&kd_admin=<?php echo $data['kd_admin']; ?>" data-bs-toggle="modal" data-target="#hapus"  class="link"><img name="delete" src="../assets/img/action/delete.png"></a>

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
                <a name="hapus_kd_admin" class="btn btn-danger btn-yes">YES</a>
            </div>
        </div>
    </div>
</div>
<!-- tutupmodal -->


